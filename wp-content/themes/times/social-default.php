<?php global $option_setting; ?>
<aside id="social-icons" class="widget widget_social_icons">
	<h1 class='widget-title'><span>
		<?php if ($option_setting['social-title'])
				echo $option_setting['social-title'];
			   else 
				_e('Follow Us','times'); ?>
	</span></h1>
	<div class="social-icons">
		<a title='Facebook' href="#"><img src="<?php echo get_template_directory_uri()."/assets/images/social/facebook.png"; ?>"></a>
		<a title='Google Plus' href="#"><img src="<?php echo get_template_directory_uri()."/assets/images/social/google.png"; ?>"></a>
		<a title='Twitter' href="#"><img src="<?php echo get_template_directory_uri()."/assets/images/social/twitter.png"; ?>"></a>
		<a title='Subscribe to RSS Feeds' href="#"><img src="<?php echo get_template_directory_uri()."/assets/images/social/rss.png"; ?>"></a>
		<a title='Instagram' href="#"><img src="<?php echo get_template_directory_uri()."/assets/images/social/instagram.png"; ?>"></a>
		<a title='Flickr' href="#"><img src="<?php echo get_template_directory_uri()."/assets/images/social/flickr.png"; ?>"></a>
	</aside>