<?php
/**
* Import scripts link at footer.php
*/

global $library;
?>
<?php if(true): ?>
  <?php // Jquery ?>
  <script src="<?php echo $library; ?>/node_modules/jquery/dist/jquery.min.js" charset="utf-8"></script>

<?php endif; if(false): ?>
  <?php // BXSlider ?>
  <script src="<?php echo $library; ?>/node_modules/bxslider/dist/jquery.bxslider.min.js" charset="utf-8"></script>

<?php endif; if(false): ?>
  <?php // Other External Module Below ?>
  <script src="<?php echo $library; ?>/node_modules/" charset="utf-8"></script>

<?php endif; ?>
