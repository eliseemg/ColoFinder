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
                <a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/facebook.png" alt="Facebook"> 
                </a>
                <a href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/instagram.png" alt="Instagram">
                </a>
                <a href="https://www.twitter.com/" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/twitter.png" alt="Twitter">
                </a>
                <a href="https://www.tiktok.com/" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/tiktok.png" alt="TikTok">
                </a>
               
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