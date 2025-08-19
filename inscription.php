<?php
/* Template Name: Inscription */
get_header();

// si déjà connecté, on évite la page
if ( is_user_logged_in() ) {
  wp_safe_redirect( home_url('/') );
  exit;
}
?>
     <div class="login-container"><!-- on réutilise le même wrapper que Connexion -->
         <h1 class="login-title">CRÉER UN COMPTE</h1>

  <?php
  if (isset($_GET['error']) && $_GET['error'] === '1') {
    echo '<p style="color:red" class="text-center">Une erreur est survenue. Veuillez réessayer.</p>';
  }
  if (isset($_GET['success']) && $_GET['success'] === '1') {
    echo '<p style="color:green" class="text-center">Votre compte a été créé avec succès !</p>';
  }
  ?>

  <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="POST" class="login-form" novalidate>
    <input type="hidden" name="action" value="custom_registration">

    <div class="form-group">
      <label for="email">Adresse e-mail</label>
      <input type="email" id="email" name="email" placeholder="Adresse e-mail" required>
    </div>

    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" id="password" name="password" placeholder="Mot de passe" required>
    </div>

    <div class="form-group">
      <label for="confirm_password">Confirmer le mot de passe</label>
      <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
    </div>

    <button type="submit" class="login-button">CONTINUER</button>
     </form>
   </div>
<?php get_footer(); ?>
