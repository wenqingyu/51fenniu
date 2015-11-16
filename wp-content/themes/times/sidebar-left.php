<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Times
 */
?>
	<div id="secondary-2" class="widget-area col-md-3 col-sm-6" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-left' ) ) : ?>

			<aside id="archives" class="widget">
				<h1 class="widget-title"><span><?php _e( 'Archives', 'times' ); ?></span></h1>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h1 class="widget-title"><span><?php _e( 'Meta', 'times' ); ?></span></h1>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>
			
			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->