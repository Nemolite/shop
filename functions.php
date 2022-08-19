<?php
/**
 * shop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shop
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shop_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on shop, use a find and replace
		* to change 'shop' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'shop', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'shop' ),
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
			'shop_custom_background_args',
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
add_action( 'after_setup_theme', 'shop_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shop_content_width', 640 );
}
add_action( 'after_setup_theme', 'shop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shop_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shop' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shop_scripts() {
	wp_enqueue_style( 'shop-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'owl-carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.css', array(), _S_VERSION );
	wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array(), _S_VERSION );
	wp_enqueue_style( 'mystyle', get_stylesheet_directory_uri() . '/assets/css/mystyle.css', array(), _S_VERSION );
	wp_style_add_data( 'shop-style', 'rtl', 'replace' );

	wp_enqueue_script( 'shop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-min-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'owl-carousel-js', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sticky-js', get_stylesheet_directory_uri() . '/assets/js/jquery.sticky.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'easing-js', get_stylesheet_directory_uri() . '/assets/js/jquery.easing.1.3.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'myscript-js', get_stylesheet_directory_uri() . '/assets/js/myscript.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shop_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


 /**
  * Подключение главного меню в хидере (бутстрап)
  */
  function register_navwalker(){
	require_once 'class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

/**
 * Регистрируем варианты меню
 */
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Главное меню' ),
    'top_left' => __( 'Top Left Menu', 'Левое верхнее меню' ),
    'top_right'=>__('Top Right Menu','Правое верхнее меню' ),
	'footer_category'=>__('Footer Category Menu','Меню категории в футере' ),
	'user_navigation'=>__('Footer User Menu','Меню в футере user' ),
) );

 /**
  * Вывод верхнего левого меню
  */
  function top_left_menu(){
    wp_nav_menu( [
      'theme_location'  => 'top_left',
      'menu'            => '', 
      'container'       => 'div', 
      'container_class' => 'user-menu', 
      'container_id'    => '',
      'menu_class'      => 'menu', 
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '<i class="fa fa-user"></i>',
      'link_after'      => '',
      'items_wrap'      => '<ul>%3$s</ul>',
      'depth'           => 0,
      'walker'          => '',
    ] );

  }
add_action( 'myshop_top_left_menu', 'top_left_menu', 10 );

/**
* Вывод главного меню
*/

   function primary_top_menu(){
wp_nav_menu( array(
      'theme_location'    => 'primary',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse',
      'container_id'      => 'bs-example-navbar-collapse-1',
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
      'walker'            => new WP_Bootstrap_Navwalker(),
  ) );
}

/**
 * Option Tree
 */
/**
 * Required: set 'ot_theme_mode' filter to true.
 */
//add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
require( trailingslashit( get_template_directory() ) . '/option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . '/option-tree/assets/theme-mode/meta-boxes.php' );
require( trailingslashit( get_template_directory() ) . '/option-tree/assets/theme-mode/theme-options.php' );

/**
 * woocommerce
 */

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 ); 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 ); 
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action('woocommerce_before_shop_loop_item_title','shop_woocommerce_template_loop_product_thumbnail',10);

if ( ! function_exists( 'shop_woocommerce_template_loop_product_thumbnail' ) ) {
	function shop_woocommerce_template_loop_product_thumbnail(){
		?>
		 <div class="product-upper">
		<?php
		echo the_post_thumbnail();
		?>
		</div>
		<?php
	}
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 ); 

add_action('woocommerce_shop_loop_item_title','shop_woocommerce_template_loop_product_title',10);

if ( ! function_exists( 'shop_woocommerce_template_loop_product_title' ) ) {
	function shop_woocommerce_template_loop_product_title(){
		?>
		<h2 class="shop-title-product-color">
			
				<?php the_title();?>
			
		</h2>
		<?php
	}
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action('woocommerce_after_shop_loop_item_title','shop_woocommerce_template_loop_price',10);

if ( ! function_exists( 'shop_woocommerce_template_loop_price' ) ) {
	function shop_woocommerce_template_loop_price(){
		?>
		<div class="product-carousel-price">
			<ins>
				<?php
					$product = wc_get_product(get_the_ID());
					$thePrice = $product->get_price(); 
					echo $thePrice;
					echo " ";
					$currency_symbol = html_entity_decode( get_woocommerce_currency_symbol() );
					echo $currency_symbol;
				?>
			</ins> 
			<del>
				<?php
					echo $product->get_price();
					echo " ";
					echo $currency_symbol;
				?>
										
			</del>
        </div> 
		<?php
	}
}

/**
 * content-single-product.php
 */

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 ); 
add_action('woocommerce_before_single_product_summary','woocommerce_breadcrumb',5);
add_action('shop_wc_single_product_breadcroumb','woocommerce_breadcrumb',10);
add_action('shop_wc_single_product_img','woocommerce_show_product_images',10);

