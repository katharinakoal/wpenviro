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
        'taxonomies'        => array( 'events_category' ),
        'menu_icon'			=> 'dashicons-calendar',
        'supports'			=> array('title'),
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

    register_taxonomy( 'events_category', 'event', array(
        'hierarchical' => true,
        'rewrite' => array('slug' => 'events')
    ));

    register_taxonomy_for_object_type( 'events_category', 'events' );

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

function generate_taxonomy_rewrite_rules( $wp_rewrite ) {
    $rules = array();
    $post_types = get_post_types( array( 'name' => 'event', 'public' => true, '_builtin' => false ), 'objects' );
    $taxonomies = get_taxonomies( array( 'name' => 'events_category', 'public' => true, '_builtin' => false ), 'objects' );

    foreach ( $post_types as $post_type ) {
        $post_type_name = $post_type->name;
        $post_type_slug = $post_type->rewrite['slug'];

        foreach ( $taxonomies as $taxonomy ) {
            if ( $taxonomy->object_type[0] == $post_type_name ) {
                $terms = get_categories( array( 'type' => $post_type_name, 'taxonomy' => $taxonomy->name, 'hide_empty' => 0 ) );
                foreach ( $terms as $term ) {
                    $rules[$post_type_slug . '/' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
                }
            }
        }
    }
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'generate_taxonomy_rewrite_rules');

add_filter( 'manage_event_posts_columns', 'set_custom_edit_event_columns' );
add_action( 'manage_event_posts_custom_column' , 'custom_event_column', 10, 2 );

function set_custom_edit_event_columns($columns) {
    unset($columns['date']);
    unset($columns['taxonomy-events_category']);
    $columns['event_date'] = __('Date');
    $columns['taxonomy-events_category'] = __('Categories:');
    $columns['date'] = sprintf(__( 'Published on: <b>%1$s</b>'),'');


    return $columns;
}

function custom_event_column( $column, $post_id ) {
    switch ( $column ) {

        case 'event_date' :
            $date_format_in = "Ymd";
            $date_format_out = "d.m.Y";
            $date_start = get_field('date_start');
            $date_end = get_field('date_end');
            echo DateTime::createFromFormat($date_format_in, $date_start)->format($date_format_out);
            if($date_end) printf(' - %s', DateTime::createFromFormat($date_format_in, $date_end)->format($date_format_out));
            break;

    }
}

add_filter( 'manage_taxonomies_for_event_columns', 'event_type_columns' );
function event_type_columns( $taxonomies ) {
    $taxonomies[] = 'events_category';
    return $taxonomies;
}

add_filter( 'manage_edit-event_sortable_columns', 'my_sortable_event_column' );
function my_sortable_event_column( $columns ) {
    $columns['event_date'] =  __('Date');
    return $columns;
}

add_action( 'pre_get_posts', 'event_date_orderby' );
function event_date_orderby( $query ) {
    if( ! is_admin() )
        return;

    $orderby = $query->get( 'orderby');

    if( 'event_date' == $orderby ) {
        $query->set('meta_key','date_start');
        $query->set('orderby','meta_value');
    }
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