<?php
/**
 * @package Times
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col-sm-6 grid4'); ?>>

		<div class="featured-thumb col-md-12">
			<?php if (has_post_thumbnail()) : ?>	
				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail('grid4'); ?></a>
			<?php else: ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder.png"; ?>"></a>
			<?php endif; ?>
		</div><!--.featured-thumb-->
			
		<div class="out-thumb col-md-12">
			<header class="entry-header">
				<div class="meta">
					<span class="entry-meta">
					<?php
						$categories = get_the_category();
						$separator = ' &bull; ';
						$output = '';
						if($categories){
							foreach($categories as $category) {
								$output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s","times" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
							}
						echo trim($output, $separator);
						}
					?>
					</span>
					<span class="meta-date"><?php echo the_time('M j, Y'); ?></span>
				</div>
				
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

				<span class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,200).(get_the_excerpt() ? "..." : "" ); ?></span>
			</header><!-- .entry-header -->
			
		</div><!--.out-thumb-->
			
		
		
</article><!-- #post-## -->