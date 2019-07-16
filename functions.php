<?php
/**
 * GuCherry Blog Child theme functions.
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package gucherry-lite
 */

// Exit if accessed directly.


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! function_exists( 'gucherry_lite_language' ) ) {

    function gucherry_lite_language() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on GuCherry Blog, use a find and replace
         * to change 'gucherry-lite' to the name of your theme in all the template files.
         */

        load_child_theme_textdomain( 'gucherry-lite', get_stylesheet_directory() . '/languages' );

    }
}

add_action( 'after_setup_theme', 'gucherry_lite_language' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gucherry_lite_widgets_init() {
    
    register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisment', 'gucherry-lite' ),
		'id'            => 'gucherry-lite-header-advertisement',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
    
}

add_action( 'widgets_init', 'gucherry_lite_widgets_init', 20 );

/**
 * Social links template
 */
if( ! function_exists( 'gucherry_lite_social_links_template' ) ) {
    
    function gucherry_lite_social_links_template( $position ) {
        
        $display_social_links = get_theme_mod( 'gucherry_blog_header_display_social_links', true );
        
        if( $position == 'header' ) {
            
            if( $display_social_links == true ) {
                
                $facebook_link = get_theme_mod( 'gucherry_blog_social_links_facebook_link', esc_html( '#' ) );
                $twitter_link = get_theme_mod( 'gucherry_blog_social_links_twitter_link', esc_html( '#' ) );
                $instagram_link = get_theme_mod( 'gucherry_blog_social_links_instagram_link', esc_html( '#' ) );

                if( !empty( $facebook_link ) ) { 
                ?>
                <li>
                    <a href="<?php echo esc_url( $facebook_link ); ?>">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                </li>
                <?php
                }
                if( !empty( $twitter_link ) ) {
                ?>
                <li>
                    <a href="<?php echo esc_url( $twitter_link ); ?>">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <?php
                }
                if( !empty( $instagram_link ) ) {
                ?>
                <li>
                    <a href="<?php echo esc_url( $instagram_link ); ?>">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </li>
                <?php
                }
            }
        }  
    }
}

if ( ! function_exists( 'gucherry_lite_enqueue_styles' ) ) {
    /**
     * Enqueue Styles.
     *
     * Enqueue parent style and child styles where parent are the dependency
     * for child styles so that parent styles always get enqueued first.
     *
     * @since 1.0.0
     */

    function gucherry_lite_enqueue_styles() {

        // Enqueue Parent theme's stylesheet.

        wp_enqueue_style( 'gucherry-lite-parent-style', get_template_directory_uri() . '/style.css' );

        wp_enqueue_style( 'gucherry-lite-parent-main-style', get_template_directory_uri() . '/everestthemes/assets/dist/css/main-style.css' );
        
        wp_enqueue_style( 'gucherry-lite-main-style', get_stylesheet_directory_uri() . '/everestthemes/assets/dist/css/main-style.css' );
        
        wp_enqueue_style( 'gucherry-lite-fonts', gucherry_lite_fonts_url() );
        
        wp_enqueue_script( 'gucherry-lite-main-script', get_stylesheet_directory_uri() . '/everestthemes/assets/dist/js/main-script.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

    }
}

// Add enqueue function to the desired action.
add_action( 'wp_enqueue_scripts', 'gucherry_lite_enqueue_styles', 100 );

/**
 * Load Theme functions
 */
require get_stylesheet_directory() . '/inc/theme-functions.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function gucherry_lite_customize_register( $wp_customize ) {
    
    /**
	 * Load custom customizer control for toggle control
	 */
	require get_stylesheet_directory() . '/inc/customizer/controls/class-customizer-toggle-control.php';
	
    //Option : Enable Child Theme Font
    $wp_customize->add_setting( 'gucherry_lite_enable_child_font', array( 
        'sanitize_callback'   => 'wp_validate_boolean',
        'default'             => true,
    ) );

    $wp_customize->add_control( new GuCherry_Lite_Customizer_Toggle_Control( $wp_customize, 'gucherry_lite_enable_child_font', array(
        'label'                  => esc_html__( 'Enable Child Theme Font', 'gucherry-lite' ),
        'description'            => esc_html__( 'On enabling this option, child theme font will be shown instead of parent theme.', 'gucherry-lite' ),
        'section'                => 'gucherry_blog_site_typography_section',
        'type'                   => 'ios',
    ) ) );
}
add_action( 'customize_register', 'gucherry_lite_customize_register' );

/**
 * Function to load dynamic styles.
 *
 * @since  1.0.0
 * @access public
 * @return null
 */
function gucherry_lite_dynamic_style() {
    
    ?>
    <style type="text/css">  
    <?php
        
    /*-----------------------------------------------------------------------------
                                SITE TYPOGRAPHY OPTIONS
    -----------------------------------------------------------------------------*/
    
    $enable_child_font = get_theme_mod( 'gucherry_lite_enable_child_font', true );
    
    if( $enable_child_font == true ) {  

        ?>   
        q,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6, 
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        blockquote,
        .site-title {

            font-family: 'Josefin Sans', sans-serif;
                
        }
        
        body,
        button,
        input,
        select,
        textarea {

            font-family: 'Open Sans', sans-serif;;

        }
        <?php
    }
    ?>
    
    </style>
        
    <?php  
}
add_action( 'wp_head', 'gucherry_lite_dynamic_style', 20 );
