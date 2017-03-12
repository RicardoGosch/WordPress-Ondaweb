<?php
/**
 * Template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @package WordPress
 * @subpackage ondaweb
 * @since Ondaweb 1.0
 */

global $library;
?>
<?php get_header(); ?>

<?php get_footer(); ?>

<?php
/**
 * Command tips
 */

/*
// Loop
if(have_posts()):
  while(have_posts()):the_post();

  endwhile;
endif;

// Including external files
get_template_part('content', get_post_format());
*/
?>
