<?php
/* Template Name: Profil Coloc */
get_header();
?>

<div class="profil-container">
    <!-- Section Profil -->
    <div class="profil-header">
    <div class="profil-avatar">
        <?php
        // Récupérer l'article avec le titre "photo-henry"
        $article_photo_henry = new WP_Query([
            'post_type' => 'post', // Type de contenu (article)
            'name' => 'photo-henry', // Slug de l'article
        ]);

        if ($article_photo_henry->have_posts()) :
            while ($article_photo_henry->have_posts()) : $article_photo_henry->the_post();
                // Récupérer tout le contenu de l'article (incluant les images)
                $content = get_the_content();

                // Extraire la première balise <img> du contenu
                preg_match('/<img[^>]+>/i', $content, $image);

                if (!empty($image[0])) :
                    echo $image[0]; // Affiche l'image extraite
                else :
                    echo '<p>Aucune image trouvée.</p>';
                endif;
            endwhile;
        else :
            echo '<p>Aucun article trouvé.</p>';
        endif;

        // Réinitialise la boucle globale de WordPress
        wp_reset_postdata();
        ?>
    </div>

        <div class="profil-info">
            <h1 class="profil-name">HENRI</h1>
            <p class="profil-description">
                Salut ! Je m'appelle Henri et je suis à la recherche d’un colocataire qui partage ma passion pour la photographie. 
                Si tu aimes capturer des moments, explorer de nouveaux lieux pour des shootings, ou même discuter des dernières tendances en photo, alors on s’entendra à coup sûr !
                Je suis quelqu’un de calme, respectueux et je cherche quelqu’un avec qui partager non seulement un espace de vie, mais aussi des moments créatifs autour de notre passion commune.
                L’appartement est spacieux et bien situé, idéal pour les séances photos ou simplement pour discuter de nos dernières prises de vue.
            </p>
            <p class="profil-message">
                Si tu cherches une colocation avec une ambiance créative et que tu partages ma passion pour la photographie, n’hésite pas à me contacter !
            </p>
        </div>
    </div>

    <!-- Formulaire Contact -->
    <div class="contact-section">
        <h2 class="section-title">Contacter</h2>
        <form action="#" method="POST" class="contact-form">
            <input type="text" name="prenom" placeholder="Prénom" required> 
            <input type="text" name="nom" placeholder="Nom" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="tel" name="telephone" placeholder="Téléphone" required>
            <button type="submit" class="contact-button">Envoyer ma demande</button>
        </form>
    </div>

    <!-- Détails -->
    <div class="details-section">
        <h2 class="section-title">Détails</h2>
        <table class="details-table">
            <tr>
                <th>Passion</th>
                <td>Photographie</td>
            </tr>
            <tr>
                <th>Je recherche</th>
                <td>🐶 Ambiance Familiale</td>
            </tr>
            <tr>
                <th>Type de bien</th>
                <td>Appartement</td>
            </tr>
            <tr>
                <th>Aperçu</th>
                <td>2 chambres, 76m², 1 salle de bain, 3ème étage</td>
            </tr>
            <tr>
                <th>Prix de location</th>
                <td>550€/mois</td>
            </tr>
            <tr>
                <th>Date de disponibilité</th>
                <td>20/05/2025</td>
            </tr>
            <tr>
                <th>Localisation</th>
                <td>Schaerbeek</td>
            </tr>
        </table>
    </div>

    <!-- Galerie -->
    <div class="gallery-section">
    <h2 class="section-title">Galerie</h2>
    <div class="gallery-grid">
        <?php
        // Récupérer l'article avec le titre "galleria"
        $article_galleria = new WP_Query([
            'post_type' => 'post', // Type de contenu (article)
            'name' => 'galleria', // Slug de l'article
        ]);

        if ($article_galleria->have_posts()) :
            while ($article_galleria->have_posts()) : $article_galleria->the_post();
                // Récupérer tout le contenu de l'article (incluant les images)
                $content = get_the_content();

                // Extraire les balises <img> du contenu
                preg_match_all('/<img[^>]+>/i', $content, $images);

                // Afficher chaque image de la galerie
                if (!empty($images[0])) :
                    foreach ($images[0] as $img) :
                        echo '<div class="gallery-item">';
                        echo $img; // Affiche l'image
                        echo '</div>';
                    endforeach;
                else :
                    echo '<p>Aucune image trouvée dans cet article.</p>';
                endif;
            endwhile;
        else :
            echo '<p>Aucun article trouvé.</p>';
        endif;

        // Réinitialise la boucle globale de WordPress
        wp_reset_postdata();
        ?>
    </div>
 </div>
</div>

<?php
get_footer();
?>
