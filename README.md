## COMMENT CREER UN THEME WORDPRESS DE ZERO


## CREER UN NOUVEAU THEME

    CREER UN DOSSIER 
        wp-content/themes/montheme/

    CREER 2 FICHIERS 
        wp-content/themes/montheme/style.css
        wp-content/themes/montheme/index.php


## CODER SON TEMPLATE PAR DEFAUT index.php

    DANS LE FICHIER index.php
    ON PEUT CODER UNE PAGE HTML 
    ET ON INSERE DU CODE PHP DE WORDPRESS POUR OBTENIR LE CSS ET JS

    wp_head
    wp_footer
    get_theme_file_uri
    body_class
    wp_nav_menu

    https://developer.wordpress.org/reference/functions/wp_head/
    https://developer.wordpress.org/reference/functions/wp_footer/
    https://developer.wordpress.org/reference/functions/get_theme_file_uri/


```php
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
</body>

</html>
```

## AJOUTER DES CLASSES SUR LA BALISE body

    ON PEUT AJOUTER LA FONCTION body_class
    QUI VA CREER DES CLASSES SUR LA BALISE body

    https://developer.wordpress.org/reference/functions/body_class/


## AJOUTER LE MENU DANS LE HEADER

    EN 2 ETAPES:

    CREER UN FICHIER 
    wp-content/themes/montheme/functions.php
    
    ET DANS CE FICHIER IL FAUT AJOUTER DU CODE POUR DECLARER NOS ZONES DE MENUS


```php
<?php
/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function montheme_menus()
{

    $locations = array(
        'primary'   => "ZONE MENU 1",
        'secondary' => "ZONE MENU 2",
    );

    register_nav_menus($locations);
}

add_action('init', 'montheme_menus');
```

    ET ON AJOUTE DANS NOTRE TEMPLATE index.php
    LE CODE PHP DE WORDPRESS QUI AFFICHE UN MENU


```php
        <nav>
            <?php wp_nav_menu(["theme_location" => "primary" ]) ?>
        </nav>
```


## DECOUPAGE DE NOTRE TEMPLATE EN MORCEAUX