/**
 * Для вывода галереии миниатюры в content-single-product.php
 */


add_action('shop_woocommerce_product_thumbnails','shop_woocommerce_product_thumbnails_html',10);
if ( ! function_exists( 'shop_woocommerce_product_thumbnails_html' ) ) {

	/**
	 * Output the product thumbnails.
	 */
	function shop_woocommerce_product_thumbnails_html() {
				
        global $product;

		function shop_wc_get_gallery_image_html( $attachment_id, $main_image = false ) {
			$flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
			$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
			$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
			$image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
			$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
			$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
			$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
			$alt_text          = trim( wp_strip_all_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
			$image             = wp_get_attachment_image(
				$attachment_id,
				$image_size,
				false,
				apply_filters(
					'woocommerce_gallery_image_html_attachment_image_params',
					array(
						'title'                   => _wp_specialchars( get_post_field( 'post_title', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
						'data-caption'            => _wp_specialchars( get_post_field( 'post_excerpt', $attachment_id ), ENT_QUOTES, 'UTF-8', true ),
						'data-src'                => esc_url( $full_src[0] ),
						'data-large_image'        => esc_url( $full_src[0] ),
						'data-large_image_width'  => esc_attr( $full_src[1] ),
						'data-large_image_height' => esc_attr( $full_src[2] ),
						'class'                   => esc_attr( $main_image ? 'wp-post-image' : '' ),
					),
					$attachment_id,
					$image_size,
					$main_image
				)
			);
		/** Добавлены классы */
			return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" data-thumb-alt="' . esc_attr( $alt_text ) . '" class="woocommerce-product-gallery__image product-gallery col-md-3">' . $image . '</div>';
		}
		

		$attachment_ids = $product->get_gallery_image_ids();

		if ( $attachment_ids && $product->get_image_id() ) {
			foreach ( $attachment_ids as $attachment_id ) {
				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', shop_wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
			}
		}

	}
}


add_action('shop_wc_single_product_title','woocommerce_template_single_title',10);


/**
 * Цена товара, Добавить в корзину, Мета, 
 */
add_action('shop_wc_single_product_summary','shop_woocommerce_template_loop_price',10);
add_action('shop_wc_single_product_summary','woocommerce_template_single_add_to_cart',20);
add_action('shop_wc_single_product_summary','woocommerce_template_single_meta',30);

/**
 * Описание товара
 */
add_action('shop_wc_single_product_description','woocommerce_template_single_excerpt',10);

/**
 * Рейтинг
 */
add_action('shop_wc_single_product_rating','woocommerce_template_single_rating',10);

/**
 * Изменение количество выводимых товаров
 * Сейчас выводится 8
 */

 /**
  * WC: change products per page
  * @return int
  */
function shop_loop_per_page() {
	if (is_shop()){
		return 8; //return any number, -1 === show all
	} else {
		return -1;
	}
    
};
add_filter('loop_shop_per_page', 'shop_loop_per_page', 10, 0);

/**
 * Регистрируем новый размер изображения
 * false - обрезка с сохранением пропорции
 */
add_image_size( 'sidebar-image-single-product', 63, 57, false );

/**
 * Cart
 */
add_action('woocommerce_before_cart','shop_woocommerce_before_cart_html',10);
function shop_woocommerce_before_cart_html(){
	?>
	<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
	<?php
}

add_action('woocommerce_after_cart','shop_woocommerce_after_cart_html',10);
function shop_woocommerce_after_cart_html(){
	?>
			</div><!-- class="row" -->
		</div><!-- class="container" -->
	</div><!-- class="single-product-area" -->
	<?php
}

/**
 * Перемещанем кнопку перейти к оформлению в cart
 */
//remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 ); 
//add_action('woocommerce_cart_actions','woocommerce_cart_totals',10);