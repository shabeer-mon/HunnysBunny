<?php
/**
 * HB functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package HB
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// add_action( 'init', 'process_post1' );

// function process_post1() {
global $custom_image_link;
$custom_image_link = 'https://www.xtrader.co.uk/nvimages/';

define('custom_image_link', 'https://www.xtrader.co.uk/nvimages/');
// }

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hb_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on HB, use a find and replace
		* to change 'hb' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'hb', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'hb' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'hb_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'hb_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function hb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hb_content_width', 640 );
}
add_action( 'after_setup_theme', 'hb_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function hb_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hb' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hb' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		
		array(
			'name'          => esc_html__( 'Sidebar 2', 'hb' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'hb' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hb_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hb_scripts() {
	wp_enqueue_style( 'hb-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'style-css-3', 'https://fonts.googleapis.com', array(), _S_VERSION );
	wp_enqueue_style( 'style-css-2', 'https://fonts.gstatic.com', array(), _S_VERSION );
	wp_enqueue_style( 'style-css-1', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap', array(), _S_VERSION );
	wp_enqueue_style( 'style-css',get_template_directory_uri() . '/css/style.css', array(), _S_VERSION );
	// wp_enqueue_style( 'style-css1',get_template_directory_uri() . '/css/style1.css', array(), _S_VERSION );
	wp_enqueue_style( 'style-css-6',get_template_directory_uri() . '/css/woo.css', array(), _S_VERSION );
	wp_style_add_data( 'hb-style', 'rtl', 'replace' );

	wp_enqueue_script( ' jquery.min', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'hb-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hb_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter( 'get_custom_logo', 'change_logo_class' );


function change_logo_class( $html ) {

    // $html = str_replace( 'custom-logo', 'navbar-brand', $html );
    $html = str_replace( 'custom-logo-link', 'navbar-brand ', $html );

    return $html;
}

 // sorting


 add_action( 'woocommerce_before_shop_filter', 'woocommerce_catalog_ordering', 10 ); 
 remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
 





 class Custom_Menu_Walker extends Walker_Nav_Menu {
		// Start the submenu
		private $index = 0;
		private $prev_val = '';
		function start_lvl( &$output, $depth = 0, $args = null ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "\n$indent<div class=\"dropdown-toggle\"><i class=\"icon-right\"></i></div></div><ul class=\"submenu\"><li class=\"submenu-title-block\">
			<span class=\"submenu-close\"><i class=\"icon-left\"></i></span>
			<span class=\"main-category-name\">$this->prev_val</span>
		</li>\n";
			$this->index= 0;
	// 	echo '<pre>';
	// 	print_r($args);
	// echo '</pre>';
		}
		
	
	
		// End the submenu
		function end_lvl( &$output, $depth = 0, $args = null ) {
			$indent = str_repeat( "\t", $depth );
			$output .= "$indent</ul>\n";
		}
	
		// Start the menu item element
		function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
			$this->index++;
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
			$class_names = $value = "";
			
			// Get classes for the current menu item
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			if(in_array('menu-item-has-children',$classes))
			$classes[] = 'dropdown';
			// else
			// $classes[] = 'btn-close-block';

			// echo '<pre>';
			// print_r($args);
			// echo '</pre>';
			// Join the classes with a space
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
	
			// Add class attribute to the menu item
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
	
			// Add ID attribute to the menu item
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
	
			// Start outputting the menu item
			if(in_array('menu-item-has-children',$classes)){
				$output .= $indent . '<li' . $id . $value . $class_names .'><div class="navitem-header">';
			}else{
			// if($this->index ==1 && $depth==0){
			// $output .= $indent . '<li class="btn-close-block">
			// 						<span class="btn-close"><i class="icon-close"></i></span>
			// 					</li>';
			// }
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			}
			$this->prev_val = $item->title;
			// Set attributes for the anchor element
			$atts = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';
	
			// Filter the anchor element attributes
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
	
			// Build the anchor element attributes
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			// if(){
				
			// }
	
			// Start outputting the anchor element
			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
	
			// Add the menu item output to the overall output
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	
		// End the menu item element
		function end_el( &$output, $item, $depth = 0, $args = null ) {
			$output .= "</li>\n";
		}
	}
	


// // Add class to WooCommerce Add to Cart button
// // Add class to WooCommerce Add to Cart button
// function add_class_to_add_to_cart_button($button_html, $product) {
//     // Add your custom class here
//     $custom_class = 'your-custom-class';

//     // Add the custom class to the button HTML
//     $button_html = str_replace('button', 'button ' . $custom_class, $button_html);

//     return $button_html;
// }
// add_filter('woocommerce_loop_add_to_cart_link', 'add_class_to_add_to_cart_button', 10, 2);


add_filter( 'woocommerce_product_data_store_cpt_get_products_query', 'handle_price_range_query_var', 10, 2 );
function handle_price_range_query_var( $query, $query_vars ) {
    if ( ! empty( $query_vars['price_range'] ) ) {
        $price_range = explode( '|', esc_attr($query_vars['price_range']) );

        if ( is_array($price_range) && count($price_range) == 2 ) {
            $query['meta_query'][] = array(
                'key'     => '_price',
                'value'   => $price_range, // Price range array
                'compare' => 'BETWEEN',
                'type'    => 'NUMERIC'
            );
            $query['orderby'] = 'meta_value_num'; // sort by price
            $query['order'] = 'ASC'; // In ascending order
        }
    }
    return $query;
}
	

	function custom_modify_shop_loop_query( $query ) {
		// print_r($_GET['min_price'] );die;
		// Check if on the shop page and if the query is the main query
		if ( $query->is_main_query() && is_shop() ) {
			if ( isset( $_GET['min_price'] ) && isset( $_GET['max_price'] ) ) {
				$min_price = floatval( $_GET['min_price'] );
				$max_price = floatval( $_GET['max_price'] );
			
				// Construct the product query arguments
				$args = array(
					'limit' => -1, // Get all products
					'orderby' => 'date', // Order products by date
					'order' => 'DESC', // Order products in descending order
					'meta_query' => array(
						array(
							'key' => '_price', // Meta key for price
							'value' => array( $min_price, $max_price ), // Price range (minimum and maximum)
							'type' => 'numeric',
							'compare' => 'BETWEEN'
						)
					)
				);
			}
			return $query;
		}
	}
	add_action( 'pre_get_posts', 'custom_modify_shop_loop_query' );


	// add_shortcode('woocommerce_desc_order_products', 'display_new_products_after_cart');

	// function display_new_products_after_cart() {
		
	// 	// Query new products
	// 	$args = array(
	// 		'post_type'      => 'product',
	// 		'posts_per_page' => 4, // Change this number as needed
	// 		'orderby'        => 'date',
	// 		'order'          => 'DESC',
	// 	);
	
	// 	$new_products = new WP_Query($args);
	// $hhh = '';
	// 	// Display new products
	// 	if ($new_products->have_posts()) {       
	// 		while ($new_products->have_posts()) {
	// 			$new_products->the_post();
	// 			$hhh .=	wc_get_template_part('content', 'product')??'';
	// 		}
	// 	}
		
	// 	wp_reset_postdata();
	// 	return $hhh;
	// }
	

 
 add_action( 'init', 'process_post' );

 




 function process_post() {
	function add_class_and_attribute_to_menu_item($atts, $item, $args) {
		if ($item->ID == '4934') {
			$atts['class'] = 'drawer-button';
			$atts['data-custom-attribute'] = 'cookiesPolicy';
		}
		return $atts;
	}
	add_filter('nav_menu_link_attributes', 'add_class_and_attribute_to_menu_item', 10, 3);
	// add_action('template_redirect', 'redirect_to_login_or_guest_checkout_before_checkout');
	// 	function redirect_to_login_or_guest_checkout_before_checkout() {
	// 		// Check if user is not logged in and is trying to access the checkout page
	// 		if ( !is_user_logged_in() && !is_wc_endpoint_url() ) {
	// 			// Redirect to login page if registration is enabled
	// 			if (get_option('woocommerce_enable_guest_checkout') === 'yes') {
	// 				if(!is_cart())
	// 				wp_redirect( wc_get_checkout_url() );
	// 			else	
	// 				wp_redirect( 'guest-checkout' );
	// 			} else {
	// 				// Redirect to login page
	// 				wp_redirect( wp_login_url( get_permalink() ) );
	// 			}
	// 			exit;
	// 		}
	// }
	// add_action('template_redirect', 'redirect_to_login_before_checkout');
	// function redirect_to_login_before_checkout() {
	// 	// Check if user is not logged in and is trying to access the checkout page
	// 	if ( !is_user_logged_in() && is_checkout() && !is_wc_endpoint_url()  ) {
	// 		// Redirect to login page
	// 		// echo is_cart();
	// 		// die(is_cart());
	// 		wp_redirect(get_permalink( get_page_by_path( 'guest-checkout' ) )  );
	// 		exit;
	// 	}
	// }
	
	add_filter('woocommerce_product_get_image', 'change_product_image_url', 10, 2);
	function change_product_image_url($html, $product) {
		$placeholder_url = wc_placeholder_img_src();
		$imgUrl = get_the_post_thumbnail_url($product->id)?get_the_post_thumbnail_url($product->id):(custom_image_link.(get_post_meta($product->id, '_custom_THUMBNAIL', true)));
		// Replace the existing image URL with the new one
		$html = str_replace($placeholder_url, $imgUrl, $html);
		
		return $html;
	}
	add_filter('woocommerce_cart_item_thumbnail', 'change_cart_product_image_url', 10, 3);

	function change_cart_product_image_url($product_thumbnail, $cart_item, $cart_item_key) {
		$product_id = $cart_item['product_id'];
		$imgUrl = get_the_post_thumbnail_url($product_id)?get_the_post_thumbnail_url($product_id):(custom_image_link.(get_post_meta($product_id, '_custom_THUMBNAIL', true)));
		$product_thumbnail = str_replace($cart_item['data']->get_image(), '<img src="' . $imgUrl . '" onerror="this.src='."'". wc_placeholder_img_src()."'".'"  />', $product_thumbnail);
		return $product_thumbnail;
	}


 if(isset($_POST['serch_by_name'])&& !empty($_POST['serch_by_name'])){
	$args = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'posts_per_page' => 8, // Retrieve all products
		's'              => $_POST['serch_by_name'], // Search keyword
	);
	
	// $query = new WP_Query( $args );
	$loop = new WP_Query( $args );
	// $loop = new WP_Query( $args );
	if($loop->have_posts() ){
	while ( $loop->have_posts() ) : $loop->the_post(); 
	  global $product; ?>
	  <div class="prod-list-item">
	  <div class="inner-box">
			<a href="<?php the_permalink(); ?>" class="img-box">
				<?php  if(get_the_post_thumbnail_url($loop->post->ID)){ ?>
					<img src="<?php echo get_the_post_thumbnail_url($loop->post->ID); ?>" alt="" />
				<?php } else{  $single_meta = get_post_meta($loop->post->ID, '_custom_THUMBNAIL', true); ?>

					<img src="<?php echo custom_image_link.$single_meta; ?>" onerror="this.src='<?php echo wc_placeholder_img_src(); ?>'"  alt="" />

				<?php } ?>
			</a>
		  <?php if($product->get_sale_price()){?>
		<span class="offer-text">Up to <?php echo ceil( ($product->get_regular_price()-$product->get_sale_price())*100/($product->get_regular_price())); ?>% Off </span>
		<?php } ?>
		  <div class="content">
			  <h3 class="title"><?php the_title(); ?></h3>
			  <div class="button-block">
				  <a class="btn btn-primary" href="<?php the_permalink(); ?>">Shop now</a>
				  <div class="price-block">
				  <div class="price"><?php echo get_woocommerce_currency_symbol(); ?>  <?php echo $product->get_price();  ?></div>
					  <?php if($product->get_sale_price()){?>                    
						  <div class="old-price"> <?php echo get_woocommerce_currency_symbol(); ?> <?php  echo $product->get_regular_price();  ?></div>
					 <?php } ?>
				  </div>
			  </div>
		  </div>
	  </div>
	  </div>
	<?php endwhile;  }else{ ?>
		<div class="prod-list-item">
		No data found
	</div>

	<?php } ?>
	
	<?php wp_reset_query();
	die;
 }
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 25);
function woocommerce_output_related_products(){
	$args = array( 
        'posts_per_page' => 4,  
        'columns' => 4,  
        'orderby' => 'rand' 
 ); 
   	woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) ); 
}

function theme_register_footer_menu() {
    register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'theme_register_footer_menu' );

function theme_register_social_menu() {
    register_nav_menu('social-menu',__( 'Social Menu' ));
}
add_action( 'init', 'theme_register_social_menu' );

function custom_related_products_label( $label ) {
    // Change "Related products" to your custom label
    $label = __( 'You may also like peoducts', 'your-text-domain' );
    return $label;
}
add_filter( 'woocommerce_product_related_products_heading', 'custom_related_products_label' );









// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%


// add_action( 'woocommerce_before_single_product', function() {
//     add_filter( 'woocommerce_product_get_gallery_image_ids', function($imgIds,$dd){
// 		if(count($imgIds)>1){
// 			// array_shift($imgIds);
// 			unset($imgIds[2]);
// 			// array_pop($imgIds);
// 			return print_r($dd);
// 			return print_r($imgIds);
// 			return $imgIds;
// 		}
// 		print_r($imgIds);
// 		return $imgIds;
// 	} );
// } );

// add_filter( 'woocommerce_single_product_carousel_options', 'sf_update_woo_flexslider_options' );
// /** 
//  * Filer WooCommerce Flexslider options - Add Navigation Arrows
//  */
// function sf_update_woo_flexslider_options( $options ) {

