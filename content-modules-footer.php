<?php
/**
* Template to complement other pages
*
* Import scripts link at footer.php
*
* @package WordPress
* @subpackage ondaweb
* @since Ondaweb 1.0
*/

global $library;
?>
<?php if(true):?>
  <!-- Jquery -->
  <script src="<?php echo $library; ?>/node_modules/jquery/dist/jquery.min.js" charset="utf-8"></script>

<?php endif; if(false): ?>
  <!-- BXSlider -->
  <script src="<?php echo $library; ?>/node_modules/bxslider/dist/jquery.bxslider.min.js" charset="utf-8"></script>

<?php endif; if(false): ?>
  <!-- Other External Module Below -->
  <script src="<?php echo $library; ?>/node_modules/" charset="utf-8"></script>
<?php endif; ?>
