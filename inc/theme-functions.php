<?php

/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'gucherry_lite_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function gucherry_lite_fonts_url() {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Open Sans font: on or off', 'gucherry-lite')) {

            $fonts[] = 'Open+Sans:400,400i,600,600i,700,700i,800,800i';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */

        if ('off' !== _x('on', 'Josefin Sans font: on or off', 'gucherry-lite')) {

            $fonts[] = 'Josefin+Sans:400,400i,600,600i,700,700i';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;