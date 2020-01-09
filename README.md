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

    <link rel="stylesheet" href="<?php echo get_theme_file_uri('/style.css') ?>">

    <!-- PERMET A WORDPRESS DE CHARGER DU CODE CSS -->
    <?php wp_head() ?>
    <!-- FIN WPHEAD -->
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
            <img src="<?php echo get_theme_file_uri('/assets/img/photo.jpg') ?>" alt="">
        </section>
    </main>
    <footer>
        <p>tous droits réservés</p>
    </footer>
    <!-- PERMET A WORDPRESS DE CHARGER DU CODE HTML ET JS -->
    <?php wp_footer() ?>
    <!-- FIN WPFOOTER -->

    <script src="<?php echo get_theme_file_uri('/assets/js/script.js') ?>"></script>
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

```php
<?php

get_header();
get_template_part("template-parts/section-404");
get_footer();
```

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

```php
<?php
/**
 *  Template Name: MON TEMPLATE 1 
 */
```


## ARTICLES, CATEGORIES ET BOUCLES MULTIPLES

    ON VA CREER 9 ARTICLES REPARTIS DANS 3 CATEGORIES

    SI ON PREND COMME THEMATIQUE UN CV

    ON AURAIT COMME CATEGORIES

    formations
        licence     2020
        webforce3   2020
        bac         2017
    experiences
        boucher
        charcutier
        astronaute
    competences
        couper viande en apesanteur
        codage
        formateur

    ...
    intro
    presentation
    contact
    hobbies


### BOUCLES MULTIPLES

    ON PEUT UTILISER DES BOUCLES MULTIPLES POUR SELECTIONNER SEULEMENT CERTAINS ARTICLES
    ET COMPOSER UNE PAGE AVEC PLUSIEURS SECTIONS 
    QUI NE VONT AFFICHER QUE DES ARTICLES D'UNE SEULE CATEGORIE PAR SECTION

    https://codex.wordpress.org/The_Loop#Multiple_Loops

```php

<section>
    <h3>FORMATIONS</h3>
    <!-- ON VA FAIRE UNE BOUCLE MULTIPLE AVEC WORPRESS -->
    <div class="formations">
        <!-- ON FILTRE AVEC LE slug DE LA CATEGORIE category_name=formations -->
        <?php $my_formations = new WP_Query('category_name=formations'); ?>

        <?php while ($my_formations->have_posts()) : $my_formations->the_post(); ?>
            <article>
                <h4><?php the_title() ?></h4>
                <div><?php the_content() ?></div>
            </article>
        <?php endwhile; ?>
        
        <?php wp_reset_postdata(); ?>

    </div>
</section>

```


## IMAGES A LA UNE

    DANS functions.php
    AJOUTER LA LIGNE QUI INFORME WORDPRESS 
    QUE NOTRE THEME GERE LES IMAGES A LA UNE


```php
    // ...
    // AJOUT DES IMAGES A LA UNE
    add_theme_support('post-thumbnails');

```

    ET ENSUITE DANS LE TEMPLATE, ON PEUT UTILISER LA FONCTION
    the_post_thumbnail
    
    https://developer.wordpress.org/reference/functions/the_post_thumbnail/

```php

        <?php $my_competences = new WP_Query('category_name=competences'); ?>

        <?php while ($my_competences->have_posts()) : $my_competences->the_post(); ?>
            <article>
                <?php the_post_thumbnail() ?>
                <h4><?php the_title() ?></h4>
                <div><?php the_content() ?></div>
            </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

```

## CHAMP PERSONNALISES POST CUSTOM FIELDS


    POUR AFFICHER LES CHAMPS PERSONNALISES, 
    ON PEUT UTILISER UNE FONCTION DE WORDPRESS get_post_meta

    https://developer.wordpress.org/reference/functions/post_custom/
    https://developer.wordpress.org/reference/functions/get_post_meta/


```php

                <h4><?php echo post_custom('annee'); ?></h4>

```



## ADVANCED CUSTOM FIELDS (ACF)

    MIEUX QUE LES CHAMPS PERSONNALISES DE WORDPRESS...
    https://www.advancedcustomfields.com/

    https://www.advancedcustomfields.com/resources/displaying-custom-field-values-in-your-theme/

    ON PEUT AFFICHER LA VALEUR AVEC LA FONCTION DE ACF the_field

```php
        <?php while ($my_competences->have_posts()) : $my_competences->the_post(); ?>
            <article>
                <?php the_post_thumbnail() ?>
                <h4><?php the_title() ?></h4>
                <h4>niveau: <?php the_field('niveau'); ?></h4>
                <div><?php the_content() ?></div>
            </article>
        <?php endwhile; ?>

```

## EXERCICE POUR LA FIN DE JOURNEE


    COMPLETER LE TEMPLATE POUR OBTENIR UN CV QUI SOIT VENDABLE


