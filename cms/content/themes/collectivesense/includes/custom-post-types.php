<?php

function cs_content_types(){

    $args = array(
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'meta_box_cb'                => false,
        'rewrite'					 => false,
        'labels'                     => array(
            'name'              => __('Einsatzgebiete'),
            'singular_name'     => __('Einsatzgebiet'),
            'search_items'      => __( 'Einsatzgebiete durchsuchen' ),
            'all_items'         => __( 'Alle Einsatzgebiete' ),
            'parent_item'       => __( 'Übergeordnetes Einsatzgebiet' ),
            'parent_item_colon' => __( 'Übergeordnetes Einsatzgebiet:' ),
            'edit_item'         => __( 'Einsatzgebiet bearbeiten' ),
            'update_item'       => __( 'Einsatzgebiet aktualisieren' ),
            'add_new_item'      => __( 'Einsatzgebiet hinzufügen' ),
            'new_item_name'     => __( 'Neues Einsatzgebiet' ),
            'menu_name'         => __( 'Einsatzgebiete' ),
        )
    );
    register_taxonomy( 'area', 'project', $args );

    $args = array(
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'meta_box_cb'                => false,
        'rewrite'					 => array( 'slug' => 'topic' ),
        'labels'                     => array(
            'name'              => __('Themengebiete'),
            'singular_name'     => __('Themengebiet'),
            'search_items'      => __( 'Themengebiete durchsuchen' ),
            'all_items'         => __( 'Alle Themengebiete' ),
            'parent_item'       => __( 'Übergeordnetes Themengebiet' ),
            'parent_item_colon' => __( 'Übergeordnetes Themengebiet:' ),
            'edit_item'         => __( 'Themengebiet bearbeiten' ),
            'update_item'       => __( 'Themengebiet aktualisieren' ),
            'add_new_item'      => __( 'Themengebiet hinzufügen' ),
            'new_item_name'     => __( 'Neues Themengebiet' ),
            'menu_name'         => __( 'Themengebiete' ),
        )
    );
    register_taxonomy( 'topic', 'project', $args );

    $args = array(
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite'					 => false,
        'meta_box_cb'                => false,
        'labels'                     => array(
            'name'          => __('App-Berechtigungen'),
            'singular_name' => __('App-Berechtigung'),
            'search_items'               => __( 'App-Berechtigungen durchsuchen'),
            'popular_items'              => __( 'Meistgenutzte App-Berechtigungen'),
            'all_items'                  => __( 'Alle App-Berechtigungen'),
            'edit_item'                  => __( 'App-Berechtigung bearbeiten'),
            'update_item'                => __( 'App-Berechtigung aktualisieren'),
            'add_new_item'               => __( 'App-Berechtigung hinzufügen'),
            'new_item_name'              => __( 'Neue App-Berechtigung'),
            'not_found'                  => __( 'Nichts gefunden.'),
            'menu_name'                  => __( 'App-Berechtigungen')
        )
    );
    register_taxonomy( 'app-permissions', 'project', $args );

    $args = array(
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => false,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'meta_box_cb'                => false,
        'rewrite'					 => false,
        'labels'                     => array(
            'name'          => __('Nutzerzahlen'),
            'singular_name' => __('Nutzerzahlen'),
            'search_items'               => __( 'Nutzerzahlen durchsuchen'),
            'popular_items'              => __( 'Meistgenutzte Nutzerzahlen'),
            'all_items'                  => __( 'Alle Nutzerzahlen'),
            'edit_item'                  => __( 'Nutzerzahlen bearbeiten'),
            'update_item'                => __( 'Nutzerzahlen aktualisieren'),
            'add_new_item'               => __( 'Nutzerzahlen hinzufügen'),
            'new_item_name'              => __( 'Neue Nutzerzahlen'),
            'not_found'                  => __( 'Nichts gefunden.'),
            'menu_name'                  => __( 'Nutzerzahlen')
        )
    );
    register_taxonomy( 'number-of-users', 'project', $args );

    $args = array(
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'meta_box_cb'                => false,
        'rewrite'					 => false,
        'labels'                     => array(
            'name'          => __('Plattformen'),
            'singular_name' => __('Plattform'),
            'search_items'               => __( 'Plattformen durchsuchen'),
            'popular_items'              => __( 'Meistgenutzte Plattformen'),
            'all_items'                  => __( 'Alle Plattformen'),
            'edit_item'                  => __( 'Plattform bearbeiten'),
            'update_item'                => __( 'Plattform aktualisieren'),
            'add_new_item'               => __( 'Plattform hinzufügen'),
            'new_item_name'              => __( 'Neue Plattform'),
            'not_found'                  => __( 'Nichts gefunden.'),
            'menu_name'                  => __( 'Plattformen'),
        )
    );
    register_taxonomy( 'platforms', 'project', $args );

    $post_type = 'project';

    $pt_labels = array(
        'name' 				=> __('CS Projekte'),
        'singular_name' 	=> __('CS Projekt'),
        'all_items'			=> __('Alle CS Projekte'),
        'add_new_item'		=> __('CS Projekt hinzufügen'),
        'edit_item'			=> __('CS Projekt bearbeiten'),
        'new_item'			=> __('Neues CS Projekt'),
        'view_item'			=> __('CS Projekt ansehen'),
        'search_items'		=> __('CS Projekte durchsuchen'),
        'not_found'			=> __('Nichts gefunden'),
        'not_found_in_trash'=> __('Nichts gefunden')
    );

    $pt_args = array(
        'label' 			=> __('CS Projekte'),
        'labels'			=> $pt_labels,
        'public'			=> true,
        'menu_position'		=> 20.1,
        'taxonomies'        => array( 'topic', 'app-permissions', 'platforms', 'number-of-users', 'area' ),
        'menu_icon'			=> 'dashicons-clipboard',
        'supports'			=> array('title'),
        'has_archive'		=> true,
        'rewrite'            => array( 'slug' => 'projekte' ),
    );

    register_post_type( $post_type, $pt_args );


}

add_action( 'init', 'cs_content_types' );

function tmpa_updated_messages( $messages ) {

    global $post, $post_ID;

    for ( $i = 0; $i <= 10; $i++ ){
        $messages['project'][$i] = __('Aktualisiert');
    }

    return $messages;

}

add_filter( 'post_updated_messages', 'cs_updated_messages' );

?>