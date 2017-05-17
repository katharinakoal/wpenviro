<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Enviroinfo.eu_2017
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php

    $event_date[] = DateTime::createFromFormat("Ymd", get_the_date(  "Ymd" ));
    enviro2017_date_badge($event_date);

    ?>
    <header class="entry-header">
        <?php
        if (is_single()) :
            the_title('<h2 class="entry-title">', '</h2>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        if ( is_single() ):
            the_content();
        else:
            the_excerpt();
        endif;
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->

