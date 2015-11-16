<?php
/**
 * Times functions and definitions
 *
 * @package Times
 */

/**
 * Redux Framework
 */
require get_template_directory() . '/assets/frameworks/redux/admin/admin-init.php';
require get_template_directory() . '/options.php';


if ( ! function_exists( 'times_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function times_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'times', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	 global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
   	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'times' ),
		'footer' => __( 'Footer Menu', 'times' ),
		'top' => __( 'Top Menu', 'times' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'times_custom_background_args', array(
		'default-color' => '#E2E2E1',
		'default-image' => '',
	) ) );
	
	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
	
	//Register custom thumbnail sizes
	//add_image_size('grid',350,350,true); //For the Grid layout
	//add_image_size('grid2',430,292,true); //For the Grid2 layout
	//add_image_size('grid3',400,275,true); //For the Grid3 layout
	add_image_size('carousel',377,257,true);
	add_image_size('grid4',400,225,true);
	
	add_theme_support('woocommerce');
	
}
endif; // times_setup
add_action( 'after_setup_theme', 'times_setup' );

global $pagenow;
if ( is_admin() && ( isset( $_GET['activated'] ) || isset( $_GET['activate'] ) ) ) add_action( 'init', 'times_woocommerce_image_dimensions', 1 );
 
/**
 * Define image sizes
 */
function times_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '400',	// px
		'height'	=> '400',	// px
		'crop'		=> 1 		// true
	);
 
	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '600',	// px
		'crop'		=> 1 		// true
	);
 
	$thumbnail = array(
		'width' 	=> '150',	// px
		'height'	=> '150',	// px
		'crop'		=> 1 		// false
	);
 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function times_widgets_init() {

	register_sidebar( array(
		'name'          => __( 'Primary Sidebar', 'times' ), /* Primary Sidebar for Everywhere else */
		'id'            => 'sidebar-primary',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Left Sidebar', 'times' ), /* Default Left Sidebar */
		'id'            => 'sidebar-left',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'times' ), /* Footer Sidebar 1 */
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'times' ), /* Footer Sidebar 2 */
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'times' ), /* Footer Sidebar 3 */
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'times' ), /* Footer Sidebar 4 */
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span>',
		'after_title'   => '</span></h1>',
	) );

	
}
add_action( 'widgets_init', 'times_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function times_scripts() {

	//Load Default Stylesheet
	wp_enqueue_style( 'times-style', get_stylesheet_uri() );
	
	//Load Font Awesome CSS
	wp_enqueue_style('font-awesome', get_template_directory_uri()."/assets/frameworks/font-awesome/css/font-awesome.min.css");
	
	wp_enqueue_style('times-font', '//fonts.googleapis.com/css?family=Lato:100,300,400,700');
	
	//Load Bootstrap CSS
	wp_enqueue_style('bootstrap-style',get_template_directory_uri()."/assets/frameworks/bootstrap/css/bootstrap.min.css");
	
	//Load BxSlider CSS
	//wp_enqueue_style('bxslider-style',get_template_directory_uri()."/assets/css/bxslider.css");
	
	//Load Owl Carousel Data
	wp_enqueue_style('owl-style',get_template_directory_uri()."/assets/css/owl.carousel.css");
	wp_enqueue_style('owl-skin',get_template_directory_uri()."/assets/css/owl.theme.css");
	
	//Load Theme Structure File. Contains Orientation of the Theme.
	wp_enqueue_style('times-theme-structure', get_template_directory_uri()."/assets/css/main.css");

	//Load the File Containing Color/Font Information
	wp_enqueue_style('times-theme-style', get_template_directory_uri()."/assets/css/theme.css");

	
	//Load Bootstrap JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri()."/assets/frameworks/bootstrap/js/bootstrap.min.js", array('jquery'));

	//Load Bx Slider Js 
	//wp_enqueue_script('bxslider-js', get_template_directory_uri()."/assets/js/bxslider.min.js", array('jquery'));

	//Owl Js
	wp_enqueue_script('owl-js',get_template_directory_uri()."/assets/js/owl.carousel.min.js");

	//Load Theme Specific JS
	wp_enqueue_script('custom-js', get_template_directory_uri()."/assets/js/custom.js", array('jquery','hoverIntent'));


	//Load Navigation js. This is Responsible for Converting the Main Menu into Responsive, when the browser width is switched.
	wp_enqueue_script( 'times-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20120206', true );

	//Comes with _s Framework.
	wp_enqueue_script( 'times-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	//For the Default WordPress Comment's Reply System
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	//Declare support for Woo Commerce
	add_theme_support('woocommerce');
}
add_action( 'wp_enqueue_scripts', 'times_scripts' );

/*
 *	This function Contains All The scripts that Will be Loaded in the Theme Header including Slider, Custom CSS, etc.
 */
function times_initialize_header() {
	
	global $option_setting; //Global theme options variable
	
	//Place all Javascript Here
	echo "<script>";
	if (isset($option_setting['carousel-enable-on-home'])) :
		if ($option_setting['carousel-enable-on-home'] ) : ?>
			jQuery(document).ready(function(){
						jQuery('.owlcarousel').owlCarousel( {
							items : 4,
						    itemsCustom : false,
						    itemsDesktop : [1199,4],
						    itemsDesktopSmall : [980,3],
						    itemsTablet: [768,2],
						    itemsTabletSmall: false,
						    itemsMobile : [479,1],
						    singleItem : false,
						    itemsScaleUp : false,
						    pagination: false,
						    navigation: true,
						    navigationText: ["<img src='<?php echo get_template_directory_uri()."/assets/images/arrowleft.png" ?>'>","<img src='<?php echo get_template_directory_uri()."/assets/images/arrowright.png" ?>'>"]
						 });
					});
		
		
		
		<?php
		endif; ?>
			jQuery(document).ready(function() {
				if( jQuery(window).width() < 992 )
						 	jQuery('#primary, #primary-mono').insertBefore('#secondary-2');
			});
			
	<?php else : ?>
		jQuery(document).ready(function(){
						jQuery('.owlcarousel').owlCarousel( {
							items : 4,
						    itemsCustom : false,
						    itemsDesktop : [1199,4],
						    itemsDesktopSmall : [980,3],
						    itemsTablet: [768,2],
						    itemsTabletSmall: false,
						    itemsMobile : [479,1],
						    singleItem : false,
						    itemsScaleUp : false,
						    pagination: false,
						    navigation: true,
						    navigationText: ["<img src='<?php echo get_template_directory_uri()."/assets/images/arrowleft.png" ?>'>","<img src='<?php echo get_template_directory_uri()."/assets/images/arrowright.png" ?>'>"]
						 });
					});
			
	<?php endif;
	
	echo "</script>";
	//Java Script Ends
	
	//CSS Begins
	echo "<style>";
	
	// Echo the Custom CSS Entered via Theme Options
	echo $option_setting['custom-css'];	
	
	if (is_front_page()) :
		echo ".header-title { border: none; }";
	endif;
	
	echo "</style>";
	//CSS Ends
	
	
}
add_action('wp_head', 'times_initialize_header');

/*
 * Pagination Function. Implements core paginate_links function.
 */
function times_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
	 }
}
/*
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';