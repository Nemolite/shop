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

register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Главное меню' ),
    'top_left' => __( 'Top Left Menu', 'Левое верхнее меню' ),
) );

?>

