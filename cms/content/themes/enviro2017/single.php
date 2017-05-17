<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Enviroinfo.eu_2017
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <div class="container-fluid container-grid">
                <div class="row">

                    <?php while (have_posts()) : the_post(); ?>

                        <div class="col-lg-7 col-sm-8 col-md-9 col-xs-12 col-grid">

                            <?php get_template_part('template-parts/content', get_post_type()); ?>

                        </div>

                    <?php endwhile; ?>


                </div>

            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();

