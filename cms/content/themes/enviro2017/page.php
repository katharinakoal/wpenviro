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

                    <?php

                    enviro2017_page_hierarchy();

                    while (have_posts()) : the_post(); ?>

                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 col-grid">

                            <?php get_template_part('template-parts/content', 'page'); ?>

                        </div>

                    <?php endwhile; ?>


                </div>

            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
