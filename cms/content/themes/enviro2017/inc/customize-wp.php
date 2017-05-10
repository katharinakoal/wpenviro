<?php

function enviro2017_remove_menus(){

    remove_menu_page( 'edit-comments.php' );
    //remove_menu_page( 'index.php' );
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'separator1' );

    if( current_user_can('administrator') ) return;

    remove_menu_page( 'tools.php' );
    remove_submenu_page( 'themes.php', 'themes.php' );
    remove_submenu_page( 'themes.php', 'customize.php' );

    remove_meta_box( 'pageparentdiv' , 'page' , 'side' );

}

add_action( 'admin_menu', 'enviro2017_remove_menus', 99 );

function enviro2017_remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'customize' );
    $wp_admin_bar->remove_node( 'new-post' );
    $wp_admin_bar->remove_node( 'new-media' );
}

add_action( 'admin_bar_menu', 'enviro2017_remove_wp_logo', 99 );

function enviro2017_cleanup_wp_head(){

    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'feed_links', 2 );
    remove_action('wp_head', 'feed_links_extra', 3 );
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

    // filter to remove TinyMCE emojis
    add_filter( 'tiny_mce_plugins', 'enviro2017_disable_emojicons_tinymce' );

}

function enviro2017_disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

add_action( 'init', 'enviro2017_cleanup_wp_head' );

function enviro2017_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo THEME_DIR_URI; ?>/img/logo_text.png);
            padding-bottom: 50%;
            width: 50%;
            height: auto;
            background-size: 100%;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'enviro2017_login_logo' );

function enviro2017_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'enviro2017_login_logo_url' );

function enviro2017_login_logo_url_title() {
    return 'Enviroinfo.eu';
}
add_filter( 'login_headertitle', 'enviro2017_login_logo_url_title' );

add_filter( 'manage_pages_columns', 'enviro2017_custom_pages_columns' );

function enviro2017_custom_pages_columns( $columns ) {
    unset(
        $columns['comments'],
        $columns['author']
    );

    return $columns;
}

function enviro2017_logged_in_only() {
    if ( ! is_user_logged_in() ) {
        auth_redirect();
    }
}
add_action( 'template_redirect', 'enviro2017_logged_in_only' );

add_filter( 'tiny_mce_before_init', function( $args ) {
    $args['media_buttons'] = 0;
    return $args;
});





?>