<?php
/* Template Name: Aide */
get_header(); // Inclure le header
?>

<div class="container mt-5 aide-container">
    <h1 class="text-center mb-4">CONTACT</h1>
    <div class="form-wrapper">
        <form action="" method="POST" class="needs-validation" novalidate>
            <div class="row g-4"> <!-- Ajout d'une grille pour aligner les champs -->

                <!-- Prénom -->
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
                        <div class="invalid-feedback">Veuillez entrer votre prénom.</div>
                    </div>
                </div>

                <!-- Adresse e-mail -->
                <div class="col-md-6">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Adresse e-mail" required>
                        <div class="invalid-feedback">Veuillez entrer une adresse e-mail valide.</div>
                    </div>
                </div>

            </div>

            <!-- Sujet -->
            <div class="mb-3 mt-4">
                <label for="sujet" class="form-label">Sujet</label>
                <select class="form-select" id="sujet" name="sujet" required>
                    <option selected disabled value="">Sélectionner un sujet</option>
                    <option value="probleme-technique">Problème technique</option>
                    <option value="temoignages">Témoignages</option>
                    <option value="suggestion">Suggestion</option>
                    <option value="annonce-suspecte">Annonce suspecte</option>
                </select>
                <div class="invalid-feedback">Veuillez sélectionner un sujet.</div>
            </div>

            <!-- Message -->
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Écrivez votre message ici..." required></textarea>
                <div class="invalid-feedback">Veuillez entrer votre message.</div>
            </div>

            <!-- Bouton d'envoi -->
            <button type="submit" class="btn btn-submit">Envoyer</button>
        </form>
    </div>
</div>

<script>
// Validation Bootstrap pour le formulaire
(function () {
    'use strict';
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
</script>

<?php
get_footer(); // Inclure le footer
?>
