<?php
/* Template Name: Inscription Partie 2 */
get_header(); // Inclut le header global
?>

<div class="container-inscription mt-5 mb-5">
    <h1 class="title-inscription text-center mb-4">Créer un compte</h1>

    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" enctype="multipart/form-data" class="form-inscription needs-validation w-100" novalidate>
        <!-- Ligne prénom et photo -->
        <div class="row gx-5 gy-4 align-items-center">
    <!-- Prénom -->
    <div class="col-md-8">
        <div class="form-floating reduced-width">
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
            <label for="prenom">Prénom</label>
            <div class="invalid-feedback">Veuillez entrer votre prénom.</div>
        </div>
    </div>
    <!-- Photo de profil -->
    <div class="col-md-4 d-flex flex-column align-items-center photo-column">
        <label for="photo" class="form-label">Photo de profil</label>
        <input type="file" class="form-control photo-input" id="photo" name="photo" accept="image/*">
        <img id="photo-preview" src="#" alt="Aperçu de la photo" class="photo-preview mt-2">
    </div>
</div>

        <!-- Anniversaire -->
        <div class="form-group mb-3 reduced-width">
            <label class="form-label">Anniversaire</label>
            <div class="row gx-2">
                <div class="col-4">
                    <input type="text" class="form-control" id="jour" name="jour" placeholder="JJ" maxlength="2" required>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" id="mois" name="mois" placeholder="MM" maxlength="2" required>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" id="annee" name="annee" placeholder="AAAA" maxlength="4" required>
                </div>
            </div>
            <div class="invalid-feedback">Veuillez entrer une date de naissance valide.</div>
        </div>

        <!-- Genre -->
        <div class="form-group mb-3">
            <label class="form-label">Genre</label>
            <div class="d-flex flex-wrap gap-2 reduced-width">
                <button type="button" class="btn-choice" data-value="homme">Homme</button>
                <button type="button" class="btn-choice" data-value="femme">Femme</button>
                <button type="button" class="btn-choice" data-value="autres">Autres</button>
                <input type="hidden" name="genre" id="genre" required>
            </div>
        </div>

        <!-- Je recherche -->
        <div class="form-group mb-3">
            <label class="form-label">Je recherche</label>
            <div class="d-flex flex-wrap gap-2 reduced-width">
                <button type="button" class="btn-choice" data-value="peu-dinteraction">🐺 Peu d’interaction</button>
                <button type="button" class="btn-choice" data-value="contrat-court-terme">🐭 Contrat Court Terme</button>
                <button type="button" class="btn-choice" data-value="ambiance-familiale">🐶 Ambiance Familiale</button>
                <button type="button" class="btn-choice" data-value="espace-tranquille">🐼 Espace Tranquille</button>
                <input type="hidden" name="recherche" id="recherche" required>
            </div>
        </div>

        <!-- Passions -->
        <div class="form-floating mb-3 reduced-width">
            <input type="text" class="form-control" id="passion" name="passion" placeholder="Ajouter des passions">
            <label for="passion">Ajouter des passions</label>
        </div>

        <!-- Présentation -->
        <div class="form-floating mb-3 reduced-width">
            <textarea class="form-control" id="presentation" name="presentation" placeholder="Je me présente"></textarea>
            <label for="presentation">Je me présente</label>
        </div>

        <!-- Bouton Créer mon compte -->
        <div class="text-center reduced-width">
           <a href="<?php echo get_permalink(get_page_by_path('Colocataires')); ?>" class="cta-button">Créer un compte</a>
        </div>

        <!-- Lien vers Se connecter -->
        <p class="text-center mt-3 reduced-width">
            T'as déjà un compte ? <a href="<?php echo wp_login_url(''); ?>" class="text-decoration-none se-connecter-link">Se connecter</a>
        </p>
    </form>
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

// Interaction pour les boutons de choix
document.querySelectorAll('.btn-choice').forEach(button => {
    button.addEventListener('click', function () {
        const siblings = this.parentNode.querySelectorAll('.btn-choice');
        siblings.forEach(sib => sib.classList.remove('active'));
        this.classList.add('active');
        const hiddenInput = this.parentNode.querySelector('input[type="hidden"]');
        hiddenInput.value = this.getAttribute('data-value');
    });
});

// Affichage de l'aperçu de la photo
document.getElementById('photo').addEventListener('change', function (event) {
    const [file] = event.target.files;
    const preview = document.getElementById('photo-preview');
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
    }
});
</script>

<?php
get_footer(); // Inclut le footer global
?>
