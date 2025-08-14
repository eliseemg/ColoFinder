
<?php /* Template Name: Acceuil */ 
get_header(); ?>
<main>
  
<section class="hero-section">
    <div class="hero-content">
        <!-- Grille d'images -->
        <div class="hero-images">
            <img src="<?php echo get_template_directory_uri()?>/assets/personne1.jpg" alt="Personne 1">
            <img src="<?php echo get_template_directory_uri()?>/assets/personne2.jpg" alt="Personne 2">
            <img src="<?php echo get_template_directory_uri()?>/assets/personne3.jpg" alt="Personne 3">
            <img src="<?php echo get_template_directory_uri()?>/assets/personne4.jpg" alt="Personne 4">
            <img src="<?php echo get_template_directory_uri()?>/assets/personne5.jpg" alt="Personne 5">
            <img src="<?php echo get_template_directory_uri()?>/assets/personne6.jpg" alt="Personne 6">
            <img src="<?php echo get_template_directory_uri()?>/assets/personne7.jpg" alt="Personne 7">
            <img src="<?php echo get_template_directory_uri()?>/assets/personne8.jpg" alt="Personne 8">
            <img src="<?php echo get_template_directory_uri()?>/assets/personne9.jpg" alt="Personne 9">
        </div>

        <!-- Texte -->
        <div class="hero-text">
            <h1>“UN TOIT, <br> UNE VIBE, <br> UN MATCH”</h1>
            <a href="<?php echo site_url('/inscription/'); ?>" class="cta-button">Créer un compte</a>
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
        <div class="animal">
            <img class="animal-icon"src="<?php echo get_template_directory_uri()?>path/to/wolf.png" alt="Loup">
            <h4>LOUP</h4>
            <p>Pour trouver un colocataire avec peu d’interactions.</p>
        </div>
        <div class="animal">
            <img src="path/to/mouse.png" alt="Souris" class="animal-icon">
            <h4>SOURIS</h4>
            <p>Pour trouver un contrat de colocation à court terme.</p>
        </div>
        <div class="animal">
            <img src="path/to/dog.png" alt="Chien" class="animal-icon">
            <h4>CHIEN</h4>
            <p>Pour trouver une ambiance familiale et se faire des amis.</p>
        </div>
        <div class="animal">
            <img src="path/to/panda.png" alt="Panda" class="animal-icon">
            <h4>PANDA</h4>
            <p>Pour trouver un espace tranquille, environnement calme.</p>
        </div>
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