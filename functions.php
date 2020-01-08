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