//     $options['directionNav'] = true;
//     $options['controlNav'] = false;

//     return $options;
// }

// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################




add_action( 'init', 'bubblechaz_create_terms_on_submission' );



function bubblechaz_create_terms_on_submission() {
	
	// print_r($_POST); die;
	if(isset($_POST['submit_type']) && $_POST['submit_type']=='xtrade-csv' && !empty($_POST['xml_file'])){
		// print_r($_POST['xml_file']); die;
		$fileText = @file_get_contents($_POST['xml_file']);
			if ($fileText === false) {
				echo 'Data source file not found please provide the correct url.';
				die;
			}
		global $wpdb;

			$table_name = 'wp_xt_data'; // Assuming 'products' is the name of your table
			echo $table_name;
				$xml = simplexml_load_string($fileText, "SimpleXMLElement", LIBXML_NOCDATA);

				foreach($xml->CREATED->CATEGORY as $category){
					$category_name =  $category->attributes()->name;
					// echo '<pre>';
					// print_r($category->PRODUCT);
					// echo '<pre>';
					foreach($category->PRODUCT as $key=>$productData ){

							$idata = array(
								'WEIGHT' => "$productData->WEIGHT",
								'NAME' => "$productData->NAME",
								'MODEL' => "$productData->MODEL",
								'PRICE' => "$productData->PRICE",
								'PRIVATESTOCKPRICE' => "$productData->PRIVATESTOCKPRICE",
								'CASESIZE' => "$productData->PRIVATESTOCKPRICE",
								'RRP' => "$productData->RRP" ,
								'THUMB' => "$productData->THUMB" ,
								'IMAGE' => "$productData->IMAGE" ,
								'MULTI' => "$productData->MULTI" ,
								'MULTI1' => "$productData->MULTI1" ,
								'MULTI2' => "$productData->MULTI2" ,
								'MULTI3' => "$productData->MULTI3" ,
								'BIGMULTI1' => "$productData->BIGMULTI1" ,
								'BIGMULTI2' => "$productData->BIGMULTI2" ,
								'BIGMULTI3' => "$productData->BIGMULTI3" ,
								'DESCRIPTION' => "$productData->DESCRIPTION" ,
								'DESC_RAW' => "$productData->DESC_RAW" ,
								'EAN' => "$productData->EAN"  ,
								'XIMAGE' => "$productData->XIMAGE"  ,
								'XIMAGE2' => "$productData->XIMAGE2" ,
								'XIMAGE3' => "$productData->XIMAGE3" ,
								'XIMAGE4' => "$productData->XIMAGE4" ,
								'XIMAGE5' => "$productData->XIMAGE5" ,
								'LENGTH' => "$productData->LENGTH" ,
								'LUBETYPE' => "$productData->LUBETYPE" ,
								'CONDOMSAFE' => "$productData->CONDOMSAFE" ,
								'LIQUIDVOLUMN' => "$productData->LIQUIDVOLUMN" ,
								'NUMBEROFPILLS' => "$productData->NUMBEROFPILLS" ,
								'FASTENING' => "$productData->FASTENING" ,
								'WASHING' => "$productData->WASHING" ,
								'INSERTABLE' => "$productData->INSERTABLE" ,
								'DIAMETER' => "$productData->DIAMETER" ,
								'HARNESSCOMPATIBLE' => "$productData->HARNESSCOMPATIBLE" ,
								'ORINGCIRC' => "$productData->ORINGCIRC" ,
								'ORINGDIAM' => "$productData->ORINGDIAM" ,
								'CIRCUMFERENCE' => "$productData->CIRCUMFERENCE" ,
								'COLOUR' => "$productData->COLOUR" ,
								'FLEXIBILITY' => "$productData->FLEXIBILITY" ,
								'CONTROLLER' => "$productData->CONTROLLER" ,
								'FORWHO' => "$productData->FORWHO" ,
								'WHATISIT' => "$productData->WHATISIT" ,
								// 'FOR' => "$productData->FOR" ,
								'MOTION' => "$productData->MOTION" ,
								'FEATURES' => "$productData->FEATURES" ,
								'MISC' => "$productData->MISC" ,
								'WATERPROOF' => "$productData->WATERPROOF" ,
								'MATERIAL' => "$productData->MATERIAL" ,
								'BRAND' => "$productData->BRAND" ,
								'STYLE' => "$productData->STYLE" ,
								'POWER' => "$productData->POWER" ,
								'SIZE' => "$productData->SIZE" ,
								'OPENING' => "$productData->OPENING" ,
								'INCATNAME' => "$productData->INCATNAME" 
							);

								// echo '<pre> ----------------';
								// print_r ($idata);
								// echo '<pre>';
								if (false === $wpdb->insert($table_name, $idata)) {
									$wpdb_last_error = $wpdb->last_error;
									print_r($wpdb_last_error);
									die;
									// Handle the error, log it, or print it for debugging
								}
							// $fr =  $wpdb->insert( $table_name, [$data] );
							// print_r($fr);
							// $img_url = 'https://www.xtrader.co.uk/nvimages/';
							
							// if($ii>=1){

							// 	die;
							// }
							// $ii++;
						
					}
				}

				echo 'Data has been inserted';
				die;


		// $table = 'wp_options';
		// $data = array('option_value'=>$_POST['xml_file']);
		// $where = array('option_name'=>'x_trader_data_file');
		// $wpdb->update( $table, $data, $where);
		// echo 'File Uploaded Successfully';
		// 	die;
			
	}
}
add_action( 'init', 'bubblechaz_create_terms_on_submission1' );
function bubblechaz_create_terms_on_submission1() {
	if(isset($_GET['submit_type']) && $_GET['submit_type']=='xtrade-loop-data'){

		global $wpdb;
		
			$retrieve_data = $wpdb->get_results( "select * from wp_xt_data" );
				if ( !$retrieve_data ) {
					echo 'Data source file not found please provide the correct url.';
					die;
				}
				$ii = 0;
					foreach($retrieve_data as $key=>$productData ){


						$id= get_term_by('name',$productData->INCATNAME , 'product_cat'); //$parent_id is parent term id, in your case id of Lense
						if(empty($id))
						{
							$id = wp_insert_term($productData->INCATNAME,'product_cat');
						}
						$term_id =  $id->term_id;

						$products = wc_get_products( array( 'sku' =>  "$productData->MODEL") );
						reset( $products );
						if(count($products)<1){
							$img_url = 'https://www.xtrader.co.uk/nvimages/';
							$product = new WC_Product_Simple();
							$product->set_name( $productData->NAME.' --'.$productData->MODEL.'('.$productData->BRAND.')' ); // product title
							// $product->set_slug( 'medium-size-wizard-hat-in-new-york' );
							$product->set_sku($productData->MODEL);
							$product->set_regular_price( $productData->RRP ); // in current shop currency
							// $product->set_sale_price( $productData->PRICE ); // in current shop currency

							$product->set_short_description( $productData->DESCRIPTION);
							$product->set_description($productData->DESCRIPTION);
							
							// $thumb = media_sideload_image( $img_url.$productData->XIMAGE,'','thumbnail image','id');
							// if(empty($thumb->errors)){
							// 	$product->set_image_id($thumb);
							// }
							// else{
							// 	$thumb = media_sideload_image( $img_url.$productData->IMAGE,'','thumbnail image','id');
							// if(empty($thumb->errors)){
							// 	$product->set_image_id($thumb);
							// }
							// }
							// print_r($productData);
							// echo $img_url.$productData->image;
							// print_r( $thumb);
							
							$multi_imgs = [];
							// $MULTI = media_sideload_image( $img_url.$productData->XIMAGE2,'','gallary Image','id');
							// if(empty($thumb->errors)){
							// 	$multi_imgs[] = $MULTI;
							// }
							
							// $MULTI1 = media_sideload_image( $img_url.$productData->XIMAGE3,'','gallary Image','id');
							// if(empty($thumb->errors)){
							// 	$multi_imgs[] = $MULTI1;
							// }

							// $MULTI2 = media_sideload_image( $img_url.$productData->XIMAGE4,'','gallary Image','id');
							// if(empty($thumb->errors)){
							// 	$multi_imgs[] = $MULTI2;
							// }

							// $MULTI3 = media_sideload_image( $img_url.$productData->XIMAGE5,'','gallary Image','id');
							// if(empty($thumb->errors)){
							// 	$multi_imgs[] = $MULTI3;
							// }

							// if(count($multi_imgs)>0){
							// 	$product->set_gallery_image_ids($multi_imgs);
							// }
							

							$product->set_category_ids( array( $term_id ) );
							$product->set_weight($productData->WEIGHT);
							$product->save();

							$post_id = $product->get_id();
							// echo $post_id;
							wp_set_object_terms($post_id, array($productData->BRAND), 'product_tag');
							// $product->set_sale_price( $productData->PRICE ); // in current shop currency

							update_post_meta($post_id, '_custom_PRISE', esc_attr($productData->PRICE));
							update_post_meta($post_id, '_custom_PRIVATESTOCKPRICE', esc_attr($productData->PRIVATESTOCKPRICE));
							update_post_meta($post_id, '_custom_BRAND', esc_attr($productData->BRAND));
							update_post_meta($post_id, '_custom_MODEL', esc_attr($productData->MODEL));
							update_post_meta($post_id, '_custom_EAN', esc_attr($productData->EAN));
							update_post_meta($post_id, '_custom_LENGTH', esc_attr($productData->LENGTH));
							update_post_meta($post_id, '_custom_LUBETYPE', esc_attr($productData->LUBETYPE));
							update_post_meta($post_id, '_custom_CONDOMSAFE', esc_attr($productData->CONDOMSAFE));
							update_post_meta($post_id, '_custom_LIQUIDVOLUMN', esc_attr($productData->LIQUIDVOLUMN));
							update_post_meta($post_id, '_custom_NUMBEROFPILLS', esc_attr($productData->NUMBEROFPILLS));
							update_post_meta($post_id, '_custom_FASTENING', esc_attr($productData->FASTENING));
							update_post_meta($post_id, '_custom_WASHING', esc_attr($productData->WASHING));
							update_post_meta($post_id, '_custom_INSERTABLE', esc_attr($productData->INSERTABLE));
							update_post_meta($post_id, '_custom_DIAMETER', esc_attr($productData->DIAMETER));
							update_post_meta($post_id, '_custom_HARNESSCOMPATIBLE', esc_attr($productData->HARNESSCOMPATIBLE));
							update_post_meta($post_id, '_custom_ORINGCIRC', esc_attr($productData->ORINGCIRC));
							update_post_meta($post_id, '_custom_ORINGDIAM', esc_attr($productData->ORINGDIAM));
							update_post_meta($post_id, '_custom_CIRCUMFERENCE', esc_attr($productData->CIRCUMFERENCE));
							update_post_meta($post_id, '_custom_COLOUR', esc_attr($productData->COLOUR));
							update_post_meta($post_id, '_custom_FLEXIBILITY', esc_attr($productData->FLEXIBILITY));
							update_post_meta($post_id, '_custom_CONTROLLER', esc_attr($productData->CONTROLLER));
							update_post_meta($post_id, '_custom_FORWHO', esc_attr($productData->FORWHO));
							update_post_meta($post_id, '_custom_WHATISIT', esc_attr($productData->WHATISIT));
							update_post_meta($post_id, '_custom_MOTION', esc_attr($productData->MOTION));
							update_post_meta($post_id, '_custom_FEATURES', esc_attr($productData->FEATURES));
							// update_post_meta($post_id, '_custom_FOR', esc_attr($productData->FOR));
							update_post_meta($post_id, '_custom_MISC', esc_attr($productData->MISC));
							update_post_meta($post_id, '_custom_WATERPROOF', esc_attr($productData->WATERPROOF));
							update_post_meta($post_id, '_custom_MATERIAL', esc_attr($productData->MATERIAL));
							update_post_meta($post_id, '_custom_STYLE', esc_attr($productData->STYLE));
							update_post_meta($post_id, '_custom_POWER', esc_attr($productData->POWER));
							update_post_meta($post_id, '_custom_SIZE', esc_attr($productData->SIZE));
							update_post_meta($post_id, '_custom_OPENING', esc_attr($productData->OPENING));
							
							update_post_meta($post_id, '_custom_THUMBNAIL', $productData->IMAGE);
							update_post_meta($post_id, '_custom_gallary', json_encode(["$productData->XIMAGE2","$productData->XIMAGE3","$productData->XIMAGE4","$productData->XIMAGE5"]));


							echo $post_id,'<br>';
							if($ii>=10){

								echo 'import 10 successfull';
								die;
							}
							$ii++;
						}
						
					}
				echo 'import successfull';
				die;
    }
				
}







// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################



// add_action( 'init', 'bubblechaz_create_terms_on_submission' );


// function bubblechaz_create_terms_on_submission() {
// 	if(isset($_POST['submit_type']) && $_POST['submit_type']=='xtrade-csv' && !empty($_POST['xml_file'])){
// 		$fileText = @file_get_contents($_POST['xml_file']); 
// 			if ($fileText === false) {
// 				echo 'Data source file not found please provide the correct url.';
// 				die;
// 			}
// 		global $wpdb;
// 		$table = 'wp_options';
// 		$data = array('option_value'=>$_POST['xml_file']);
// 		$where = array('option_name'=>'x_trader_data_file');
// 		$wpdb->update( $table, $data, $where);
// 		echo 'File Uploaded Successfully';
// 			die;
			
// 	}
// }
// add_action( 'init', 'bubblechaz_create_terms_on_submission1' );
// function bubblechaz_create_terms_on_submission1() {
// 	if(isset($_GET['submit_type']) && $_GET['submit_type']=='xtrade-loop-data'){

// 		global $wpdb;
		
// 			$retrieve_data = $wpdb->get_row( "select * from wp_options where option_name ='x_trader_data_file'" );
// 			// try{

// 			// 	file_get_contents($retrieve_data->option_value);
// 			// }catch(Exception $e){
// 			// 	echo 'Message: ' .$e->getMessage();
// 			// }
// 			// $fileText = @file_get_contents($retrieve_data->option_value);
			

