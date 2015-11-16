<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Times
 */

get_header(); ?>
	
	<div class="header-title col-md-12">
		<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'times' ), get_the_author()  );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'times' ),  get_the_date()  );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'times' ),  get_the_date( _x( 'F Y', 'monthly archives date format', 'times' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'times' ), get_the_date( _x( 'Y', 'yearly archives date format', 'times' ) ) );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'times' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'times');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'times');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'times' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'times' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'times' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'times' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'times' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'times' );

						else :
							_e( 'Archives', 'times' );

						endif;
					?>
	</div>
	<?php get_sidebar('left'); ?>
	<section id="primary" class="content-area col-md-7">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<?php $count = 0; ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					if($count == 0)
						echo "<div class='row'>" ;
					elseif($count%2 == 0)
						echo "</div><!--.row--><div class='row'>";
					 
					get_template_part( 'content', 'grid4' );
					
					$count++;
				?>

			<?php endwhile; ?>
			<?php echo "</div><!--.row-->"; ?>
			
			<?php times_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
