<?php

// echo "(FUNCTIONS PARENT)";

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

// AJOUT DES IMAGES A LA UNE
add_theme_support('post-thumbnails');


// ON VA AJOUTER UN CODE QUI VA S'EXECUTER SUR L'EVENEMENT wp_footer
function montheme_wpfooter ()
{
    echo
<<<CODEHTML
    <script>
        console.log("MON CODE JS EN PLUS...");
    </script>
CODEHTML;

}

// ON AJOUTE UN HOOK SUR L'EVENEMENT wp_footer
// https://developer.wordpress.org/reference/functions/add_action/
add_action("wp_footer", "montheme_wpfooter");


// ON VA CREER UN FILTRE POUR MODIFIER LE TITRE AFFICHE AVEC LA FONCTION the_title
function filtre_modifier_the_title ($codeActuel, $id)
{
    // ON NE VEUT PAS MODIFIER LE TITRE DES MENUS, NI CELUI DES PAGES
    // MAIS SEULEMENT LE TITRE DES ARTICLES
    if (get_post_type($id) == "post") 
    {
        $codeFiltre = "(AVANT)$codeActuel(APRES)";
        // ATTENTION ON FAIT return ET PAS echo
        return $codeFiltre;
    }
    return $codeActuel;
}

add_filter("the_title", "filtre_modifier_the_title", 10, 2);


// SHORTCODE

function shortcode_carte ()
{
    // ATTENTION, ON FAIT return ET PAS echo
    return
<<<CODEHTML

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.737817569198!2d5.379149815092137!3d43.29881197913501!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9bfcdc25b14c7%3A0x5f67deef73c302cb!2sWebforce3%20Aix%20Marseille!5e0!3m2!1sfr!2sfr!4v1578566229783!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

CODEHTML;
}

// QUAND LE CLIENT VA INSERER [carte] DANS LE CONTENU
add_shortcode("carte", "shortcode_carte");


// ON CHARGE LE FICHIER style.css DU THEME PARENT
// MEME SI ON PASSE SUR UN THEME ENFANT
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function my_theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
