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

?>