// 			// if ($_FILES['xml_file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['xml_file']['tmp_name'])) { //checks that file is uploaded
// 			// 	$fileText =  file_get_contents($_FILES['xml_file']['tmp_name']); 
// 			// 	$xml = simplexml_load_string($fileText, "SimpleXMLElement", LIBXML_NOCDATA);
// 				$fileText = @file_get_contents($retrieve_data->option_value); 
// 				if ($fileText === false) {
// 					echo 'Data source file not found please provide the correct url.';
// 					die;
// 				}
// 				// die();
	
// 				$xml = simplexml_load_string($fileText, "SimpleXMLElement", LIBXML_NOCDATA);
				
// 				foreach($xml->CREATED->CATEGORY as $category){
// 					$category_id =  $category->attributes()->id;
// 					$category_name =  $category->attributes()->name;
// 					$id= get_term_by('name',$category_name , 'product_cat'); //$parent_id is parent term id, in your case id of Lense
// 					if(empty($id))
// 					{
// 						$id = wp_insert_term($category_name,'product_cat');
// 					}
// 					$term_id =  $id->term_id;
// 					$ii = 0;
// 					foreach($category->PRODUCT as $key=>$productData ){
// 						$ena = $productData->EAN;
						
// 						$products = wc_get_products( array( 'sku' =>  "$ena") );
// 						reset( $products );
// 						if(count($products)<1){
// 							$img_url = 'https://www.xtrader.co.uk/nvimages/';
// 							$product = new WC_Product_Simple();
// 							$product->set_name( $productData->NAME.' --'.$productData->MODEL.'('.$productData->BRAND.')' ); // product title
// 							// $product->set_slug( 'medium-size-wizard-hat-in-new-york' );
// 							$product->set_sku( $productData->EAN );
// 							$product->set_regular_price( $productData->RRP ); // in current shop currency
// 							// $product->set_sale_price( $productData->PRICE ); // in current shop currency

// 							$product->set_short_description( $productData->DESCRIPTION);
// 							$product->set_description($productData->DESCRIPTION);
							
// 							$thumb = media_sideload_image( $img_url.$productData->XIMAGE,'','thumbnail image','id');
// 							if(empty($thumb->errors)){
// 								$product->set_image_id($thumb);
// 							}
// 							else{
// 								$thumb = media_sideload_image( $img_url.$productData->IMAGE,'','thumbnail image','id');
// 							if(empty($thumb->errors)){
// 								$product->set_image_id($thumb);
// 							}
// 							}
// 							// print_r($productData);
// 							// echo $img_url.$productData->image;
// 							// print_r( $thumb);
							
// 							$multi_imgs = [];
// 							$MULTI = media_sideload_image( $img_url.$productData->XIMAGE2,'','gallary Image','id');
// 							if(empty($thumb->errors)){
// 								$multi_imgs[] = $MULTI;
// 							}
							
// 							$MULTI1 = media_sideload_image( $img_url.$productData->XIMAGE3,'','gallary Image','id');
// 							if(empty($thumb->errors)){
// 								$multi_imgs[] = $MULTI1;
// 							}

