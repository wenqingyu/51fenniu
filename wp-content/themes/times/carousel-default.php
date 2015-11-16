<div id="carousel-wrapper">
	<div class="container">
		<ul class="owlcarousel">
			<?php
				$args = array( 'posts_per_page' => 7 );
				$lastposts = get_posts( $args );
				foreach ( $lastposts as $post ) :
				  setup_postdata( $post ); ?>
				  	<li><a title="<?php the_title(); ?>" href='<?php the_permalink(); ?>'>
				  	<?php if (has_post_thumbnail()) : 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_image_src($thumb_id,'carousel', true);
							echo "<img class='carousel-image' src='".$thumb_url[0]."' title='".get_the_title()."'>";	
						else :
							echo "<img class='carousel-image' src='".get_template_directory_uri()."/assets/images/placeholder2.png' title='".get_the_title()."'>";	
						endif; ?></a><div class="carousel-caption <?php if (strlen(get_the_title()) > 43) echo "carousel-long"; ?> "><span><?php the_title(); ?></span></div></li>
				<?php endforeach; 
				wp_reset_postdata(); 
			?>	           
		 </ul>   
	</div>
</div>
