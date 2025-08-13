<?php wp_footer(); ?>
</body>
<footer class="site-footer">
    <div class="footer-container">
        <!-- Section A propos -->
        <div class="footer-section">
            <h4>A propos</h4>
            <p>Colofinder</p>
        </div>

        <!-- Section Réseaux sociaux -->
        <div class="footer-section">
            <h4>Réseaux sociaux</h4>
            <div class="social-icons">
    <?php
    // Récupérer l'article avec le titre "reseaux"
    $article_reseaux = new WP_Query([
        'post_type' => 'post', // Type de contenu (article)
        'name' => 'reseaux', // Slug de l'article
    ]);

    if ($article_reseaux->have_posts()) :
        while ($article_reseaux->have_posts()) : $article_reseaux->the_post();
            // Récupérer tout le contenu de l'article (incluant les images)
            $content = get_the_content();

            // Extraire les balises <img> du contenu
            preg_match_all('/<img[^>]+>/i', $content, $images);

            // Afficher chaque image dans un lien social
            if (!empty($images[0])) :
                foreach ($images[0] as $index => $img) :
                    // Définir des liens personnalisés en fonction de l'ordre ou autre logique
                    $links = ['https://www.tiktok.com', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.x.com'];
                    $link = $links[$index] ?? '#'; // Utilise les liens définis ou un lien par défaut
                    ?>
                    <a href="<?php echo esc_url($link); ?>" aria-label="Social Link">
                        <?php echo $img; // Affiche l'image ?>
                    </a>
                <?php
                endforeach;
            else :
                echo '<p>Aucune icône trouvée dans cet article.</p>';
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

        <!-- Logo principal -->
        <div class="footer-logo">
            <h1>COLO<span>FINDER</span></h1>
        </div>

        <!-- Section Aide -->
        <div class="footer-section">
            <h4>Aide</h4>
            <p><a href="<?php echo get_permalink(get_page_by_path('Aide')); ?>" class="link">Contactez-nous</a></p>
        </div>

        <!-- Section Mentions légales -->
        <div class="footer-section">
            <h4>Mentions légales</h4>
            <p><a href="<?php echo get_permalink(get_page_by_path('mentions')); ?>" class="link">Mentions légales</a></p>
        </div>
    </div>
</footer>
</html>