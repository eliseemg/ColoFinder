<?php get_header(); ?>
<main>
  
<section class="hero-section">
    <div class="hero-content">
        <!-- Grille d'images -->
        <?php
// Vérifie si WordPress trouve des articles
if (have_posts()) :
    // Boucle : récupère chaque article
    while (have_posts()) : the_post();

        // Vérifie si le titre de l'article est "image-personne-1"
        if (get_the_title() === "image-personne-1") : ?>
            <div class="article">

                <!-- Affiche l'image mise en avant -->
                <?php
                if (has_post_thumbnail()) { // Si une image mise en avant est définie
                    the_post_thumbnail('large'); // Affiche l'image
                }
                ?>

                <!-- Affiche le contenu de l'article -->
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endif;

    endwhile;
else :
    echo "<p>Aucun article trouvé</p>";
endif;
?>


        <!-- Texte -->
        <div class="hero-text">
            <h1>“UN TOIT, <br> UNE VIBE, <br> UN MATCH”</h1>
            <a href="<?php echo get_permalink(get_page_by_path('inscription')); ?>" class="cta-button">Créer un compte</a>
        </div>
    </div>
</section>

    <section class="concept-section">
    <h2 class="concept-title">LE CONCEPT</h2>

    <!-- Étapes numérotées -->
    <div class="steps-container">
        <div class="step">
            <div class="step-number">1</div>
            <div class="step-content">
                <h3>Créez votre profil</h3>
                <p>Décrivez vos habitudes de vie, vos passions, et ce que vous recherchez chez un colocataire.</p>
            </div>
        </div>
        <div class="step">
            <div class="step-number">2</div>
            <div class="step-content">
                <h3>Explorez les profils</h3>
                <p>Parcourez les profils de ceux qui cherchent aussi une colocation et découvrez leurs personnalités, préférences et besoins.</p>
            </div>
        </div>
        <div class="step">
            <div class="step-number">3</div>
            <div class="step-content">
                <h3>Faites le tri avec nos "animaux"</h3>
                <p>Chaque profil est associé à un animal symbolisant une personnalité.</p>
            </div>
        </div>
        <div class="step">
            <div class="step-number">4</div>
            <div class="step-content">
                <h3>Trouvez votre match et discutez</h3>
                <p>Vous avez trouvé un profil qui vous plaît ? Discutez avec votre futur colocataire.</p>
            </div>
        </div>
    </div>

    <!-- Section Animaux -->
    <div class="animals-container">
    <?php
    // Récupérer l'article avec le titre "Animaux"
    $article_animaux = new WP_Query([
        'post_type' => 'post', // Type de contenu (article)
        'name' => 'animaux', // Slug de l'article
    ]);

    if ($article_animaux->have_posts()) :
        while ($article_animaux->have_posts()) : $article_animaux->the_post();
            // Récupérer tout le contenu de l'article (incluant les images)
            $content = get_the_content();

            // Extraire les balises <img> du contenu
            preg_match_all('/<img[^>]+>/i', $content, $images);

            // Définitions des titres et descriptions correspondant aux images
            $titles = ['LOUP', 'SOURIS', 'CHIEN', 'PANDA'];
            $descriptions = [
                'Pour trouver un colocataire avec peu d’interactions.',
                'Pour trouver un contrat de colocation à court terme.',
                'Pour trouver une ambiance familiale et se faire des amis.',
                'Pour trouver un espace tranquille, environnement calme.',
            ];

            // Afficher chaque animal avec ses détails
            if (!empty($images[0])) :
                foreach ($images[0] as $index => $img) :
                    $title = $titles[$index] ?? 'ANIMAL'; // Titre par défaut
                    $description = $descriptions[$index] ?? '';
                    ?>
                    <div class="animal">
                        <?php echo $img; // Affiche l'image ?>
                        <h4><?php echo esc_html($title); ?></h4>
                        <p><?php echo esc_html($description); ?></p>
                    </div>
                <?php
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
</section>


    <!-- Section Témoignages -->
    <section class="testimonials-section">
    <h2>Témoignages</h2>
    <div class="testimonials-container">
        <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Lisa</div>
            <div class="card-body">
                <p class="card-text">J'ai trouvé mon colocataire idéal grâce à ce site ! Je cherchais quelqu'un avec qui partager un appartement tout en ayant des espaces privés. On se croise de temps en temps dans le salon, mais c'est exactement ce que je voulais : une ambiance tranquille sans trop d'interactions. Je me sens vraiment chez moi !</p>
            </div>
        </div>
        <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Jim</div>
            <div class="card-body">
                <p class="card-text">Je recherchais une colocation avec une vraie ambiance familiale, où tout le monde se soutient. Ce site m'a permis de trouver un appartement avec des colocataires chaleureux et bienveillants. On mange ensemble, on discute de tout et de rien, et je me sens vraiment bien entouré. C'est comme une deuxième famille</p>
            </div>
        </div>
        <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-header">Jennie</div>
            <div class="card-body">
                <p class="card-text">Je venais d'emménager dans une nouvelle ville et je cherchais une colocation où je pourrais aussi me faire des amis. Ce site m'a permis de trouver une super colocataire, avec qui je m'entends très bien ! On passe du temps ensemble, on se soutient dans nos projets et ça m'a vraiment aidée à me sentir chez moi rapidement.</p>
            </div>
        </div>
    </div>
</section>
</main>

<?php get_footer(); ?>