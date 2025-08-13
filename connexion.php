<?php
/* Template Name: Connexion */
get_header();
?>

<div class="login-container">
    <h1 class="login-title">CONNEXION</h1>
    <form action="process_connexion.php" method="POST" class="login-form">
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

<?php
get_footer(); 
?>

