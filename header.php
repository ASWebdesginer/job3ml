<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jobs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <-- google tags --->

	<script async src="https://www.googletagmanager.com/gtag/js?id=G-PT5LQPDX1Y">
	</script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());
		gtag('config', 'G-PT5LQPDX1Y');
	</script>

		<?php require_once("favicon.php"); ?>

		<?php wp_head(); ?>

			<script src = "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" >
	</script>


	<style>
		html {
			margin-top: 0px !important;
		}
	</style>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'jobs'); ?></a>


		<!--
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if (is_front_page() && is_home()) :
			?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
				<?php
			endif;
			$jobs_description = get_bloginfo('description', 'display');
			if ($jobs_description || is_customize_preview()) :
				?>
				<p class="site-description"><?php echo $jobs_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
											?></p>
			<?php endif; ?>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'jobs'); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav>
	
	</header>
	-->