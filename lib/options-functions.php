<?php
/**
 * Custom Option Framework functions.
 */

/**
 * Custom CSS
 *
 * @since 0.0.1
 */
function lovetype_custom_css() {

	$custom_css = of_get_option( 'lovetype_custom_css' );
	if ( $custom_css != '' ) {
		echo "<!-- Custom style -->\n<style type=\"text/css\">\n" . wp_filter_nohtml_kses( $custom_css ) . "\n</style>\n";
	}

}
add_action( 'wp_head', 'lovetype_custom_css', 10 );

/**
 * Custom Typography
 *
 * @since 0.2
 */
/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */


	function options_typography_google_fonts() {
		// Define all the options that possibly have a unique Google font
		$google_font_heading = of_get_option('lovetype_heading_font', false);
		$google_font_content = of_get_option('lovetype_content_font', false);
		
			$selected_fonts = array(
			$google_font_heading['face'],
			$google_font_content['face']);
		
		foreach ( $selected_fonts as $font ) {
			options_typography_enqueue_google_font($font);
			}
		}
	

add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );
/**
 * Enqueues the Google $font that is passed
 */
function options_typography_enqueue_google_font($font) {
	$font = explode(',', $font);
	$font = $font[0];
	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
}

function options_typography_styles() {
     $output = '';
     $input = '';
     if ( of_get_option( 'lovetype_heading_font' ) ) {
          $input = of_get_option( 'lovetype_heading_font' );
	  $output .= options_typography_font_styles( of_get_option( 'lovetype_heading_font' ) , 'h1 , h2 , h3, h4, h5, h6');
	  
     }
      if ( of_get_option( 'lovetype_content_font' ) ) {
          $input = of_get_option( 'lovetype_content_font' );
	  $output .= options_typography_font_styles( of_get_option( 'lovetype_content_font' ) , 'p');
	   
     }
     if ( $output != '' ) {
	$output = "\n<style>\n" . $output . "</style>\n";
	echo $output;
     }
}
add_action('wp_head', 'options_typography_styles');


/*
 * Returns a typography option in a format that can be outputted as inline CSS
 */
function options_typography_font_styles($option, $selectors) {
		$output = $selectors . ' {';
		$output .= ' color:' . $option['color'] .'; ';
		$output .= 'font-family:' . $option['face'] . '; ';
		$output .= 'font-weight:' . $option['style'] . '; ';
		//$output .= 'font-size:' . $option['size'] . '; ';
		$output .= '}';
		$output .= "\n";
		return $output;
}
/** 
 * Returns a typography option for content in a format that can be outputted as inline CSS
 *
 * @since 0.2
 */
function lovetype_content_font_styles( $option, $selectors ) {
	$output = $selectors . ' {';
	$output .= ' color:' . $option['color'] .'; ';
	$output .= 'font-family:' . $option['face'] . '; ';
	$output .= 'font-weight:' . $option['style'] . '; ';
	$output .= 'font-size:' . $option['size'] . ' !important; ';
	$output .= '}';
	$output .= "\n";

	return $output;
}

/** 
 * Returns a typography option for heading in a format that can be outputted as inline CSS
 *
 * @since 0.2
 */
function lovetype_heading_font_styles( $option, $selectors ) {
	$output = $selectors . ' {';
	$output .= ' color:' . $option['color'] .'; ';
	$output .= 'font-family:' . $option['face'] . '; ';
	$output .= 'font-weight:' . $option['style'] . '; ';
	$output .= '}';
	$output .= "\n";

	return $output;
}

/**
 * Background pattern
 *
 * @since 0.0.7
 */
function lovetype_bg_pattern( $classes ) {
	$pattern = of_get_option( 'lovetype_pattern' );
	if ( 'pattern-1' == $pattern )
		$classes[] = 'pattern-1';
	elseif ( 'pattern-2' == $pattern )
		$classes[] = 'pattern-2';
	elseif ( 'pattern-3' == $pattern )
		$classes[] = 'pattern-3';
	elseif ( 'pattern-4' == $pattern )
		$classes[] = 'pattern-4';
	elseif ( 'pattern-5' == $pattern )
		$classes[] = 'pattern-5';
	elseif ( 'pattern-6' == $pattern )
		$classes[] = 'pattern-6';
	elseif ( 'pattern-7' == $pattern )
		$classes[] = 'pattern-7';
	elseif ( 'pattern-8' == $pattern )
		$classes[] = 'pattern-8';
	elseif ( 'pattern-9' == $pattern )
		$classes[] = 'pattern-9';
	elseif ( 'pattern-10' == $pattern )
		$classes[] = 'pattern-10';
	else
		$classes[] = 'no-pattern';
		
	return $classes;
}
add_filter( 'body_class', 'lovetype_bg_pattern' );

function lovetype_front_page_layout() {

	$hlayout= of_get_option( 'lovetype_home_layouts');
	  if ('two-cols' == $hlayout)
	  $t= get_template_part('templates/content', 'magazine');
	  else
		$t = get_template_part('templates/content', 'linear');
		
		return $t;
}

/**
 * Favicon
 *
 * @since 0.0.1
 */