## WP_Query ET REQUETES SELECT DANS WORDPRESS

    ON PEUT CREER DES REQUETES SELECT TRES COMPLEXES AVEC WP_QUery

    https://developer.wordpress.org/reference/classes/wp_query/


## FILTRES ET ACTIONS (CROCHETS: HOOKS en anglais...)

    EVENEMENTS JAVASCRIPT:  
        JAVASCRIPT PREVIENT QUAND DES EVENEMENTS SURVIENNENT 
        ET LE DEVELOPPEUR PEUT AJOUTER DES FUNCTIONS 
        QUI SERONT ACTIVEES QUAND L'EVENEMENT SURVIENT


    WORDPRESS EST UN FRAMEWORK
    => IL SUIT UNE CERTAINE SEQUENCE D'EXECUTION DE CODE
    => WORDPRESS A AUSSI UN "MECANISME" D'EVENEMENTS 
        QUE WORDPRESS VA DECLENCHER AU FUR ET A MESURE DE L'EXECUTION DE SON CODE

    https://codex.wordpress.org/Plugin_API/Action_Reference
    
    https://developer.wordpress.org/reference/functions/add_action/


    DANS LE THEME, ON VA RAJOUTER NOS CROCHET/HOOK (EVENT LISTENERS)  DANS functions.php

    WORDPRESS GARDE DE BONNES PERFORMANCES (AUTOUR DE 300 REQUETES/SECONDES...)

    https://kinsta.com/fr/blog/benchmarks-php/

    https://kinsta.com/blog/php-benchmarks/

    NOTE: LES THEMES ONT DES HOOKS ET LA PARTIE BACK-OFFICE DE WORDPRESS PROPOSE AUSSI PLEIN DE HOOKS


    DANS WORDPRESS, IL Y A DES FILTRES QUI SONT EN PLACE POUR CHANGER LA CREATION DE CODE HTML

## FILTRES ET SHORTCODE (CODES COURTS)


    https://codex.wordpress.org/Shortcode_API

    ON VEUT PROPOSER UN CODE "FACILE" POUR LE CLIENT
    ET CE CODE SERA REMPLACE PAR UN CODE PLUS COMPLIQUE QUE LE DEVELOPPEUR VA CODER

    [carte]

    SERA REMPLACE PAR CE CODE PLUS COMPLIQUE

```html

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.737817569198!2d5.379149815092137!3d43.29881197913501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9bfcdc25b14c7%3A0x5f67deef73c302cb!2sWebforce3%20Aix%20Marseille!5e0!3m2!1sfr!2sfr!4v1578566229783!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

```



## THEME STARTER


    AU LIEU DE CODER DE ZERO SON THEME ON PEUT PARTIR SUR UNE BASE DE CODE

    https://underscores.me/


    IL Y A PLEIN DE THEMES STARTER... 

    https://colorlib.com/wp/wordpress-starter-themes/


## THEMES ENFANTS

    https://developer.wordpress.org/themes/advanced-topics/child-themes/


    ON PEUT PARTIR D'UN THEME "PARENT"
    ET VOULOIR RAJOUTER SON CODE EN PLUS...

    PROBLEMATIQUE: SI ON CODE DANS LE DOSSIER DU THEME "PARENT"
    => ON VA PERDRE NOS MODIFS A CHAQUE MISE A JOUR

    => SOLUTION A CETTE PROBLEMATIQUE
    => CREER UN THEME ENFANT
        VOTRE CODE SERA DANS LE DOSSIER DU THEME ENFANT
        ET ON VA INFORMER WORDPRESS DE LA RELATION ENTRE LE THEME ENFANT ET LE THEME PARENT


    CREER UN DOSSIER 
        wp-content/themes/theme-enfant/

    ET CREER UN FICHIER
        wp-content/themes/theme-enfant/style.css

    ET AJOUTER L'ANNOTATION template: ...

