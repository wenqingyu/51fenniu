<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Times
 */
 global $option_setting;
?>
	<div id="secondary" class="widget-area col-md-2 col-sm-6" role="complementary">
	<?php 
		if(isset($option_setting['enable-social-icons'])) :
			if ($option_setting['enable-social-icons']) :
				get_template_part('social', 'aside');
			endif;
		else :
			get_template_part('social', 'default');
		endif; ?>
	
		<?php if ( ! dynamic_sidebar( 'sidebar-primary' ) ) : ?>

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