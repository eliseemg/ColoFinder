<?php
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_filter('upload_mimes', 'enable_svg_upload');
function enable_svg_upload($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

register_nav_menu('header', 'En tête du menu');

function styles_scripts()
{
  wp_enqueue_style(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'
  );
  wp_enqueue_style(
    'style',
    get_template_directory_uri() . '/assets/css/app.css'
  );

  wp_enqueue_script(
    'bootstrap-bundle',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    false,
    1,
    true
  );
  wp_enqueue_script(
    'app-js',
    get_template_directory_uri() . '/assets/js/app.js',
    ['bootstrap-bundle'],
    1,
    true
  );
}
add_action('wp_enqueue_scripts', 'styles_scripts');

// CUSTOM POSTS TYPES

function create_post_type()
{
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
add_action('init', 'create_post_type');

// MENUS
function menuheader_class($classes)
{
  $classes[] = 'nav-item';
  return $classes;
}
add_filter('nav_menu_css_class', 'menuheader_class');

function menuheader_link_class($attributes)
{
  $attributes['class'] = 'nav-link';
  return $attributes;
}
add_filter('nav_menu_link_attributes', 'menuheader_link_class');

function colofinder_enqueue_styles() {
  // Charger les styles
  wp_enqueue_style('colofinder-style', get_stylesheet_uri());
  
  // Charger les polices Google
  wp_enqueue_style('colofinder-google-fonts', 'https://fonts.googleapis.com/css2?family=Bungee&family=Roboto:wght@400;500&family=Carter+One&display=swap', [], null);
}

add_action('wp_enqueue_scripts', 'colofinder_enqueue_styles');
// Fonction pour récupérer les témoignages (chemins des images)
function get_testimonials() {
  return [
      get_template_directory_uri() . '/assets/img/temoignage_Jim.png',
      get_template_directory_uri() . '/assets/img/temoignage_Jennie.png',
      get_template_directory_uri() . '/assets/img/temoignage_hawa.png',
  ];
}

function charger_bootstrap_et_styles_inscription() {
  // Bootstrap CSS
  wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
  // Votre style CSS spécifique
  wp_enqueue_style('style-inscription', get_template_directory_uri() . '/style-inscription.css');

  // Bootstrap JS
  wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'charger_bootstrap_et_styles_inscription');

function charger_css_page_aide() {
  if (is_page_template('aide.php')) { // Vérifie si le template actif est "aide.php"
      wp_enqueue_style('style-aide', get_template_directory_uri() . '/css/style-aide.css', array(), '1.0');
  }
}
add_action('wp_enqueue_scripts', 'charger_css_page_aide');

function charger_styles_inscription() {
  if (is_page_template('page-inscription.php')) {
      wp_enqueue_style('style-inscription', get_template_directory_uri() . '/style-inscription.css');
  }
}
add_action('wp_enqueue_scripts', 'charger_styles_inscription');
function charger_styles_inscription_partie_2() {
  if (is_page_template('page-inscription-partie-2.php')) {
      wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
      wp_enqueue_style('style-inscription-partie-2', get_template_directory_uri() . '/assets/css/style-inscription-partie-2.css');
      wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), null, true);
  }
}
add_action('wp_enqueue_scripts', 'charger_styles_inscription_partie_2');
function charger_styles_connexion() {
  if (is_page_template('connexion.php')) {
      wp_enqueue_style('style-connexion', get_template_directory_uri() . '/style-connexion.css');
  }
}
add_action('wp_enqueue_scripts', 'charger_styles_connexion');
function enqueue_custom_styles() {
  wp_enqueue_style('main-style', get_template_directory_uri() . '/styles.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');
function charger_styles_publier() {
  // Vérifie si on est sur la page avec le modèle "Publier"
  if (is_page_template('publier.php')) {
      // Charger le fichier CSS spécifique à la page Publier
      wp_enqueue_style(
          'publier-style',
          get_template_directory_uri() . '/css/publier.css', // Assurez-vous que ce chemin est correct
          [],
          '1.0'
      );

      // Charger Bootstrap si nécessaire (au cas où il n'est pas encore chargé globalement)
      wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');
      wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], null, true);
  }
}