// 							$MULTI2 = media_sideload_image( $img_url.$productData->XIMAGE4,'','gallary Image','id');
// 							if(empty($thumb->errors)){
// 								$multi_imgs[] = $MULTI2;
// 							}

// 							$MULTI3 = media_sideload_image( $img_url.$productData->XIMAGE5,'','gallary Image','id');
// 							if(empty($thumb->errors)){
// 								$multi_imgs[] = $MULTI3;
// 							}

// 							if(count($multi_imgs)>0){
// 								$product->set_gallery_image_ids($multi_imgs);
// 							}
							

// 							$product->set_category_ids( array( $term_id ) );
// 							$product->set_weight($productData->WEIGHT);
// 							$product->save();

// 							$post_id = $product->get_id();
// 							// echo $post_id;
// 							wp_set_object_terms($post_id, array($productData->BRAND), 'product_tag');
// 							// $product->set_sale_price( $productData->PRICE ); // in current shop currency

// 							update_post_meta($post_id, '_custom_PRISE', esc_attr($productData->PRICE));
// 							update_post_meta($post_id, '_custom_PRIVATESTOCKPRICE', esc_attr($productData->PRIVATESTOCKPRICE));
// 							update_post_meta($post_id, '_custom_BRAND', esc_attr($productData->BRAND));
// 							update_post_meta($post_id, '_custom_MODEL', esc_attr($productData->MODEL));
// 							update_post_meta($post_id, '_custom_EAN', esc_attr($productData->EAN));
// 							update_post_meta($post_id, '_custom_LENGTH', esc_attr($productData->LENGTH));
// 							update_post_meta($post_id, '_custom_LUBETYPE', esc_attr($productData->LUBETYPE));
// 							update_post_meta($post_id, '_custom_CONDOMSAFE', esc_attr($productData->CONDOMSAFE));
// 							update_post_meta($post_id, '_custom_LIQUIDVOLUMN', esc_attr($productData->LIQUIDVOLUMN));
// 							update_post_meta($post_id, '_custom_NUMBEROFPILLS', esc_attr($productData->NUMBEROFPILLS));
// 							update_post_meta($post_id, '_custom_FASTENING', esc_attr($productData->FASTENING));
// 							update_post_meta($post_id, '_custom_WASHING', esc_attr($productData->WASHING));
// 							update_post_meta($post_id, '_custom_INSERTABLE', esc_attr($productData->INSERTABLE));
// 							update_post_meta($post_id, '_custom_DIAMETER', esc_attr($productData->DIAMETER));
// 							update_post_meta($post_id, '_custom_HARNESSCOMPATIBLE', esc_attr($productData->HARNESSCOMPATIBLE));
// 							update_post_meta($post_id, '_custom_ORINGCIRC', esc_attr($productData->ORINGCIRC));
// 							update_post_meta($post_id, '_custom_ORINGDIAM', esc_attr($productData->ORINGDIAM));
// 							update_post_meta($post_id, '_custom_CIRCUMFERENCE', esc_attr($productData->CIRCUMFERENCE));
// 							update_post_meta($post_id, '_custom_COLOUR', esc_attr($productData->COLOUR));
// 							update_post_meta($post_id, '_custom_FLEXIBILITY', esc_attr($productData->FLEXIBILITY));
// 							update_post_meta($post_id, '_custom_CONTROLLER', esc_attr($productData->CONTROLLER));
// 							update_post_meta($post_id, '_custom_FORWHO', esc_attr($productData->FORWHO));
// 							update_post_meta($post_id, '_custom_WHATISIT', esc_attr($productData->WHATISIT));
// 							update_post_meta($post_id, '_custom_MOTION', esc_attr($productData->MOTION));
// 							update_post_meta($post_id, '_custom_FEATURES', esc_attr($productData->FEATURES));
// 							update_post_meta($post_id, '_custom_FOR', esc_attr($productData->FOR));
// 							update_post_meta($post_id, '_custom_MISC', esc_attr($productData->MISC));
// 							update_post_meta($post_id, '_custom_WATERPROOF', esc_attr($productData->WATERPROOF));
// 							update_post_meta($post_id, '_custom_MATERIAL', esc_attr($productData->MATERIAL));
// 							update_post_meta($post_id, '_custom_STYLE', esc_attr($productData->STYLE));
// 							update_post_meta($post_id, '_custom_POWER', esc_attr($productData->POWER));
// 							update_post_meta($post_id, '_custom_SIZE', esc_attr($productData->SIZE));
// 							update_post_meta($post_id, '_custom_OPENING', esc_attr($productData->OPENING));
// 							echo $post_id,'<br>';
// 							if($ii>=1){

// 								die;
// 							}
// 							$ii++;
// 						}
						
// 					}
// 				}
// 				die;
//     }
// 	if(isset($_GET['submit_type']) && $_GET['submit_type']=='xtrade-loop-data'){

// 		global $wpdb;
		
// 			$retrieve_data = $wpdb->get_row( "select * from wp_options where option_name ='x_trader_data_file'" );
// 				$fileText = @file_get_contents($retrieve_data->option_value); 
// 				if ($fileText === false) {
// 					echo 'Data source file not found please provide the correct url.';
// 					die;
// 				}
// 				$xml = simplexml_load_string($fileText, "SimpleXMLElement", LIBXML_NOCDATA);
// 				foreach($xml->CREATED->CATEGORY as $category){
// 					$category_id =  $category->attributes()->id;
// 					$category_name =  $category->attributes()->name;
// 					$id= get_term_by('name',$category_name , 'product_cat'); //$parent_id is parent term id, in your case id of Lense
// 					if(empty($id))
// 					{
// 						$id = wp_insert_term($category_name,'product_cat');
// 					}
// 					$term_id =  $id->term_id;
// 					$ii = 0;
// 					foreach($category->PRODUCT as $key=>$productData ){
// 						$ena = $productData->EAN;
						
// 						$products = wc_get_products( array( 'sku' =>  "$ena") );
// 						reset( $products );
// 						if(count($products)>0){
// 							$img_url = 'https://www.xtrader.co.uk/nvimages/';
// 							$product = $products; // new WC_Product_Simple();
// 							$product->set_name( $productData->NAME ); // product title
// 							// $product->set_slug( 'medium-size-wizard-hat-in-new-york' );
// 							// $product->set_sku( $productData->EAN );
// 							$product->set_regular_price( $productData->RRP ); // in current shop currency
// 							// $product->set_sale_price( $productData->PRICE ); // in current shop currency

// 							$product->set_short_description( $productData->DESCRIPTION);
// 							$product->set_description($productData->DESCRIPTION);
							
// 							// $thumb = media_sideload_image( $img_url.$productData->XIMAGE,'','thumbnail image','id');
// 							// if(empty($thumb->errors)){
// 							// 	$product->set_image_id($thumb);
// 							// }
// 							// else{
// 							// 	$thumb = media_sideload_image( $img_url.$productData->IMAGE,'','thumbnail image','id');
//                             //     if(empty($thumb->errors)){
//                             //         $product->set_image_id($thumb);
//                             //     }
// 							// }
							
// 							// $multi_imgs = [];
// 							// $MULTI = media_sideload_image( $img_url.$productData->XIMAGE2,'','gallary Image','id');
// 							// if(empty($thumb->errors)){
// 							// 	$multi_imgs[] = $MULTI;
// 							// }
							
// 							// $MULTI1 = media_sideload_image( $img_url.$productData->XIMAGE3,'','gallary Image','id');
// 							// if(empty($thumb->errors)){
// 							// 	$multi_imgs[] = $MULTI1;
// 							// }

// 							// $MULTI2 = media_sideload_image( $img_url.$productData->XIMAGE4,'','gallary Image','id');
// 							// if(empty($thumb->errors)){
// 							// 	$multi_imgs[] = $MULTI2;
// 							// }

