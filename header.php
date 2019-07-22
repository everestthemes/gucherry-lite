<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GuCherry_Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="page-wrap extra-gc-layout-4">
       <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gucherry-lite' ); ?></a>
       <header class="mastheader gc-header-s4">
            <div class="header-inner">
                <div class="gc-logo-block">
                    <div class="gc-container">
                        <div class="gc-row">
                            <div class="gc-col left">
                                <div class="site-identity">
                                    <?php
                                    the_custom_logo();
                                    ?>
                                    <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
                                    <?php
                                    $gucherry_blog_description = get_bloginfo( 'description', 'display' );
                                    if ( $gucherry_blog_description || is_customize_preview() ) :
                                    ?>
                                    <p class="site-description"><?php echo esc_html( $gucherry_blog_description ); /* WPCS: xss ok. */ ?></p>
                                    <?php endif; ?>
                                </div><!-- // site-identity -->
                            </div><!-- // gc-col -->
                            <div class="gc-col right">
                                <div class="widget-area-entry">
                                    <?php
                                    // Header Advertisement
                                    if( is_active_sidebar( 'gucherry-lite-header-advertisement' ) ) {

                                        dynamic_sidebar( 'gucherry-lite-header-advertisement' );
                                    }
                                    ?>             
                                 </div>
                            </div>
                            </div><!-- // gc-row -->
                    </div><!-- // gc-container -->
                </div><!-- // gc-logo-block -->
                <div class="bottom-header">
                    <div class="gc-container">
                        <div class="gc-row">
                            <div class="gc-col left">
                                <div class="social-icons">
                                    <ul>
                                        <?php gucherry_blog_social_links_template( 'header' ); ?>
                                    </ul>
                                </div><!-- // social-icons -->
                            </div><!-- // gc-col -->
                            <div class="gc-col center">
                                <div class="primary-navigation-wrap">
                                    <div class="menu-toggle">
                                        <span class="hamburger-bar"></span>
                                        <span class="hamburger-bar"></span>
                                        <span class="hamburger-bar"></span>
                                    </div><!-- .menu-toggle -->
                                    <nav id="site-navigation" class="site-navigation">
                                        <?php
                                        $menu_args = array(
                                            'theme_location' => 'menu-1',
                                            'container' => '',
                                            'menu_class' => 'primary-menu',
                                            'menu_id' => '',
                                            'fallback_cb' => 'gucherry_blog_navigation_fallback',
                                        );
                                        wp_nav_menu( $menu_args );
                                        ?>
                                    </nav>
                                </div><!-- // primary-navigation-wrap -->
                            </div><!-- // gc-col -->
                            <div class="gc-col right">
                                <?php
                                $display_search_icon = get_theme_mod( 'gucherry_blog_header_display_search', 'true' );
                                if( $display_search_icon == true ) {
                                ?>
                                <button class="search-trigger"><i class="fa fa-search" aria-hidden="true"></i></button>
                                <?php 
                                }
                                $display_canvas_sidebar = get_theme_mod( 'gucherry_blog_header_display_canvas_sidebar', 'true' );
                                if( $display_canvas_sidebar == true ) {
                                ?>
                                <button class="canvas-trigger"><i class="fa fa-bars" aria-hidden="true"></i></button>
                                <?php
                                }
                                ?>
                            </div><!-- // gc-col -->
                        </div><!-- // gc-row -->
                    </div><!-- // gc-container -->
                </div><!-- // bottom-header -->
            </div><!-- // header-inner -->
        </header><!-- // mastheader gc-header-s4 -->
        <div class="search-overlay-holder">
            <div class="gc-container">
                <div class="search-wrapper">
                    <form action="#">
                        <?php get_search_form(); ?>
                    </form>
                    <div class="form-close">
                        <svg width="20" height="20" class="close-search-overlay">
                            <line y2="100%" x2="0" y1="0" x1="100%" stroke-width="1.1" stroke="#000"></line>
                            <line y2="100%" x2="100%" y1="0%" x1="0%" stroke-width="1.1" stroke="#000"></line>
                        </svg>
                    </div>
                </div>
            </div><!-- // gc-container -->
        </div><!-- // search-overlay-holder -->
        <div class="site-overlay"></div>
        <?php
        if( $display_canvas_sidebar == true ) {
        ?>
        <aside class="canvas-sidebar secondary-widget-area">
            <div class="canvas-inner">
                <div class="canvas-header">
                    <button class="close-canvas"><i class="feather icon-x"></i></button>
                </div>
                <!--// canvas-header -->
                <div class="canvas-entry">
                    <?php
                    if( is_active_sidebar( 'gucherry-blog-canvas-sidebar' ) ) {
                        dynamic_sidebar( 'gucherry-blog-canvas-sidebar' );
                    }
                    ?>
                </div><!-- // canvas-entry -->
            </div><!-- // canvas-inner -->
        </aside><!-- // canvas-sidebar -->
        <?php
        }