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
    https://developer.wordpress.org/reference/functions/body_class/
    https://developer.wordpress.org/reference/functions/wp_nav_menu/


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



## AJOUTER LA BOUCLE (LOOP) POUR AFFICHER LE CONTENU DE CHAQUE PAGE

    https://codex.wordpress.org/fr:La_Boucle_En_Action

```php

        <section>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <article>
                    <h4><?php the_title(); ?></h4>
                    <div><?php the_content(); ?></div>
                </article>
            <?php endwhile; ?>
        </section>

```

## DECOUPAGE DE NOTRE TEMPLATE EN MORCEAUX


    ON ARRIVE A CE CODE PHP POUR NOTRE TEMPLATE PAR DEFAUT index.php
    POUR REUTILISER DES PARTIES COMMUNES, ON VA DECOUPER LE HTML EN TRANCHES

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

```

    CREER 3 FICHIERS 
        ET DECOUPER LE CODE HTML DANS CES 3 FICHIERS

        wp-content/themes/montheme/header.php
        wp-content/themes/montheme/template-parts/section-index.php
        wp-content/themes/montheme/footer.php


    ON RECOMPOSE AVEC LES FONCTIONS DE WORDPRESS
    
    https://developer.wordpress.org/reference/functions/get_header/
    https://developer.wordpress.org/reference/functions/get_template_part/
    https://developer.wordpress.org/reference/functions/get_footer/

```php
<?php

get_header();
get_template_part("template-parts/section-index");
get_footer();

```

## AJOUTER UNE PAGE 404

    CREER 1 FICHIER
        wp-content/themes/montheme/404.php

    ET ENSUITE CREER UN FICHIER POUR LA SECTION
        wp-content/themes/montheme/template-parts/section-404.php


<?php

get_header();
get_template_part("template-parts/section-404");
get_footer();

## HIERARCHIE DE TEMPLATES WORDPRESS

    SUIVANT LA PAGE DEMANDEE PAR LE NAVIGATEUR
    WORDPRESS SUIT UN ARBRE DE DECISION POUR CHOISIR LE TEMPLATE A UTILISER
    POUR AFFICHER LA PAGE
    LE CHOIX S'APPUIE SUR LES NOMS DES FICHIERS DANS LE DOSSIER DU THEME ACTIF

    https://developer.wordpress.org/themes/basics/template-hierarchy/

    https://wphierarchy.com/

    EXTENSION WORDPRESS 

    https://fr.wordpress.org/plugins/what-the-file/


    ATTENTION: 
    WORDPRESS S'APPUIE SUR DES CONVENTIONS DE NOMMAGES DE VOS FICHIERS TEMPLATES
    => EVITER DE CHOISIR DES NOMS AU HASARD... IL PEUT ARRIVER DES MAUVAISES SURPRISES

## TEMPLATES DE PAGES

    LE DEVELOPPEUR DE THEME PEUT PROPOSER DES TEMPLATES DE PAGES
    QUE L'AUTEUR D'UNE PAGE POURRA CHOISIR QUAND IL CREE LA PAGE

    https://developer.wordpress.org/themes/template-files-section/page-template-files/#file-organization-of-page-templates


    CREER UN SOUS-DOSSIER montheme/page-templates/


<?php
/**
 *  Template Name: MON TEMPLATE 1 
 */

