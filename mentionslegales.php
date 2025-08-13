<!-- PHP Code: mentions-legales.php -->
<?php
/* Template Name: Mentions Légales */
get_header(); // Inclut l'en-tête globale
?>

<div class="legal-mentions-container">
    <h1 class="legal-title">Mentions Légales</h1>
    <form class="legal-form">
        <div class="form-group">
            <label for="company-name">Nom de la Société</label>
            <input type="text" id="company-name" value="COLOFINDER" readonly>
        </div>
        <div class="form-group">
            <label for="legal-form">Forme Juridique</label>
            <input type="text" id="legal-form" value="SRL" readonly>
        </div>
        <div class="form-group">
            <label for="address">Adresse Postale Juridique</label>
            <input type="text" id="address" value="123 Rue des Immeubles, 1000, Bruxelles, Belgique" readonly>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" id="phone" value="+32 478 56 34 12" readonly>
        </div>
        <div class="form-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" value="contact@colofinder.com" readonly>
        </div>
        <div class="form-group">
            <label for="bce-tva">Numéro BCE et TVA</label>
            <input type="text" id="bce-tva" value="Numéro BCE : BE 123.456.777 / Numéro de TVA : BE 234.567.888" readonly>
        </div>
    </form>
</div>

<?php
get_footer(); // Inclut le pied de page global
?>
