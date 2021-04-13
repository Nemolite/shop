<?php
/**
 * Функции для хидера
 * 
 */


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
add_action( 'myshop_primary_top_menu', 'primary_top_menu', 10 );  

/**
 * Логотип в header
 */
function myshop_site_branding() {
  if ( storefront_is_woocommerce_activated() ) {
    if ( is_cart() ) {
      $class = 'current-menu-item';
    } else {
      $class = '';
    }
    ?>

<div class="site-branding">
			<?php storefront_site_title_or_logo(); ?>
		</div>

  <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="<?php echo get_home_url(); ?>">e<span>Electronics</span></a></h1>
                    </div>
                </div>


    <?php
  }
}

add_action( 'myshop_header', 'myshop_site_branding', 20 ); 

/**
 * Корзина в header
 */
function myshop_header_cart() {
  if ( storefront_is_woocommerce_activated() ) {
    if ( is_cart() ) {
      $class = 'current-menu-item';
    } else {
      $class = '';
    }
    ?>

  <ul id="site-header-cart" class="site-header-cart menu">
    <li class="<?php echo esc_attr( $class ); ?>">
      <?php storefront_cart_link(); ?>
    </li>
    <li>
      <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
    </li>
  </ul>

  <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt">$800</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->


    <?php
  }
}

add_action( 'myshop_header', 'myshop_header_cart', 60 ); 

?>

