<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MON SITE WORDPRESS3</title>

    <!--
    <link rel="stylesheet" href="<?php echo get_theme_file_uri("/style.css") ?>">
    -->
    
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

    