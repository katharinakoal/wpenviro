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

    $event_date[] = DateTime::createFromFormat("Ymd", get_field('date_start'));
    if (get_field('is_multi_day')) $event_date[] = DateTime::createFromFormat("Ymd", get_field('date_end'));
    enviro2017_event_date_badge($event_date);

    ?>
    <header class="entry-header">
        <?php
        if (is_single()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <?php enviro2017_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php
        endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content(sprintf(
        /* translators: %s: Name of current post. */
            wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'enviro2017'), array('span' => array('class' => array()))),
            the_title('<span class="screen-reader-text">"', '"</span>', false)
        ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'enviro2017'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->
    <footer class="entry-footer">
        <br/>
        <span class="event-venue">
            <?php
            _e('Ort: ');
            the_field('venue');
            ?>
        </span><br/><br/>
        <?php
        if (have_rows('attachements')):

            while (have_rows('attachements')) : the_row();

                $attachement = get_sub_field('attachement');

                printf('<a href="%2$s" title="%1$s" class="attachement">_%1$s</a>', $attachement['title'], $attachement['url']);

            endwhile;

        endif ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->

