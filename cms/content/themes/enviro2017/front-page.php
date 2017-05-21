<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Enviroinfo.eu_2017
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div class="container container-grid">
                <div class="row">

                    <?php while (have_posts()) : the_post(); ?>


                        <div class="col-lg-8 col-sm-12 col-xs-12 col-grid">
                            <article  <?php post_class('front-page'); ?>>
                                <div class="entry-content">
                                    <img class="badge-logo" src="<?php echo THEME_DIR_URI; ?>/img/GI-Logo_Q2012_SW.jpg"
                                         width="100" alt="">
                                    <?php the_content(); ?>
                                </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                        </div>

                        <?php if (have_rows('teaser')):

                            // loop through the rows of data
                            while (have_rows('teaser')) : the_row(); ?>
                                <div class="col-lg-4 col-sm-6  col-xs-12 col-grid">
                                    <article <?php post_class('front-page'); ?>>
                                        <div class="entry-content">
                                            <h2><?php the_sub_field('title'); ?></h2>
                                            <?php the_sub_field('description'); ?>
                                            <?php

                                            $link = get_sub_field('link');
                                            $post_type = get_post_type_object($link->post_type);

                                            printf('<a href="%1$s">%2$s: %3$s</a>',
                                                esc_url(get_permalink($link->ID)),
                                                $post_type->labels->view_item,
                                                $link->post_title
                                            );

                                            ?>
                                        </div>
                                    </article>
                                </div>

                            <?php endwhile;

                        endif;
                        ?>

                    <?php endwhile; ?>

                    <div class="col-xs-12 col-grid">
                        <header class="section-header">
                            <h3><?php _e('Neuigkeiten'); ?></h3>
                        </header>
                    </div>


                    <?php

                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $news_query = new WP_Query(array('post_type' => 'news', 'posts_per_page' => 3, 'paged' => $paged));

                    ?>

                    <?php if ($news_query->have_posts()) : ?>

                        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-grid">

                                <?php get_template_part('template-parts/content', get_post_type()); ?>
                            </div>

                        <?php endwhile; ?>


                        <?php the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                    <?php wp_reset_postdata(); ?>

                    <div class="col-xs-12 col-grid">
                        <header class="section-header">
                            <h3><?php _e('Anstehende Veranstaltungen'); ?></h3>
                        </header>
                    </div>


                    <?php

                    $news_query = new WP_Query(array(
                        'post_type' => 'event',
                        'posts_per_page' => 3,
                        'orderby'   => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_key'  => 'date_start',
                        'meta_query' => array(
                            array(
                                'key' => 'date_start',
                                'value' => date("Ymd"),
                                'compare' => '>=',
                                'type' => 'DATE'
                            )
                        )));

                    ?>

                    <?php if ($news_query->have_posts()) : ?>

                        <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-grid">

                                <?php get_template_part('template-parts/content', get_post_type()); ?>
                            </div>

                        <?php endwhile; ?>


                        <?php the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                    <?php wp_reset_postdata(); ?>


                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();