// 							// $MULTI3 = media_sideload_image( $img_url.$productData->XIMAGE5,'','gallary Image','id');
// 							// if(empty($thumb->errors)){
// 							// 	$multi_imgs[] = $MULTI3;
// 							// }

// 							// if(count($multi_imgs)>0){
// 							// 	$product->set_gallery_image_ids($multi_imgs);
// 							// }
							

// 							// $product->set_category_ids( array( $term_id ) );
// 							$product->set_weight($productData->WEIGHT);
// 							$product->save();

// 							$post_id = $product->get_id();
// 							// echo $post_id;
// 							wp_set_object_terms($post_id, array($productData->BRAND), 'product_tag');
// 							// $product->set_sale_price( $productData->PRICE ); // in current shop currency

// 							update_post_meta($post_id, '_custom_PRISE', esc_attr($productData->PRICE));
// 							update_post_meta($post_id, '_custom_PRIVATESTOCKPRICE', esc_attr($productData->PRIVATESTOCKPRICE));
// 							update_post_meta($post_id, '_custom_BRAND', esc_attr($productData->BRAND));
// 							update_post_meta($post_id, '_custom_MODEL', esc_attr($productData->MODEL));
// 							update_post_meta($post_id, '_custom_EAN', esc_attr($productData->EAN));
// 							update_post_meta($post_id, '_custom_LENGTH', esc_attr($productData->LENGTH));
// 							update_post_meta($post_id, '_custom_LUBETYPE', esc_attr($productData->LUBETYPE));
// 							update_post_meta($post_id, '_custom_CONDOMSAFE', esc_attr($productData->CONDOMSAFE));
// 							update_post_meta($post_id, '_custom_LIQUIDVOLUMN', esc_attr($productData->LIQUIDVOLUMN));
// 							update_post_meta($post_id, '_custom_NUMBEROFPILLS', esc_attr($productData->NUMBEROFPILLS));
// 							update_post_meta($post_id, '_custom_FASTENING', esc_attr($productData->FASTENING));
// 							update_post_meta($post_id, '_custom_WASHING', esc_attr($productData->WASHING));
// 							update_post_meta($post_id, '_custom_INSERTABLE', esc_attr($productData->INSERTABLE));
// 							update_post_meta($post_id, '_custom_DIAMETER', esc_attr($productData->DIAMETER));
// 							update_post_meta($post_id, '_custom_HARNESSCOMPATIBLE', esc_attr($productData->HARNESSCOMPATIBLE));
// 							update_post_meta($post_id, '_custom_ORINGCIRC', esc_attr($productData->ORINGCIRC));
// 							update_post_meta($post_id, '_custom_ORINGDIAM', esc_attr($productData->ORINGDIAM));
// 							update_post_meta($post_id, '_custom_CIRCUMFERENCE', esc_attr($productData->CIRCUMFERENCE));
// 							update_post_meta($post_id, '_custom_COLOUR', esc_attr($productData->COLOUR));
// 							update_post_meta($post_id, '_custom_FLEXIBILITY', esc_attr($productData->FLEXIBILITY));
// 							update_post_meta($post_id, '_custom_CONTROLLER', esc_attr($productData->CONTROLLER));
// 							update_post_meta($post_id, '_custom_FORWHO', esc_attr($productData->FORWHO));
// 							update_post_meta($post_id, '_custom_WHATISIT', esc_attr($productData->WHATISIT));
// 							update_post_meta($post_id, '_custom_MOTION', esc_attr($productData->MOTION));
// 							update_post_meta($post_id, '_custom_FEATURES', esc_attr($productData->FEATURES));
// 							update_post_meta($post_id, '_custom_FOR', esc_attr($productData->FOR));
// 							update_post_meta($post_id, '_custom_MISC', esc_attr($productData->MISC));
// 							update_post_meta($post_id, '_custom_WATERPROOF', esc_attr($productData->WATERPROOF));
// 							update_post_meta($post_id, '_custom_MATERIAL', esc_attr($productData->MATERIAL));
// 							update_post_meta($post_id, '_custom_STYLE', esc_attr($productData->STYLE));
// 							update_post_meta($post_id, '_custom_POWER', esc_attr($productData->POWER));
// 							update_post_meta($post_id, '_custom_SIZE', esc_attr($productData->SIZE));
// 							update_post_meta($post_id, '_custom_OPENING', esc_attr($productData->OPENING));
// 							echo $post_id,'<br>';
// 							if($ii>=1){

// 								die;
// 							}
// 							$ii++;
// 						}
						
// 					}
// 				}
// 				die;
//     }
				
// }









// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################
// #################################################################################################################




// add_action('woocommerce_product_additional_information','add_pet_info' );
// function add_pet_info($product) {
// 	// global $product;

//      $metaData = get_post_meta( $product->get_id());
// 	// 	 $tblhtml = '<table>';
// 	// 		$tblhtml .= '<tr>';
// 	// 			$tblhtml .= '<th>';
// 	// 			$tblhtml .= 'BRAND';
// 	// 			$tblhtml .= '</th>';
// 	// 			$tblhtml .= '<td>';
// 	// 			$tblhtml .= $metaData['_custom_BRAND'][0]??'';
// 	// 			$tblhtml .= '</td>';

// 	// 			$tblhtml .= '<th>';
// 	// 			$tblhtml .= 'MODEL';
// 	// 			$tblhtml .= '</th>';
// 	// 			$tblhtml .= '<td>';
// 	// 			$tblhtml .= $metaData['_custom_MODEL'][0]??'';
// 	// 			$tblhtml .= '</td>';
// 	// 		$tblhtml .= '</tr>';
// 	// 	 $tblhtml .= '</table>';
// 	// echo $tblhtml;
// 	echo '<div style="font-size: 12px;">';
// 	// echo '<ul style="list-style: none;margin: 0; float:left">';
// 	echo '<table class="woocommerce-product-attributes shop_attributes"><tbody>';
// 	echo !empty($metaData['_custom_BRAND'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">BRAND </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_BRAND'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_MODEL'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">MODEL </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_MODEL'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_LENGTH'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">LENGTH </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_LENGTH'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_LUBETYPE'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">LUBETYPE </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_LUBETYPE'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_CONDOMSAFE'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">CONDOMSAFE </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_CONDOMSAFE'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_LIQUIDVOLUMN'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">LIQUIDVOLUMN </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_LIQUIDVOLUMN'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_NUMBEROFPILLS'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">NUMBEROFPILLS </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_NUMBEROFPILLS'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_FASTENING'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">FASTENING </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_FASTENING'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_WASHING'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">WASHING </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_WASHING'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_INSERTABLE'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">INSERTABLE </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_INSERTABLE'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_DIAMETER'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">DIAMETER </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_DIAMETER'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_HARNESSCOMPATIBLE'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">HARNESSCOMPATIBLE </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_HARNESSCOMPATIBLE'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_ORINGCIRC'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">ORINGCIRC </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_ORINGCIRC'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_ORINGDIAM'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">ORINGDIAM </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_ORINGDIAM'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_CIRCUMFERENCE'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">CIRCUMFERENCE </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_CIRCUMFERENCE'][0].'</td></tr>':'';
// 	// echo '</td>';
// 	// echo '<td style="border:none">';
// 	// echo '<ul style="list-style: none;margin: 0;float:right;" >';
// 	// echo '</ul>';
// 	// echo '<ul style="list-style: none;margin: 0;float:right;" >';
// 	echo !empty($metaData['_custom_COLOUR'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">COLOUR </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_COLOUR'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_FLEXIBILITY'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">FLEXIBILITY </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_FLEXIBILITY'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_CONTROLLER'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">CONTROLLER </th><td class="woocommerce-product-attributes-item__value"> '.$metaData['_custom_CONTROLLER'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_FORWHO'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">FORWHO </th><td class="woocommerce-product-attributes-item__value"> '.$metaData['_custom_FORWHO'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_WHATISIT'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">WHATISIT </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_WHATISIT'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_MOTION'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">MOTION </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_MOTION'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_FEATURES'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">FEATURES</th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_FEATURES'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_FOR'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">FOR </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_FOR'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_MISC'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">MISC </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_MISC'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_WATERPROOF'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">WATERPROOF </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_WATERPROOF'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_MATERIAL'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">MATERIAL </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_MATERIAL'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_STYLE'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">STYLE </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_STYLE'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_POWER'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">POWER </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_POWER'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_SIZE'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">SIZE</th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_SIZE'][0].'</td></tr>':'';
// 	echo !empty($metaData['_custom_OPENING'][0])?'<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">OPENING </th><td class="woocommerce-product-attributes-item__value">'.$metaData['_custom_OPENING'][0].'</td></tr>':'';

