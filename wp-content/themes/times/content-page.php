<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Times
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
	<h1 class="entry-title col-md-12">
				<?php the_title(); ?>
			</h1>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'times' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( '<i class="fa fa-edit"></i> Edit', 'times' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
