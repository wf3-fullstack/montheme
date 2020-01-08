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

<body>
    <header>
        <h1>MON SITE WORDPRESS3</h1>
    </header>
    <main>
        <section>
            <h3>CONTENU DE LA SECTION</h3>
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
    <!-- PERMET A WORDPRESS DE CHARGER DU CODE HTML ET JS -->
    <?php wp_footer() ?>
    <!-- FIN WPFOOTER -->

</body>

</html>