// 	echo '</tr></tbody></table>';
// 	// echo '</ul>';

// 	echo '</div>';



// 	// <table class="woocommerce-product-attributes shop_attributes">
// 	// 	<tbody><tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">
// 	// 	<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight"><th class="woocommerce-product-attributes-item__label">Weight</th>
// 	// 	<td class="woocommerce-product-attributes-item__value">0.33 kg</td>
// 	// </tr>
// 	// </tbody></table>








// }


// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');

// Save Fields
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');


function woocommerce_product_custom_fields()
{
    global $woocommerce, $post;
    echo '<div class="product_custom_field">';
    // Custom Product Text Field
   
    //Custom Product Number Field
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_PRICE',
            'placeholder' => 'Stock Peice',
            'label' => __('Stock Peice', 'woocommerce'),
            'type' => 'number',
            'custom_attributes' => array(
                'step' => 'any',
                'min' => '0'
            )
        )
    );
    woocommerce_wp_text_input(
        array(
            'id' => '_custom_PRIVATESTOCKPRICE',
            'placeholder' => 'Private Stock Peice',
            'label' => __('Private Stock Peice', 'woocommerce'),
            'type' => 'number',
            'custom_attributes' => array(
                'step' => 'any',
                'min' => '0'
            )
        )
    );

	woocommerce_wp_text_input(
        array(
            'id' => '_custom_BRAND',
            'placeholder' => 'BRAND',
            'label' => __('BRAND', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );

	woocommerce_wp_text_input(
        array(
            'id' => '_custom_MODEL',
            'placeholder' => 'MODEL',
            'label' => __('MODEL', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_EAN',
            'placeholder' => 'ENA',
            'label' => __('ENA', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_LENGTH',
            'placeholder' => 'LENGTH',
            'label' => __('LENGTH', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_LUBETYPE',
            'placeholder' => 'LUBETYPE',
            'label' => __('LUBETYPE', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_CONDOMSAFE',
            'placeholder' => 'CONDOMSAFE',
            'label' => __('CONDOMSAFE', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_LIQUIDVOLUMN',
            'placeholder' => 'LIQUIDVOLUMN',
            'label' => __('LIQUIDVOLUMN', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_NUMBEROFPILLS',
            'placeholder' => 'NUMBEROFPILLS',
            'label' => __('NUMBEROFPILLS', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );

	woocommerce_wp_text_input(
        array(
            'id' => '_custom_FASTENING',
            'placeholder' => 'FASTENING',
            'label' => __('FASTENING', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_WASHING',
            'placeholder' => 'WASHING',
            'label' => __('WASHING', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_INSERTABLE',
            'placeholder' => 'INSERTABLE',
            'label' => __('INSERTABLE', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_DIAMETER',
            'placeholder' => 'DIAMETER',
            'label' => __('DIAMETER', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_HARNESSCOMPATIBLE',
            'placeholder' => 'HARNESSCOMPATIBLE',
            'label' => __('HARNESSCOMPATIBLE', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_ORINGCIRC',
            'placeholder' => 'ORINGCIRC',
            'label' => __('ORINGCIRC', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_ORINGDIAM',
            'placeholder' => 'ORINGDIAM',
            'label' => __('ORINGDIAM', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_CIRCUMFERENCE',
            'placeholder' => 'CIRCUMFERENCE',
            'label' => __('CIRCUMFERENCE', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_COLOUR',
            'placeholder' => 'COLOUR',
            'label' => __('COLOUR', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_FLEXIBILITY',
            'placeholder' => 'FLEXIBILITY',
            'label' => __('FLEXIBILITY', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_CONTROLLER',
            'placeholder' => 'CONTROLLER',
            'label' => __('CONTROLLER', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_FORWHO',
            'placeholder' => 'FORWHO',
            'label' => __('FORWHO', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_WHATISIT',
            'placeholder' => 'WHATISIT',
            'label' => __('WHATISIT', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_FOR',
            'placeholder' => 'FOR',
            'label' => __('FOR', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_MOTION',
            'placeholder' => 'MOTION',
            'label' => __('MOTION', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_FEATURES',
            'placeholder' => 'FEATURES',
            'label' => __('FEATURES', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_MISC',
            'placeholder' => 'MISC',
            'label' => __('MISC', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_WATERPROOF',
            'placeholder' => 'WATERPROOF',
            'label' => __('WATERPROOF', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_MATERIAL',
            'placeholder' => 'MATERIAL',
            'label' => __('MATERIAL', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	
	
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_STYLE',
            'placeholder' => 'STYLE',
            'label' => __('STYLE', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_POWER',
            'placeholder' => 'POWER',
            'label' => __('POWER', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_SIZE',
            'placeholder' => 'SIZE',
            'label' => __('SIZE', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
	woocommerce_wp_text_input(
        array(
            'id' => '_custom_OPENING',
            'placeholder' => 'OPENING',
            'label' => __('OPENING', 'woocommerce'),
            'desc_tip' => 'true'
        )
    );
    echo '</div>';

}

function woocommerce_product_custom_fields_save($post_id)
{
    // Custom Product Text Field
    $_custom_PRICE = $_POST['_custom_PRICE'];
    if (!empty($_custom_PRICE))
        update_post_meta($post_id, '_custom_PRICE', esc_attr($_custom_PRICE));

    $_custom_PRIVATESTOCKPRICE = $_POST['_custom_PRIVATESTOCKPRICE'];
    if (!empty($_custom_PRIVATESTOCKPRICE))
        update_post_meta($post_id, '_custom_PRIVATESTOCKPRICE', esc_attr($_custom_PRIVATESTOCKPRICE));
// Custom Product Number Field
    $_custom_BRAND = $_POST['_custom_BRAND'];
    if (!empty($_custom_BRAND))
        update_post_meta($post_id, '_custom_BRAND', esc_attr($_custom_BRAND));

    $_custom_MODEL = $_POST['_custom_MODEL'];
    if (!empty($_custom_MODEL))
        update_post_meta($post_id, '_custom_MODEL', esc_attr($_custom_MODEL));

    $_custom_EAN = $_POST['_custom_EAN'];
    if (!empty($_custom_EAN))
        update_post_meta($post_id, '_custom_EAN', esc_attr($_custom_EAN));

    $_custom_LENGTH = $_POST['_custom_LENGTH'];
    if (!empty($_custom_LENGTH))
        update_post_meta($post_id, '_custom_LENGTH', esc_attr($_custom_LENGTH));

    $_custom_LUBETYPE = $_POST['_custom_LUBETYPE'];
    if (!empty($_custom_LUBETYPE))
        update_post_meta($post_id, '_custom_LUBETYPE', esc_attr($_custom_LUBETYPE));

    $_custom_CONDOMSAFE = $_POST['_custom_CONDOMSAFE'];
    if (!empty($_custom_CONDOMSAFE))
        update_post_meta($post_id, '_custom_CONDOMSAFE', esc_attr($_custom_CONDOMSAFE));

    $_custom_LIQUIDVOLUMN = $_POST['_custom_LIQUIDVOLUMN'];
    if (!empty($_custom_LIQUIDVOLUMN))
        update_post_meta($post_id, '_custom_LIQUIDVOLUMN', esc_attr($_custom_LIQUIDVOLUMN));

    $_custom_NUMBEROFPILLS = $_POST['_custom_NUMBEROFPILLS'];
    if (!empty($_custom_NUMBEROFPILLS))
        update_post_meta($post_id, '_custom_NUMBEROFPILLS', esc_attr($_custom_NUMBEROFPILLS));

    $_custom_FASTENING = $_POST['_custom_FASTENING'];
    if (!empty($_custom_FASTENING))
        update_post_meta($post_id, '_custom_FASTENING', esc_attr($_custom_FASTENING));

    $_custom_WASHING = $_POST['_custom_WASHING'];
    if (!empty($_custom_WASHING))
        update_post_meta($post_id, '_custom_WASHING', esc_attr($_custom_WASHING));


    $_custom_INSERTABLE = $_POST['_custom_INSERTABLE'];
    if (!empty($_custom_INSERTABLE))
        update_post_meta($post_id, '_custom_INSERTABLE', esc_attr($_custom_INSERTABLE));

    $_custom_DIAMETER = $_POST['_custom_DIAMETER'];
    if (!empty($_custom_DIAMETER))
        update_post_meta($post_id, '_custom_DIAMETER', esc_attr($_custom_DIAMETER));

    $_custom_HARNESSCOMPATIBLE = $_POST['_custom_HARNESSCOMPATIBLE'];
    if (!empty($_custom_HARNESSCOMPATIBLE))
        update_post_meta($post_id, '_custom_HARNESSCOMPATIBLE', esc_attr($_custom_HARNESSCOMPATIBLE));

    $_custom_ORINGCIRC = $_POST['_custom_ORINGCIRC'];
    if (!empty($_custom_ORINGCIRC))
        update_post_meta($post_id, '_custom_ORINGCIRC', esc_attr($_custom_ORINGCIRC));

    $_custom_ORINGDIAM = $_POST['_custom_ORINGDIAM'];
    if (!empty($_custom_ORINGDIAM))
        update_post_meta($post_id, '_custom_ORINGDIAM', esc_attr($_custom_ORINGDIAM));


    $_custom_CIRCUMFERENCE = $_POST['_custom_CIRCUMFERENCE'];
    if (!empty($_custom_CIRCUMFERENCE))
        update_post_meta($post_id, '_custom_CIRCUMFERENCE', esc_attr($_custom_CIRCUMFERENCE));

    $_custom_COLOUR = $_POST['_custom_COLOUR'];
    if (!empty($_custom_COLOUR))
        update_post_meta($post_id, '_custom_COLOUR', esc_attr($_custom_COLOUR));

    $_custom_FLEXIBILITY = $_POST['_custom_FLEXIBILITY'];
    if (!empty($_custom_FLEXIBILITY))
        update_post_meta($post_id, '_custom_FLEXIBILITY', esc_attr($_custom_FLEXIBILITY));

    $_custom_CONTROLLER = $_POST['_custom_CONTROLLER'];
    if (!empty($_custom_CONTROLLER))
        update_post_meta($post_id, '_custom_CONTROLLER', esc_attr($_custom_CONTROLLER));

    $_custom_FORWHO = $_POST['_custom_FORWHO'];
    if (!empty($_custom_FORWHO))
        update_post_meta($post_id, '_custom_FORWHO', esc_attr($_custom_FORWHO));

    $_custom_WHATISIT = $_POST['_custom_WHATISIT'];
    if (!empty($_custom_WHATISIT))
        update_post_meta($post_id, '_custom_WHATISIT', esc_attr($_custom_WHATISIT));

    $_custom_MOTION = $_POST['_custom_MOTION'];
    if (!empty($_custom_MOTION))
        update_post_meta($post_id, '_custom_MOTION', esc_attr($_custom_MOTION));

    $_custom_FEATURES = $_POST['_custom_FEATURES'];
    if (!empty($_custom_FEATURES))
        update_post_meta($post_id, '_custom_FEATURES', esc_attr($_custom_FEATURES));

    $_custom_FOR = $_POST['_custom_FOR'];
    if (!empty($_custom_FOR))
        update_post_meta($post_id, '_custom_FOR', esc_attr($_custom_FOR));

    $_custom_MISC = $_POST['_custom_MISC'];
    if (!empty($_custom_MISC))
        update_post_meta($post_id, '_custom_MISC', esc_attr($_custom_MISC));

    $_custom_WATERPROOF = $_POST['_custom_WATERPROOF'];
    if (!empty($_custom_WATERPROOF))
        update_post_meta($post_id, '_custom_WATERPROOF', esc_attr($_custom_WATERPROOF));

    $_custom_MATERIAL = $_POST['_custom_MATERIAL'];
    if (!empty($_custom_MATERIAL))
        update_post_meta($post_id, '_custom_MATERIAL', esc_attr($_custom_MATERIAL));

    $_custom_STYLE = $_POST['_custom_STYLE'];
    if (!empty($_custom_STYLE))
        update_post_meta($post_id, '_custom_STYLE', esc_attr($_custom_STYLE));

    $_custom_POWER = $_POST['_custom_POWER'];
    if (!empty($_custom_POWER))
        update_post_meta($post_id, '_custom_POWER', esc_attr($_custom_POWER));

    $_custom_SIZE = $_POST['_custom_SIZE'];
    if (!empty($_custom_SIZE))
        update_post_meta($post_id, '_custom_SIZE', esc_attr($_custom_SIZE));

    $_custom_OPENING = $_POST['_custom_OPENING'];
    if (!empty($_custom_OPENING))
        update_post_meta($post_id, '_custom_OPENING', esc_attr($_custom_OPENING));

}

// admin page for data import

function my_admin_menu() {
	$my_page =  add_menu_page(
		__( 'Improt Data XTrader', 'import-xtrader-data' ),
		__( 'Import Data', 'import-xtrader-data' ),
		'manage_options',
		'import-xtrader-data',
		'data_import_tool_content',
		'dashicons-cloud-upload',
		75
	);
	add_action( 'load-' . $my_page, 'load_admin_js' );

}

add_action( 'admin_menu', 'my_admin_menu' );


function data_import_tool_content() {
	global $wpdb;
		
			$retrieve_data = $wpdb->get_row( "select * from wp_options where option_name ='x_trader_data_file'" );
	?>
		<h1>
			<?php esc_html_e( 'Import your data with Xtraders XML File', 'my-plugin-textdomain' ); ?>
		</h1>

		<form method="post" name="createuser" id="xtrader-data-import-form" enctype="multipart/form-data" class="validate"  novalidate="novalidate" >
			<table class="form-table" role="presentation">
				<tbody>
					<tr class="form-field">
						<th scope="row"><label for="last_name">Select XML file To Import data </label></th>
						<td>
							<input name="xml_file" type="text" id="last_name" value="<?php echo $retrieve_data->option_value; ?>" >
							<input name="submit_type" type="hidden" id="last_name" value="xtrade-csv" >
						</td>
					</tr>
		
				</tbody>
			</table>

			<p class="submit"><input type="submit" name="createuser" id="createusersub" class="button button-primary" value="Import Data" fdprocessedid="35xmpa"></p>
		</form>
	<?php
}

// This function is only called when our plugin's page loads!
function load_admin_js(){
	// Unfortunately we can't just enqueue our scripts here - it's too early. So register against the proper action hook to do it
	add_action( 'admin_enqueue_scripts', 'enqueue_admin_js' );
}

function enqueue_admin_js(){
	// Isn't it nice to use dependencies and the already registered core js files?
	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/assets/js/my_script.js', array( 'jquery-ui-core', 'jquery-ui-tabs' ) );
}