```php
<?php

/**
 *      template: montheme
 *      ATTENTION: IL FAUT DONNER LE NOM DU DOSSIER DU THEME PARENT
 */

```


    ON PEUT ACTIVER LE THEME ENFANT

    IDEE GENERALE: 
    LES FICHIERS DANS LE DOSSIER DU THEME ENFANT 
    DEVIENNENT PRIORITAIRES PAR RAPPORT AU FICHIERS 
    AVEC LE MEME CHEMIN DANS LE THEME PARENT

    EXCEPTION:
    ATTENTION, SI VOUS CREEZ UN FICHIER functions.php DANS LE THEME ENFANT
    LES 2 FICHIERS functions.php SERONT CHARGES...
    ET IL CHARGE D'ABORD LE FICHIER DU THEME ENFANT

    ATTENTION:
    POUR GARDER LE FICHIER style.css DU THEME PARENT
    ON DEVRAIT AJOUTER LA BALISE link AVEC UN HOOK WORDPRESS...

    https://developer.wordpress.org/themes/advanced-topics/child-themes/#3-enqueue-stylesheet

    ATTENTION: 
    LE THEME ENFANT PERMET DE NE PAS PERDRE SON CODE QUAND LE THEME PARENT MET A JOUR SON CODE
    MAIS ON PEUT RENCONTRER DES PROBLEMES DE SYNCHRONISATION 
    ENTRE LES FICHIERS DU THEME ENFANT 
    ET LES FICHIERS DU THEME PARENT
    => CES CONFLITS PEUVENT CASSER LE SITE...
    (ATTENTION AUX PROBLEMES DE SECURITE...)

    EN PRATIQUE:
    ON COPIE LE FICHIER DU THEME PARENT DANS LE THEME ENFANT
    (ATTENTION: IL FAUT GARDER LE MEME CHEMIN...)

    EXTENSION POUR CREER LE CODE DE BASE DU THEME ENFANT

    https://fr.wordpress.org/plugins/child-theme-configurator/


### THEME ENFANT ET TEMPLATE DE PAGES SUPPLEMENTAIRES

    ON PEUT AJOUTER DANS LE THEME ENFANTS DES TEMPLATES DE PAGES SUPPLEMENTAIRES

    ET DE MEME, ON POURRAIT AJOUTER DES HOOKS, DES FILTRES SUPPLEMENTAIRES


## CREATION D'UNE EXTENSION (PLUGIN)

    CREER UN DOSSIER DANS wp-content/plugins/mon-extension

    ET CREER UN FICHIER wp-content/plugins/mon-extension/index.php

    ET AJOUTER L'ANNOTATION

```php
<?php
/**
 * Plugin Name: MON EXTENSION A MOI
 */


```


    DANS UN SITE WORDPRESS, ON A UN SEUL THEME ACTIF
    MAIS ON PEUT AVOIR PLUSIEURS EXTENSIONS ACTIVEES

    => PERMET DE SEPARER DES FONCTIONNALITES EN DEHORS DU THEME
    => MODULARITE: COMPOSER SON SITE AVEC UN THEME ET PLUSIEURS EXTENSIONS...

    CATALOGUE GRATUIT DES EXTENSIONS WORDPRESS

    https://fr.wordpress.org/plugins/
 
    ET IL EXISTE DES PLATEFORMES D'EXTENSIONS PAYANTES...

    ATTENTION: LES EXTENSIONS PEUVENT RALENTIR VOTRE SITE...
    IDEALEMENT: RESTER EN DESSOUS DE 10 EXTENSIONS...
    MAIS EN PRATIQUE, ON RENCONTRE DES SITES AVEC REGULIEREMENT AVEC PLUSIEURS DIZAINES D'EXTENSIONS...

```php
<?php
/**
 * Plugin Name: MON EXTENSION A MOI
 */

// ON PEUT AJOUTER 
// UN SHORTCODE
// UN FILTRE
// UN HOOK

function shortcode_heure ()
{
    return date("Y-m-d H:i:s", strtotime("+1 day"));
}

// SI ON ECRIT [heure]
add_shortcode("heure", "shortcode_heure");


// ON VA AJOUTER UN SHORTCODE [like]

function shortcode_like ()
{
    // CONTROLLER
    // TRAITEMENT DU FORMULAIRE
    $nbLike = intval(post_custom("nbLike"));

    $identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
    if ($identifiantFormulaire == "like")
    {
        // AJOUTER UN LIKE A LA PAGE
        $nbLike++;

        // PAR ACF
        // https://www.advancedcustomfields.com/resources/update_field/
        // MEMORISE LE NOMBRE DE LIKE DANS LE CHAMP PERSONNALISE
        update_field("nbLike", $nbLike);
    }

    // VIEW
    return
<<<CODEHTML
    <form method="POST">
        <input type="hidden" name="identifiantFormulaire" value="like">
        <button>LIKE ($nbLike)</button>
    </form>
CODEHTML;

}

add_shortcode("like", "shortcode_like");



```


## CUSTOM POST TYPES

    ON PEUT AJOUTER DES "POST TYPES" EN PLUS DES "PAGES" ET DES "ARTICLES"

    PAR EXEMPLE, ON VEUT AJOUTER DES "FILMS"

    https://generatewp.com/post-type/

    https://www.wp-hasty.com/tools/wordpress-custom-post-type-generator/

    => ON VA OBTENIR UN CODE PHP A RAJOUTER DANS NOS FICHIERS PHP 


    ET ON PEUT AUSSI PASSER PAR UNE EXTENSION POUR CREER UN NOUVEAU CUSTOM POST TYPE

    https://fr.wordpress.org/plugins/custom-post-type-ui/



