<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package jobs
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header">
		<?php include "navigation.php";?>
	</header>

	<div class="spacer-100"></div>

	<?php //jobs_post_thumbnail(); ?>


	<div class="entry-content">
		<center>
			<?php the_title( '<h1 class="fnt-bl fnt-bold">', '</h1>' ); ?>
			<?php echo get_secondary_title(); ?>
		</center>
		
		<div class="spacer-100"></div>

		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jobs' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>

		<!--
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'jobs' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer>
		-->
	<?php endif; ?>
</div><!-- #post-<?php the_ID(); ?> -->
