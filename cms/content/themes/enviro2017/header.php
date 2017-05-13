<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Enviroinfo.eu_2017
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <header id="masthead" class="site-header" role="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="site-navigation-inner">
                    <div class="navbar navbar-default navbar-fat navbar-clean">
                        <div class="container-fluid">

                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-collapse"><span class="icon-bar b1"></span> <span
                                        class="icon-bar b2"></span> <span class="icon-bar b3"></span></button>
                            <div class="navbar-header">

                                <a class="clearfix" href="<?php echo esc_url(home_url('/')); ?>"
                                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                    <img class="logo" src="<?php echo THEME_DIR_URI; ?>/img/logo_w.png" width="100"
                                         alt="">
                                    <span class="title"><?php bloginfo('title'); ?></span><br/>
                                    <span class="description"><?php bloginfo('description'); ?></span>
                                </a>

                            </div>
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'depth' => 1,
                                    'container' => 'div',
                                    'container_class' => 'collapse navbar-collapse',
                                    'menu_class' => 'nav navbar-nav navbar-right',
                                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker' => new WP_Bootstrap_Navwalker()
                                )); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- #masthead -->

    <div class="cover half-window">
        <div id="cover-image"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 welcome">
                    <h1><?php echo enviro2017_display_title(); ?></h1>
                </div>
            </div>
        </div>

    </div>

    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div id="content" class="site-content">
