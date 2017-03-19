<?php
add_action('after_setup_theme', 'ondaweb_setup');

if (!function_exists('ondaweb_setup')){

	function ondaweb_setup(){

		add_theme_support('post-thumbnails');

		// add_image_size('small-feature', 500, 300, true);

		function ondaweb_excerpt_length($length) {
			var_dump($length);
			return 40;
		}
		add_filter('excerpt_length', 'ondaweb_excerpt_length');

		function ondaweb_continue_reading_link() {
			return ' <a href="'. esc_url( get_permalink() ) . '">' . __('Continue Lendo <span class="meta-nav">&rarr;</span>', 'ondaweb' ) . '</a>';
		}

		function ondaweb_auto_excerpt_more($more) {
			if (!is_admin()) {
				return ' &hellip;' . ondaweb_continue_reading_link();
			}
			return $more;
		}
		add_filter('excerpt_more', 'ondaweb_auto_excerpt_more' );

		function ondaweb_custom_excerpt_more( $output ) {
			if ( has_excerpt() && ! is_attachment() && ! is_admin() ) {
				$output .= ondaweb_continue_reading_link();
			}
			return $output;
		}
		add_filter('get_the_excerpt', 'ondaweb_custom_excerpt_more' );

		function ondaweb_widgets_init() {
			register_sidebar( array(
				'name' => __('Main Sidebar', 'ondaweb' ),
				'id' => 'sidebar-1',
			));
		}
		add_action('widgets_init', 'ondaweb_widgets_init' );

		function rw_title( $title, $sep, $seplocation ) {
			global $page, $paged;

			if(is_feed()) return $title;

			if('right' == $seplocation){
				$title .= get_bloginfo('name' );
			} else {
				$title = get_bloginfo('name').$title;
			}

			$site_description = get_bloginfo('description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) ) {
				$title .= " {$sep} {$site_description}";
			}

			if ( $paged >= 2 || $page >= 2 ) {
				$title .= " {$sep} " . sprintf( __('Página %s', 'dbt' ), max( $paged, $page ) );
			}

			return $title;
		}
		add_filter('wp_title', 'rw_title', 10, 3);
	}
}
?>
