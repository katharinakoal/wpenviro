<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Enviroinfo.eu_2017
 */

?>
                </div>
            </div>
        </div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
		<div class="site-info row">
            <div class="col-xs-12">
                <span> &copy; <?php echo date("Y"); ?> enviroinfo.eu </span>
                <?php printf('<a href="mailto:%1$s">%1$s</a>',antispambot('info@enviroinfo.eu')); ?>
                <?php wp_nav_menu(
                    array(
                        'theme_location'    => 'footer',
                        'depth'             => 1,
                        'container'         => false,
                        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'            => new WP_Bootstrap_Navwalker()
                    )); ?>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
