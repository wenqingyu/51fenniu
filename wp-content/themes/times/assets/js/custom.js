jQuery(document).ready( function () {

	//For Menu Bar
	jQuery('#site-navigation li').find('ul').hide();
		jQuery('#site-navigation li').hoverIntent({
			over: function(){
				jQuery(this).find('> ul').slideDown('fast');
			},
			out: function(){
				jQuery(this).find('ul').fadeOut(200);
			}
			});	
		
		jQuery('.menu-toggle').toggle(function() {
				jQuery('#site-navigation ul.menu').slideDown();
				jQuery('#site-navigation div.menu').fadeIn();
			},
			function() {
				jQuery('#site-navigation ul.menu').hide();
				jQuery('#site-navigation div.menu').hide();
		});
		
	jQuery('#site-navigation li').find('> ul').parent().find('> a').addClass('dropdown');	
	jQuery('#site-navigation li ul.sub-menu li').find('> ul').parent().find('> a').addClass('dropright');
	
	//Hide showcase items for waypoint to work
	/*
jQuery('.showcase').fadeOut('fast')
	jQuery('article.grid2').fadeOut();
	jQuery('#home-title').fadeOut();
	jQuery('.pagination').fadeOut();
*/
		
	jQuery('#carousel-wrapper').hover( 
		function() { 
			jQuery('.owl-theme .owl-controls .owl-buttons').css('display','block');
		},
		function(){ 
			jQuery('.owl-theme .owl-controls .owl-buttons').css('display','none'); 
		});
	
	jQuery('.top-right-search').click(function(){
		jQuery('.search-form-top input[type=text]').fadeIn().css({
			width   : "240px"
		});
		jQuery('.search-form-top input[type=text]').focus();
	});
	
	jQuery('.search-form-top input[type=text]').focusout(function(){
		jQuery('.search-form-top input[type=text]').animate({
			width   : "0px"
		},100, function() { jQuery(this).hide()});
	});
	
	});//end ready