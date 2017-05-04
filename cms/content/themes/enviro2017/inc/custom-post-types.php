<?php

function enviro2017_content_types(){

    register_post_type( "news", array(
        'label' 			=> __('News', 'enviro2017'),
        'public'			=> true,
        'menu_position'		=> 20.1,
        'menu_icon'			=> 'dashicons-admin-post',
        'supports'			=> array('title','editor'),
        'has_archive'		=> true,
        'rewrite'            => array( 'slug' => 'news' ),
        'labels'			=> array(
            'name' 				=> __('News', 'enviro2017'),
            'singular_name' 	=> __('News', 'enviro2017'),
            'all_items'			=> __('Alle News', 'enviro2017'),
            'add_new_item'		=> __('News hinzufügen', 'enviro2017'),
            'edit_item'			=> __('News bearbeiten', 'enviro2017'),
            'new_item'			=> __('Neue News', 'enviro2017'),
            'view_item'			=> __('News ansehen', 'enviro2017'),
            'search_items'		=> __('News durchsuchen', 'enviro2017'),
            'not_found'			=> __('Nichts gefunden', 'enviro2017'),
            'not_found_in_trash'=> __('Nichts gefunden', 'enviro2017')
        )
    ));

    register_post_type( "event", array(
        'label' 			=> __('Veranstaltungen', 'enviro2017'),
        'public'			=> true,
        'menu_position'		=> 20.2,
        'taxonomies'        => array( 'category' ),
        'menu_icon'			=> 'dashicons-calendar',
        'supports'			=> array('title','editor'),
        'has_archive'		=> true,
        'rewrite'            => array( 'slug' => 'events' ),
        'labels'			=> array(
            'name' 				=> __('Veranstaltungen', 'enviro2017'),
            'singular_name' 	=> __('Veranstaltung', 'enviro2017'),
            'all_items'			=> __('Alle Veranstaltungen', 'enviro2017'),
            'add_new_item'		=> __('Veranstaltung hinzufügen', 'enviro2017'),
            'edit_item'			=> __('Veranstaltung bearbeiten', 'enviro2017'),
            'new_item'			=> __('Neue Veranstaltung', 'enviro2017'),
            'view_item'			=> __('Veranstaltungen ansehen', 'enviro2017'),
            'search_items'		=> __('Veranstaltungen durchsuchen', 'enviro2017'),
            'not_found'			=> __('Nichts gefunden', 'enviro2017'),
            'not_found_in_trash'=> __('Nichts gefunden', 'enviro2017')
        )
    ));

    register_taxonomy_for_object_type( 'category', 'events' );

    register_post_type( "publication", array(
        'label' 			=> __('Publikationen', 'enviro2017'),
        'public'			=> true,
        'menu_position'		=> 20.3,
        'menu_icon'			=> 'dashicons-media-text',
        'supports'			=> array('title'),
        'has_archive'		=> true,
        'rewrite'            => array( 'slug' => 'publications' ),
        'labels'			=> array(
            'name' 				=> __('Publikationen', 'enviro2017'),
            'singular_name' 	=> __('Publikation', 'enviro2017'),
            'all_items'			=> __('Alle Publikationen', 'enviro2017'),
            'add_new_item'		=> __('Publikation hinzufügen', 'enviro2017'),
            'edit_item'			=> __('Publikation bearbeiten', 'enviro2017'),
            'new_item'			=> __('Neue Publikation', 'enviro2017'),
            'view_item'			=> __('Publikationen ansehen', 'enviro2017'),
            'search_items'		=> __('Publikationen durchsuchen', 'enviro2017'),
            'not_found'			=> __('Nichts gefunden', 'enviro2017'),
            'not_found_in_trash'=> __('Nichts gefunden', 'enviro2017')
        )
    ));

}


add_action( 'init', 'enviro2017_content_types' );

function enviro2017_updated_messages( $messages ) {

    global $post, $post_ID;

    for ( $i = 0; $i <= 10; $i++ ){
        $messages['publication'][$i] = __('Aktualisiert');
        $messages['event'][$i] = __('Aktualisiert');
        $messages['news'][$i] = __('Aktualisiert');
    }

    return $messages;

}

add_filter( 'post_updated_messages', 'enviro2017_updated_messages' );

?>