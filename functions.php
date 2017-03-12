<?php
add_action( 'after_setup_theme', 'ondaweb_setup' );

if (!function_exists('ondaweb_setup')){

  function ondaweb_setup(){
    // This theme uses wp_nav_menu() in one location.
  	register_nav_menu('primary', __('Primary Menu', 'ondaweb'));

    // This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
  	add_theme_support( 'post-thumbnails' );

    // Used for featured posts if a large-feature doesn't exist.
    add_image_size( 'small-feature', 500, 300 );

    /**
     * Set the post excerpt length to 40 words.
     *
     * To override this length in a child theme, remove
     * the filter and add your own function tied to
     * the excerpt_length filter hook.
     *
     * @since Ondaweb 1.0
     *
     * @param int $length The number of excerpt characters.
     * @return int The filtered number of characters.
     */
    function ondaweb_excerpt_length( $length ) {
    	return 40;
    }
    add_filter( 'excerpt_length', 'ondaweb_excerpt_length' );

    if ( ! function_exists( 'ondaweb_continue_reading_link' ) ) :
    /**
     * Return a "Continue Reading" link for excerpts
     *
     * @since Twenty Eleven 1.0
     *
     * @return string The "Continue Reading" HTML link.
     */
    function ondaweb_continue_reading_link() {
    	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ondaweb' ) . '</a>';
    }
  endif; // ondaweb_continue_reading_link

    /**
     * Replace "[...]" in the Read More link with an ellipsis.
     *
     * The "[...]" is appended to automatically generated excerpts.
     *
     * To override this in a child theme, remove the filter and add your own
     * function tied to the excerpt_more filter hook.
     *
     * @since Twenty Eleven 1.0
     *
     * @param string $more The Read More text.
     * @return The filtered Read More text.
     */
    function ondaweb_auto_excerpt_more( $more ) {
    	if ( ! is_admin() ) {
    		return ' &hellip;' . ondaweb_continue_reading_link();
    	}
    	return $more;
    }
    add_filter( 'excerpt_more', 'ondaweb_auto_excerpt_more' );

    /**
     * Add a pretty "Continue Reading" link to custom post excerpts.
     *
     * To override this link in a child theme, remove the filter and add your own
     * function tied to the get_the_excerpt filter hook.
     *
     * @since Twenty Eleven 1.0
     *
     * @param string $output The "Continue Reading" link.
     * @return string The filtered "Continue Reading" link.
     */
    function ondaweb_custom_excerpt_more( $output ) {
    	if ( has_excerpt() && ! is_attachment() && ! is_admin() ) {
    		$output .= ondaweb_continue_reading_link();
    	}
    	return $output;
    }
    add_filter( 'get_the_excerpt', 'ondaweb_custom_excerpt_more' );

    function ondaweb_widgets_init() {

    	register_sidebar( array(
    		'name' => __( 'Main Sidebar', 'ondaweb' ),
    		'id' => 'sidebar-1',
    	));

    }
    add_action( 'widgets_init', 'ondaweb_widgets_init' );

    // A better title
    add_filter('wp_title', 'rw_title', 10, 3);
    function rw_title( $title, $sep, $seplocation ) {
      global $page, $paged;
      // Don't affect in feeds.
      if(is_feed()) return $title;
      // Add the blog's name
      if('right' == $seplocation){
        $title .= get_bloginfo( 'name' );
      } else {
        $title = get_bloginfo('name').$title;
      }
      // Add the blog description for the home/front page.
      $site_description = get_bloginfo( 'description', 'display' );
      if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " {$sep} {$site_description}";
      }
      // Add a page number if necessary:
      if ( $paged >= 2 || $page >= 2 ) {
        $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
      }
      return $title;
    }
  }
}
?>