function lovetype_custom_favicon() {

	if ( of_get_option( 'lovetype_custom_favicon' ) )
		echo '<link rel="shortcut icon" href="'. esc_url( of_get_option( 'lovetype_custom_favicon' ) ) .'">'."\n";

}
add_action( 'wp_head', 'lovetype_custom_favicon', 5 );

/**
 * Iframe blocker
 *
 * @since 0.0.1
 */
function lovetype_iframe_blocker() {
		
	if( of_get_option('lovetype_iframe_blocker') == 'enable' ) : ?>
		<script language="javascript" type="text/javascript"> 
			if (top.location != self.location) top.location.replace(self.location); 
		</script>
	<?php endif;

}
add_action( 'wp_head', 'lovetype_iframe_blocker', 11 );

/**
 * Custom layout classes
 *
 * @since 0.0.1
 */
function lovetype_custom_layouts($classes) {
	$layouts = of_get_option('lovetype_layouts');
	
	if ( 'rcontent' == $layouts )
		$classes[] = 'two-columns right-primary left-secondary';
	elseif ( 'lcontent' == $layouts )
		$classes[] = 'two-columns left-primary right-secondary';
	else
		$classes[] = 'one-column only-primary';
	
	return $classes;
}
add_filter( 'body_class', 'lovetype_custom_layouts' );


add_filter('roots_wrap_base', 'roots_wrap_base_cpts'); // Add our function to the roots_wrap_base filter

  function roots_wrap_base_cpts($templates) {
    $layouts = of_get_option('lovetype_content_layouts');// Get the current post type
    
    if ($layouts) {
       array_unshift($templates, 'layouts/base-' . $layouts . '.php'); // Shift the template to the front of the array
    }
    
    return $templates; // Return our modified array with base-$cpt.php at the front of the queue
  }

/**
 * One-column css
 *
 * @since 0.1
 */
function lovetype_onecol_style() {

	$layouts = of_get_option( 'lovetype_layouts' );

	if ( 'onecolumn' == $layouts ) :
		wp_enqueue_style( 'lovetype-onecolumn', trailingslashit( lovetype_CSS ) . 'one-column.css', '', lovetype_VERSION, 'all' );
	endif;

}
add_action( 'wp_enqueue_scripts', 'lovetype_onecol_style', 30 );

/**
 * Sets the post excerpt length
 *
 * @since 0.1
 */
function lovetype_excerpt( $length ) {

	$home_layout = of_get_option( 'lovetype_home_layouts' );

	if( 'one-col' == $home_layout )
		return 50;
	else
		return 35;
}
add_filter( 'excerpt_length', 'lovetype_excerpt' );

/**
 * Header code
 *
 * @since 1.0
 */
function lovetype_header_code() {

	$hcode = of_get_option( 'lovetype_header_code' );
	if ( $hcode ) 
		echo "\n" . stripslashes( $hcode ) . "\n";

}
add_action( 'wp_head', 'lovetype_header_code' );

/**
 * Footer code
 *
 * @since 1.0
 */
function lovetype_footer_code() {

	$output = of_get_option( 'lovetype_footer_code' );
	if ( $output ) 
		echo "\n" . stripslashes( $output ) . "\n";

}
add_action( 'wp_footer', 'lovetype_footer_code' );

/**
 * for textarea sanitization and $allowedposttags + embed and script.
 *
 * @since 0.0.1
 */
function lovetype_change_santiziation() {

    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'lovetype_sanitize_textarea' );
    
}
add_action('admin_init', 'lovetype_change_santiziation', 100);

function lovetype_sanitize_textarea($input) {

    global $allowedposttags;

    $custom_allowedtags["embed"] = array(
		"src" => array(),
		"type" => array(),
		"allowfullscreen" => array(),
		"allowscriptaccess" => array(),
		"height" => array(),
		"width" => array()
	);

	$custom_allowedtags["script"] = array(
		"src" => array(), 
		"type" => array()
	);

	$custom_allowedtags["meta"] = array(
		"name" => array(), 
		"content" => array()
	);

	$custom_allowedtags["link"] = array(
		"href" => array(), 
		"rel" => array(),
		"type" => array()
	);

	$custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
	$output = wp_kses( $input, $custom_allowedtags);
    return $output;

}

/** 
 * Custom script for theme settings
 *
 * @since 0.0.1
 */
function lovetype_custom_scripts() { ?>

	<script type='text/javascript'>
	jQuery(document).ready(function($) {
		$('#lovetype_disable_typography' ).click(function() {
			$('#section-lovetype_content_font, #section-lovetype_heading_font' ).fadeToggle(400);
		});
	});
	</script>

<?php
}
add_action( 'optionsframework_custom_scripts', 'lovetype_custom_scripts' );

/**
 * loads an additional CSS file for the options panel
 *
 * @since 0.0.6
 */
 if ( is_admin() ) {
    $of_page= 'appearance_page_options-framework';
    add_action( "admin_print_styles-$of_page", 'lovetype_optionsframework_custom_css', 100 );
}
 
function lovetype_optionsframework_custom_css () {
	wp_register_style( 'lovetype_optionsframework_custom_css', trailingslashit( LOVETYPE_CSS ) .'options-custom.css' );
	wp_enqueue_style( 'lovetype_optionsframework_custom_css' );
}
?>
