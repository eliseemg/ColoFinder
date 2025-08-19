<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<nav class="cf-nav" role="Menu" aria-label="Menu principal">
  <div class="container">
    <ul class="cf-quad">

      <!-- 1) Annonces -->
      <li class="cf-item has-submenu">
        <a href="#" class="cf-link" aria-haspopup="true" aria-expanded="false">Annonces</a>
        <ul class="cf-submenu" role="menu" aria-label="Sous-menu Annonces">
          <li role="none">
            <a role="menuitem" class="cf-sub-link" href="<?php echo esc_url( get_permalink( get_page_by_path('colocataires') ) ); ?>">
              Je recherche un logement
            </a>
          </li>
          <li role="none">
            <a role="menuitem" class="cf-sub-link" href="<?php echo esc_url( get_permalink( get_page_by_path('publier') ) ); ?>">
              Publier une annonce
            </a>
          </li>
        </ul>
      </li>

      <!-- 2) Logo CENTRÉ -->
      <li class="cf-item cf-logo">
        <a class="cf-logo-link" href="<?php echo esc_url( home_url('/') ); ?>">COLOFINDER</a>
      </li>

      <!-- 3) Profil -->
      <li class="cf-item has-submenu">
        <a href="#" class="cf-link" aria-haspopup="true" aria-expanded="false">Profil</a>
        <ul class="cf-submenu" role="menu" aria-label="Sous-menu Profil">
          <?php if ( is_user_logged_in() ) : ?>
            <li role="none">
              <a role="menuitem" class="cf-sub-link" href="<?php echo esc_url( get_permalink( get_page_by_path('informations') ) ); ?>">
                Informations
              </a>
            </li>
            <li role="none">
              <a role="menuitem" class="cf-sub-link" href="<?php echo esc_url( wp_logout_url( home_url('/') ) ); ?>">
                Se déconnecter
              </a>
            </li>
          <?php else : ?>
            <li role="none">
              <a role="menuitem" class="cf-sub-link" href="<?php echo esc_url( get_permalink( get_page_by_path('inscription') ) ); ?>">
                Inscription
              </a>
            </li>
            <li role="none">
              <a role="menuitem" class="cf-sub-link" href="<?php echo esc_url( get_permalink( get_page_by_path('connexion') ) ); ?>">
                Connexion
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </li>

      <!-- 4) Aide -->
      <li class="cf-item">
        <a class="cf-link" href="<?php echo esc_url( get_permalink( get_page_by_path('aide') ) ); ?>">Aide</a>
      </li>

    </ul>
  </div>
</nav>

