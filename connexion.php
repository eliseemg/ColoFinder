<?php
/* Template Name: Connexion */
get_header();

// Si déjà connecté → redirection directe
if ( is_user_logged_in() ) {
    wp_safe_redirect( home_url('/') );
    exit;
}

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $creds = [];
    $creds['user_login']    = sanitize_text_field($_POST['email'] ?? '');
    $creds['user_password'] = $_POST['password'] ?? '';
    $creds['remember']      = true;

    $user = wp_signon($creds, false);

    if ( is_wp_error($user) ) {
        $error_message = $user->get_error_message();
    } else {
        // Connexion réussie → redirection (modifie l’URL si tu veux "informations")
        wp_safe_redirect( home_url('/') ); 
        exit;
    }
}
?>

<div class="login-container">
    <h1 class="login-title">CONNEXION</h1>

    <?php if (!empty($error_message)) : ?>
        <p style="color:red;"><?= $error_message; ?></p>
    <?php endif; ?>

    <form method="POST" class="login-form">
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" placeholder="Adresse e-mail" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required>
        </div>
        <button type="submit" class="login-button">SE CONNECTER</button>
    </form>
</div>

<?php get_footer(); ?>

