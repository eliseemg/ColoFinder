<?php
/* Template Name: Publier */
get_header(); // Inclut le header global
?>

<div class="publier-container">
    <h1 class="publier-title">PUBLIER UNE ANNONCE</h1>

    <form action="process_publier.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
        <!-- Type de bien -->
        <div class="form-group">
            <label class="form-label">Type de bien</label>
            <div class="d-flex gap-3">
                <button type="button" class="btn-choice" data-value="maison">Maison</button>
                <button type="button" class="btn-choice" data-value="appartement">Appartement</button>
                <input type="hidden" name="type_bien" id="type_bien" required>
            </div>
        </div>

        <!-- Description du bien -->
        <div class="form-group">
            <label class="form-label">Description du bien</label>
            <textarea name="description_bien" placeholder="Ajouter une description" class="form-floating"></textarea>
        </div>

        <!-- Catégorie du bien -->
        <div class="form-group">
            <label class="form-label">Catégorie du bien</label>
            <div class="d-flex gap-3">
                <button type="button" class="btn-choice" data-value="peu-dinteraction">🐺 Peu d’interaction</button>
                <button type="button" class="btn-choice" data-value="contrat-court-terme">🐭 Contrat Court Terme</button>
                <button type="button" class="btn-choice" data-value="ambiance-familiale">🐶 Ambiance Familiale</button>
                <button type="button" class="btn-choice" data-value="espace-tranquille">🐼 Espace Tranquille</button>
                <input type="hidden" name="categorie_bien" id="categorie_bien" required>
            </div>
        </div>

        <!-- Aperçu -->
        <div class="form-group">
            <label class="form-label">Aperçu</label>
            <div class="row gx-2">
                <div class="col">
                    <input type="text" class="form-small" name="chambres" placeholder="Chambre(s)">
                </div>
                <div class="col">
                    <input type="text" class="form-small" name="taille" placeholder="Taille">
                </div>
                <div class="col">
                    <input type="text" class="form-small" name="salles_de_bain" placeholder="Salle de bain(s)">
                </div>
            </div>
            <div class="row gx-2 mt-2">
                <div class="col">
                    <input type="text" class="form-small" name="etages" placeholder="Etage(s)">
                </div>
                <div class="col">
                    <input type="text" class="form-small" name="commune" placeholder="Commune">
                </div>
                <div class="col">
                    <input type="text" class="form-small" name="prix_location" placeholder="Prix de location">
                </div>
            </div>
            <div class="row gx-2 mt-2">
                <div class="col">
                    <input type="text" class="form-small" name="nombre_colocataires" placeholder="Nombre de colocataire(s)">
                </div>
            </div>
        </div>

        <!-- Date de disponibilité -->
        <div class="form-group">
            <label class="form-label">Date de disponibilité</label>
            <div class="row gx-2">
                <div class="col">
                    <input type="text" class="form-small" name="jour" placeholder="JJ" maxlength="2">
                </div>
                <div class="col">
                    <input type="text" class="form-small" name="mois" placeholder="MM" maxlength="2">
                </div>
                <div class="col">
                    <input type="text" class="form-small" name="annee" placeholder="AAAA" maxlength="4">
                </div>
            </div>
        </div>

        <!-- Photos -->
        <div class="form-group">
            <label class="form-label">Photos de l’appartement/maison</label>
            <div class="d-flex flex-wrap gap-2">
                <?php for ($i = 1; $i <= 6; $i++) : ?>
                    <div class="photo-placeholder">
                        <input type="file" name="photo<?php echo $i; ?>" id="photo<?php echo $i; ?>" accept="image/*">
                        <img src="#" alt="Aperçu de la photo" id="preview-photo<?php echo $i; ?>" class="photo-preview" style="display: none;">
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Bouton Publier -->
        <div class="text-center mt-4">
            <a href="<?php echo get_permalink(get_page_by_path('Colocataires')); ?>" class="cta-button">Publier mon annonce</a>
        </div>
    </form>
</div>

<?php
get_footer();
?>

