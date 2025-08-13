<?php
/* Template Name: Informations Personnelles */
get_header(); // Inclut le header global
?>

<div class="container-informations mt-5 mb-5">
    <h1 class="title-informations text-center mb-4">Informations Personnelles</h1>

    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" enctype="multipart/form-data" class="form-informations needs-validation w-100" novalidate>
        <!-- Ligne prénom et photo -->
        <div class="row gx-5 gy-4 align-items-center">
            <!-- Prénom -->
            <div class="col-md-8">
                <div class="form-floating reduced-width-informations">
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo esc_attr($current_user->user_firstname); ?>" required>
                    <label for="prenom">Prénom</label>
                    <div class="invalid-feedback">Veuillez entrer votre prénom.</div>
                </div>
            </div>
            <!-- Photo de profil -->
            <div class="col-md-4 d-flex flex-column align-items-center photo-column-informations">
                <label for="photo" class="form-label">Photo de profil</label>
                <input type="file" class="form-control photo-input-informations" id="photo" name="photo" accept="image/*">
                <img id="photo-preview" src="<?php echo esc_url(get_user_meta($current_user->ID, 'photo', true)); ?>" alt="Aperçu de la photo" class="photo-preview-informations mt-2">
            </div>
        </div>

        <!-- Anniversaire (verrouillé) -->
        <div class="form-group mb-3 reduced-width-informations">
            <label class="form-label">Anniversaire</label>
            <div class="row gx-2">
                <div class="col-4">
                    <input type="text" class="form-control" id="jour" name="jour" placeholder="JJ" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'jour', true)); ?>" disabled>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" id="mois" name="mois" placeholder="MM" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'mois', true)); ?>" disabled>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" id="annee" name="annee" placeholder="AAAA" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'annee', true)); ?>" disabled>
                </div>
            </div>
        </div>

        <!-- Genre -->
        <div class="form-group mb-3">
            <label class="form-label">Genre</label>
            <div class="d-flex flex-wrap gap-2 reduced-width-informations">
                <button type="button" class="btn-choice-informations <?php echo get_user_meta($current_user->ID, 'genre', true) === 'homme' ? 'active' : ''; ?>" data-value="homme">Homme</button>
                <button type="button" class="btn-choice-informations <?php echo get_user_meta($current_user->ID, 'genre', true) === 'femme' ? 'active' : ''; ?>" data-value="femme">Femme</button>
                <button type="button" class="btn-choice-informations <?php echo get_user_meta($current_user->ID, 'genre', true) === 'autres' ? 'active' : ''; ?>" data-value="autres">Autres</button>
                <input type="hidden" name="genre" id="genre" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'genre', true)); ?>">
            </div>
        </div>

        <!-- Je recherche -->
        <div class="form-group mb-3">
            <label class="form-label">Je recherche</label>
            <div class="d-flex flex-wrap gap-2 reduced-width-informations">
                <button type="button" class="btn-choice-informations <?php echo get_user_meta($current_user->ID, 'recherche', true) === 'peu-dinteraction' ? 'active' : ''; ?>" data-value="peu-dinteraction">🐺 Peu d’interaction</button>
                <button type="button" class="btn-choice-informations <?php echo get_user_meta($current_user->ID, 'recherche', true) === 'contrat-court-terme' ? 'active' : ''; ?>" data-value="contrat-court-terme">🐭 Contrat Court Terme</button>
                <button type="button" class="btn-choice-informations <?php echo get_user_meta($current_user->ID, 'recherche', true) === 'ambiance-familiale' ? 'active' : ''; ?>" data-value="ambiance-familiale">🐶 Ambiance Familiale</button>
                <button type="button" class="btn-choice-informations <?php echo get_user_meta($current_user->ID, 'recherche', true) === 'espace-tranquille' ? 'active' : ''; ?>" data-value="espace-tranquille">🐼 Espace Tranquille</button>
                <input type="hidden" name="recherche" id="recherche" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'recherche', true)); ?>">
            </div>
        </div>

        <!-- Passions -->
        <div class="form-floating mb-3 reduced-width-informations">
            <input type="text" class="form-control" id="passion" name="passion" placeholder="Ajouter des passions" value="<?php echo esc_attr(get_user_meta($current_user->ID, 'passion', true)); ?>">
            <label for="passion">Ajouter des passions</label>
        </div>

        <!-- Présentation -->
        <div class="form-floating mb-3 reduced-width-informations">
            <textarea class="form-control" id="presentation" name="presentation" placeholder="Je me présente"><?php echo esc_textarea(get_user_meta($current_user->ID, 'presentation', true)); ?></textarea>
            <label for="presentation">Je me présente</label>
        </div>

        <!-- Bouton Enregistrer -->
        <div class="text-center reduced-width-informations">
         <a href="<?php echo get_permalink(get_page_by_path('Colocataires')); ?>" class="cta-button">Enregistrer</a>
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
