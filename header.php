<?php global $library; $library = get_template_directory_uri().'/library'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php wp_title(); ?></title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo $library; ?>/favicon.png" />
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo $library; ?>/favicon.ico" />
		<![endif]-->

    <!-- Grid, Normalize -->
    <link rel="stylesheet" href="<?php echo $library ?>/css/basic.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?php echo $library ?>/css/style.css">

    <!-- Modules -->
    <?php get_template_part('content-modules-header', get_post_format()); ?>

    <?php wp_head(); ?>
  </head>
  <body>
    <main>
