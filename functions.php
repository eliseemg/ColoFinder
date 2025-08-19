<?php
/**
 * functions.php — Colofinder (version finale)
 */

/* ---------------------------------------------
 * 1) Réglages du thème + menus
 * --------------------------------------------- */
add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
  add_theme_support('title-tag');
  add_theme_support('menus');

  // Emplacements de menus utilisés dans le header
  register_nav_menus([
    'primary'   => __('Menu principal', 'colofinder'),   // Non connecté
    'connected' => __('Menu connecté', 'colofinder'),    // Connecté
  ]);
});


/* ---------------------------------------------
 * 2) Enqueue CSS/JS (un seul point d’entrée)
 * --------------------------------------------- */
function colofinder_enqueue_assets() {
  // Google Fonts
  wp_enqueue_style(
    'colofinder-google-fonts',
    'https://fonts.googleapis.com/css2?family=Bungee&family=Roboto:wght@400;500;700&display=swap',
    [],
    null
  );

  // Bootstrap CSS
  wp_enqueue_style(
    'bootstrap-css',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
    [],
    '5.3.3'
  );

  // style.css (thème) versionné pour casser le cache
  $style_path = get_stylesheet_directory() . '/style.css';
  $style_ver  = file_exists($style_path) ? filemtime($style_path) : wp_get_theme()->get('Version');
  wp_enqueue_style(
    'colofinder-style',
    get_stylesheet_uri(),
    ['bootstrap-css','colofinder-google-fonts'],
    $style_ver
  );

  // app.css (optionnel)
  $app_css_path = get_template_directory() . '/assets/css/app.css';
  if ( file_exists( $app_css_path ) ) {
    $app_css_ver = filemtime( $app_css_path );
    wp_enqueue_style(
      'colofinder-app-css',
      get_template_directory_uri() . '/assets/css/app.css',
      ['colofinder-style'],
      $app_css_ver
    );
  }

  // Bootstrap JS (bundle = avec Popper)
  wp_enqueue_script(
    'bootstrap-js',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    [],
    '5.3.3',
    true
  );

  // app.js (ton JS custom)
  $app_js_path = get_template_directory() . '/assets/js/app.js';
  if ( file_exists( $app_js_path ) ) {
    $app_js_ver = filemtime( $app_js_path );
    wp_enqueue_script(
      'colofinder-app-js',
      get_template_directory_uri() . '/assets/js/app.js',
      ['bootstrap-js'],
      $app_js_ver,
      true
    );
  }
}
add_action('wp_enqueue_scripts', 'colofinder_enqueue_assets');


/* ---------------------------------------------
 * 3) Custom Post Types (facultatifs mais gardés)
 * --------------------------------------------- */
function colofinder_register_cpts() {
  register_post_type('faqs', [
    'labels' => ['name' => 'FAQs'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'faqs']
  ]);

  register_post_type('services', [
    'labels' => ['name' => 'Services'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'services']
  ]);
}
add_action('init', 'colofinder_register_cpts');


/* ---------------------------------------------
 * 4) Détection des menus du header
 * --------------------------------------------- */
function cf_is_header_menu_args($args) {
  $by_location = isset($args->theme_location) && in_array($args->theme_location, ['primary','connected'], true);
  $by_name     = isset($args->menu) && in_array($args->menu, ['Menu principal','Menu connecté'], true);
  return $by_location || $by_name;
}

/* ---------------------------------------------
 * 5) Classes Bootstrap pour les menus
 * --------------------------------------------- */
add_filter('nav_menu_css_class', function ($classes, $item, $args) {
  if ( cf_is_header_menu_args($args) ) {
    $classes[] = 'nav-item';
    if ( in_array('menu-item-has-children', $classes, true) ) {
      $classes[] = 'dropdown';
    }
  }
  return $classes;
}, 10, 3);

add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {
  if ( cf_is_header_menu_args($args) ) {
    $base = 'nav-link';
    if ( in_array('menu-item-has-children', $item->classes ?? [], true) ) {
      $base .= ' dropdown-toggle';
      $atts['data-bs-toggle'] = $atts['data-bs-toggle'] ?? 'dropdown';
      $atts['aria-expanded']  = $atts['aria-expanded']  ?? 'false';
      $atts['role']           = $atts['role']           ?? 'button';
    }
    $atts['class'] = isset($atts['class']) ? $atts['class'].' '.$base : $base;
  }
  return $atts;
}, 10, 3);


/* ---------------------------------------------
 * 6) Redirections connexion / inscription
 * --------------------------------------------- */

// Redirection après connexion
add_filter('login_redirect', function($redirect_to, $request, $user){
  // Redirige toujours vers l'accueil (ou autre)
  return home_url('/');
}, 10, 3);

// Si tu veux rediriger vers la page "informations" à la place :
// add_filter('login_redirect', function(){ return get_permalink( get_page_by_path('informations') ); });


/* ---------------------------------------------
 * 8) Gestion du formulaire d'inscription
 * --------------------------------------------- */
function handle_custom_registration() {
  // Vérifie que les champs existent
  if ( empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password']) ) {
      wp_safe_redirect( home_url('/inscription?error=1') );
      exit;
  }

  $email    = sanitize_email($_POST['email']);
  $password = sanitize_text_field($_POST['password']);
  $confirm  = sanitize_text_field($_POST['confirm_password']);

  // Vérifie mots de passe identiques
  if ( $password !== $confirm ) {
      wp_safe_redirect( home_url('/inscription?error=1') );
      exit;
  }

  // Crée l’utilisateur WordPress
  $user_id = wp_create_user($email, $password, $email);

  if ( is_wp_error($user_id) ) {
      wp_safe_redirect( home_url('/inscription?error=1') );
      exit;
  }

  // Connecte automatiquement le nouvel utilisateur
  wp_set_current_user($user_id);
  wp_set_auth_cookie($user_id);

  // ✅ Redirige vers inscription2.php (slug de la page "Inscription2")
  wp_safe_redirect( home_url('/inscription2') );
  exit;
}
add_action('admin_post_nopriv_custom_registration', 'handle_custom_registration');
add_action('admin_post_custom_registration', 'handle_custom_registration');
