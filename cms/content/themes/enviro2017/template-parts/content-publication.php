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
    <header class="entry-header">
        <?php
        if (is_single()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_field('link')) . '" rel="bookmark">', '</a></h2>');
        endif;
        ?>
        <b><?php the_field('subtitle'); ?></b>
    </header><!-- .entry-header -->

    <div class="entry-content clearfix">
        <?php the_field('authors'); ?>
       <?php if( get_field('image') ): ?>

            <div class="pub-image<?php echo is_single() ? ' pull-left' : ' center'; ?>">
                <?php echo wp_get_attachment_image( get_field('image'), 'medium' ); ?>
            </div>

           <?php the_field('description'); ?>

        <?php endif; ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->

