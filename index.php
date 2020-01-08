<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MON SITE WORDPRESS3</title>

    <link rel="stylesheet" href="<?php echo get_theme_file_uri("/style.css") ?>">

    <!-- PERMET A WORDPRESS DE CHARGER DU CODE CSS -->
    <?php wp_head() ?>
    <!-- -FIN WPHEAD -->
</head>

<body <?php body_class(); ?>>
    <header>
        <h1>MON SITE WORDPRESS3</h1>
        <nav>
            <?php wp_nav_menu(["theme_location" => "primary"]) ?>
        </nav>
    </header>
    <main>

        <section>
            <!-- BOUCLE (LOOP) WORDPRESS -->
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <article>
                    <h4><?php the_title(); ?></h4>
                    <div><?php the_content(); ?></div>
                </article>
            <?php endwhile; ?>
        </section>

        <section>
            <h3>CONTENU DE LA SECTION</h3>
            <img src="<?php echo get_theme_file_uri("/assets/img/photo.jpg") ?>" alt="">
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
    <!-- PERMET A WORDPRESS DE CHARGER DU CODE HTML ET JS -->
    <?php wp_footer() ?>
    <!-- FIN WPFOOTER -->

    <script src="<?php echo get_theme_file_uri("/assets/js/script.js") ?>"></script>
</body>

</html>