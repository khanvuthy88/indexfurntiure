<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package indexfurinture
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">


	<!--========================================================
                              HEADER
    =========================================================-->
    <header id="home"  class="page-header text-center" data-type="anchor">
        <!-- RD Navbar -->
        <div class="rd-navbar-wrap">
            <nav data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-static" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-sm-stick-up-offset="50px" data-lg-stick-up-offset="150px" class="rd-navbar">
                <div class="rd-navbar-inner">
                    <!-- RD Navbar Panel -->
                    <div class="rd-navbar-panel">
                        <div class="rd-navbar-panel-canvas"></div>

                        <!-- RD Navbar Toggle -->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- END RD Navbar Toggle -->

                        

                        

                        <!-- RD Navbar Brand -->
                        <div class="rd-navbar-brand">
                            <img src="<?php  echo get_template_directory_uri ().'/images/favicon.png'; ?>" alt="" class="brand">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand-name">
                                <span>RD</span> Navbar
                            </a>
                        </div>
                        <!-- END RD Navbar Brand -->
                    </div>
                    <!-- END RD Navbar Panel -->
                </div>
                <div class="rd-navbar-outer">
                    <div class="rd-navbar-inner">


                        <div class="rd-navbar-subpanel">
                            <div class="rd-navbar-nav-wrap">
                                <!-- RD Navbar Nav -->
                                <?php
									wp_nav_menu( array(
										'theme_location' => 'menu-1',
										'menu_class'        => 'rd-navbar-nav',
										'container'		 => false
									) );
								?>
                               
                                <!-- END RD Navbar Nav -->
                            </div>

                            <!-- RD Navbar Search Toggle -->
                            <div class="rd-navbar-search-wrap">
                                <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search, .rd-navbar, .rd-navbar-inner">
                                    <span></span>
                                </button>
                                <div class="rd-navbar-search">
                                    <form action="<?php echo home_url( '/' ); ?>" method="get">
                                        <div class="form-group">
                                            <input id="rd-navbar-search-input" type="text" class="form-control"
                                                   placeholder="Search" name="s" id="search" value="<?php the_search_query(); ?>">
                                        </div>
                                        <button type="submit" class="material-icons-search"></button>
                                    </form>
                                </div>
                            </div>
                            <!-- END RD Navbar Search Toggle -->
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- END RD Navbar -->
    </header>


	<div id="content" class="site-content">
