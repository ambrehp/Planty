<?php
/**
** activation theme
**/
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css' );
 wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}

/**
** hook lien admin
**/
function ajouter_lien_admin_menu($items) {
    if (is_user_logged_in()) {
        $new_links = array();
        $admin_item = array(
            'title'            => "Admin",
            'menu_item_parent' => '',
            'ID'               =>  '111',
            'db_id'            => '',
            'url'              => admin_url(),
            'classes'          => ['menu-item', 'hover-effect' ],
            'target' => '',
            'xfn' => '',
            'current' => '',
            'type' => ''
        );
        $new_links[] = (object) $admin_item;
        array_splice($items, -1, 0, $new_links);
      
    }
    return $items;
}

add_filter('wp_nav_menu_objects', 'ajouter_lien_admin_menu'); // fonction intégrée à WordPress qui permet de récupérer les éléments d'un menu de navigation sous forme d'objets

