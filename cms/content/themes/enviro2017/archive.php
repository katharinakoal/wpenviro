<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Enviroinfo.eu_2017
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php if ('event' == get_post_type()): ?>

                <header class="page-header">
                    <ul class="categories clearfix">
                        <?php

                        $events_tax = get_taxonomy('events_category');
                        $events_post_type = get_post_type_object('event');

                        wp_list_categories(array(
                            'taxonomy' => $events_tax->name,
                            'show_option_all' => $events_post_type->labels->all_items,
                            'title_li' => false
                        ));
                        ?>
                    </ul>
                </header><!-- .page-header -->
            <?php endif; ?>

            <div class="container-fluid container-posts">
                <div class="row">


                    <?php if (have_posts()) : ?>


                        <?php while (have_posts()) : the_post(); ?>

                            <div class="col-lg-4 col-md-6 col-sm-12 col-posts">

                                <?php get_template_part('template-parts/content', get_post_type()); ?>
                            </div>

                        <?php endwhile; ?>


                        <?php the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif; ?>

                </div>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
