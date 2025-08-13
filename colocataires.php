<?php
/* Template Name: Recherche de Colocataires */
get_header(); // Inclut le header global
?>

<div class="container-colocataires mt-5 mb-5">
    <!-- Titre de la page -->
    <h1 class="title-colocataires text-center mb-4">Recherche de Colocataires</h1>

    <!-- Filtres -->
    <div class="filters-container mb-5">
        <!-- Boutons des filtres -->
        <div class="d-flex flex-wrap justify-content-center gap-3 mb-3">
            <button class="btn-choice" data-value="peu-dinteraction">🐺 Peu d’interaction</button>
            <button class="btn-choice" data-value="contrat-court-terme">🐭 Contrat Court Terme</button>
            <button class="btn-choice" data-value="ambiance-familiale">🐶 Ambiance Familiale</button>
            <button class="btn-choice" data-value="espace-tranquille">🐼 Espace Tranquille</button>
        </div>

        <!-- Champs de recherche -->
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <input type="text" class="filter-input" placeholder="Saisissez une commune">
            <input type="text" class="filter-input" placeholder="Budget">
            <input type="text" class="filter-input" placeholder="Type">
            <input type="text" class="filter-input" placeholder="Nombre de colocataire(s)">
        </div>
    </div>

   <div class="users-container d-flex flex-wrap gap-4 justify-content-center">
    <?php
    // Récupérer l'article avec le titre "Colocation"
    $article_colocation = new WP_Query([
        'post_type' => 'post',
        'name' => 'colocation',
    ]);

    if ($article_colocation->have_posts()) :
        while ($article_colocation->have_posts()) : $article_colocation->the_post();
            // Récupérer tout le contenu de l'article (incluant les images)
            $content = get_the_content();

            // Extraire les balises <img> du contenu
            preg_match_all('/<img[^>]+>/i', $content, $images);

            if (!empty($images[0])) :
                foreach ($images[0] as $img) :
                    // Extraire le texte alternatif de l'image
                    preg_match('/alt="([^"]*)"/', $img, $alt_text);
                    $name = !empty($alt_text[1]) ? $alt_text[1] : 'Nom inconnu';

                    // Ajouter des liens dynamiques pour les pages WordPress
                    $link = '#';
                    if ($name === 'Henri') {
                        $link = get_permalink(get_page_by_path('profilcoloc'));
                    } elseif ($name === 'Julie') {
                        $link = get_permalink(get_page_by_path('profilcolo2'));
                    }
    ?>
                    <div class="user-card">
                        <a href="<?php echo esc_url($link); ?>">
                            <?php echo $img; ?>
                        </a>
                        <h4 class="user-name"><?php echo $name; ?></h4>
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

    wp_reset_postdata();
    ?>
</div>

    <!-- Pagination -->
    <div class="pagination-container mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<script>
// Interaction pour les boutons des catégories avec emojis
document.querySelectorAll('.btn-choice').forEach(button => {
    button.addEventListener('click', function () {
        // Supprimer la classe "active" des autres boutons
        document.querySelectorAll('.btn-choice').forEach(btn => btn.classList.remove('active'));

        // Ajouter la classe "active" au bouton sélectionné
        this.classList.add('active');
    });
});
</script>

<?php
get_footer();
?>
