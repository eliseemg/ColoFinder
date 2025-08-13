<?php
/* Template Name: Inscription */
get_header(); // Inclut le header du thème actif
?>

<div class="main-content"> <!-- Conteneur principal avec flex-grow -->
    <div class="container mt-5" style="max-width: 500px;">
        <h1 class="text-center mb-4 inscription-title">Créer un compte</h1>

        <?php
        // Affichage des messages d'erreur ou de succès
        if (isset($_GET['error']) && $_GET['error'] === '1') {
            echo '<p class="alert alert-danger text-center">Une erreur est survenue. Veuillez réessayer.</p>';
        }
        if (isset($_GET['success']) && $_GET['success'] === '1') {
            echo '<p class="alert alert-success text-center">Votre compte a été créé avec succès !</p>';
        }
        ?>

        <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="needs-validation" novalidate>
            <!-- Action WordPress pour traiter les données -->
            <input type="hidden" name="action" value="custom_registration">

            <!-- Champ e-mail -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Adresse e-mail</label>
                <div class="invalid-feedback">Veuillez entrer une adresse e-mail valide.</div>
            </div>

            <!-- Champ mot de passe -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                <label for="password">Mot de passe</label>
                <div class="invalid-feedback">Veuillez entrer un mot de passe.</div>
            </div>

            <!-- Champ confirmation de mot de passe -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
                <label for="confirm_password">Confirmer le mot de passe</label>
                <div class="invalid-feedback">Veuillez confirmer votre mot de passe.</div>
            </div>

            <!-- Bouton d'inscription -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-submit w-100 py-2">
                    Continuer
                </button>
                 <form action="<?php echo get_permalink(get_page_by_path('Inscription2')); ?>" method="POST" class="needs-validation" novalidate > 
                 <li> <a href="<?php echo get_permalink(get_page_by_path('Inscription2')); ?>">Continuer </a></li>
            </div>
        </form>
    </div>
</div>



<script>
// Validation Bootstrap pour le formulaire
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})();
</script>


<?php
get_footer(); // Inclut le footer du thème actif
?>


