<?php
require get_template_directory() . '/lib/init.php';
//require get_template_directory() . '/lib/setup.php';
require get_template_directory() . '/lib/shortcodes.php';
require get_template_directory() . '/lib/theme-functions.php';
require get_template_directory() . '/lib/template-tags.php';
require get_template_directory() . '/lib/extras.php';
require get_template_directory() . '/lib/customizer.php';
require get_template_directory() . '/lib/jetpack.php';
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
require_once dirname( __FILE__ ) . '/admin/options-framework.php';
//bootstrap nav walker
require get_template_directory() . '/lib/nav.php';
require get_template_directory() . '/lib/options-functions.php';

/*
	 * Removes Trackbacks from the comment count
	 *
	 */
	if ( !function_exists('comment_count') ) {
		add_filter('get_comments_number', 'comment_count', 0);

		function comment_count( $count ) {
			if ( ! is_admin() ) {
				global $id;
				$args = 'status=approve&post_id=' . $id;
				$comments = get_comments( $args, ARRAY_A );
				$comments_by_type = separate_comments( $comments );
				return count($comments_by_type['comment']);
			} else {
				return $count;
			}
		}
	}
