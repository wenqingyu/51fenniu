<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Times
 */
?>
		</div><!--.content-inner-->
	</div><!-- #content -->
</div><!-- #page -->

<?php get_template_part('sidebar', 'footer'); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="spanner">
		<div class="container">
			<div class="site-info col-md-4">
				<?php printf( __( 'Designed by %1$s.', 'times' ), '<a href="http://rohitink.com" rel="designer">Rohit Tripathi</a>' ); ?>
			</div><!-- .site-info -->
			<div class="footer-menu col-md-8">
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</div>	
		</div><!--.container-->	
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>