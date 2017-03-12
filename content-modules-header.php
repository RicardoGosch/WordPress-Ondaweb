<?php
/**
* Template to complement other pages
*
* Import styles link at header.php
*
* @package WordPress
* @subpackage ondaweb
* @since Ondaweb 1.0
*/

global $library;
?>
<?php if(false):?>
  <!-- BxSlider -->
  <link rel='stylesheet' href='<?php echo $library ?>/node_modules/bxslider/dist/jquery.bxslider.min.css'>
<?php endif; if(false):?>
  <!-- Other External Module Below -->
  <link rel="stylesheet" href="<?php echo $library; ?>/node_modules/">
<?php endif; ?>
