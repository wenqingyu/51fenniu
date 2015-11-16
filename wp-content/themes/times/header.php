<?php
/**
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Times
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php global $option_setting; ?>
<div id="page" class="hfeed site">
<div id="top-bar">
	<div class="container">
			<div class="site-branding">
					<?php if (isset($option_setting['logo']['url'])) : ?>
						<?php if( $option_setting['logo']['url'] != "" ) : ?>
							<div id="site-logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($option_setting['logo']['url']) ?>"></a>
							</div>
						<?php else : ?>	
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-hover="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php endif; ?>	
					<?php else : ?>	
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-hover="<?php bloginfo( 'name' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>	
			</div>
			<div class="top-navigation">
				<?php  if (has_nav_menu('top'))
						 wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
			</div>
			<div class="top-right-search">
				<div id="search-bar"><?php get_template_part('searchform', 'top'); ?></div>
				<img src="<?php echo get_template_directory_uri()."/assets/images/search.png"?>">
			</div>	
	</div><!--.container-->
</div><!--#top-bar-->

<?php 
if (isset($option_setting['carousel-enable-on-home'])) :
	get_template_part('carousel');
else :	
	get_template_part('carousel','default');
endif;	 ?>


<div id="top-nav" class="container">
	<div id="top-nav-wrapper">
		<div class="container">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'times' ); ?></h1>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'times' ); ?></a>
					
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->	
		</div>	
	</div>
</div>
	
	<div id="content" class="site-content">
	<div class="container content-inner">