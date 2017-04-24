<?php

function cs_remove_menus(){

    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'index.php' );
    remove_menu_page( 'edit.php' );
    remove_menu_page( 'separator1' );

    if( current_user_can('administrator') ) return;

    remove_menu_page( 'tools.php' );
    remove_submenu_page( 'themes.php', 'themes.php' );
    remove_submenu_page( 'themes.php', 'customize.php' );

    remove_meta_box( 'pageparentdiv' , 'page' , 'side' );

}

add_action( 'admin_menu', 'cs_remove_menus', 99 );

function tv_remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'customize' );
}

add_action( 'admin_bar_menu', 'tv_remove_wp_logo', 99 );

function cleanup_wp_head(){

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
    add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );

}

function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

add_action( 'init', 'cleanup_wp_head' );

function cs_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo THEME_DIR_URI; ?>/includes/img/collectivesense_logo-v2.png);
            padding-bottom: 30px;
            width: auto;
            height: auto;
            background-size: 100%;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'cs_login_logo' );

function cs_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'cs_login_logo_url' );

function cs_login_logo_url_title() {
    return 'CollectiveSense';
}
add_filter( 'login_headertitle', 'cs_login_logo_url_title' );

function redirect_default_admin_screen(){

    global $pagenow;

    if ( $pagenow == "index.php" ){

        wp_safe_redirect( admin_url( 'edit.php?post_type=page' ) );
        exit;

    }
}

add_action( 'admin_init' , "redirect_default_admin_screen" );

add_filter( 'manage_pages_columns', 'custom_pages_columns' );

function custom_pages_columns( $columns ) {
    unset(
        $columns['comments'],
        $columns['author']
    );

    return $columns;
}

function logged_in_only() {
    if ( ! is_user_logged_in() ) {
        auth_redirect();
    }
}
add_action( 'template_redirect', 'logged_in_only' );






?>