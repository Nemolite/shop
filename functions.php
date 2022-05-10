<?php 
/**
 * Основной файл для дочерней темы.
 * Структура и подключение файлов 
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Подключение файлов стилей  для дочерней темы
 */
function myshop_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );


	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css', array(), $theme_version );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css', array(), $theme_version );
	wp_enqueue_style( 'owl-carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.css', array(), $theme_version );
	wp_enqueue_style( 'responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array(), $theme_version );
	wp_enqueue_style( 'mystyle', get_stylesheet_directory_uri() . '/assets/css/mystyle.css', array(), $theme_version );

}

add_action( 'wp_enqueue_scripts', 'myshop_register_styles' );

function del_styles_method() {	
    wp_dequeue_style( 'storefront-icons' );
    wp_deregister_style( 'storefront-icons' );
    wp_enqueue_style( 'storefront-icons', get_stylesheet_directory_uri() . '/assets/css/icons.css' );
}

add_action( 'wp_enqueue_scripts', 'del_styles_method', 0 );

/**
 * Подключение скриптов для дочерней темы
 */
function myshop_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );
	
	wp_enqueue_script( 'bootstrap-min-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array(), $theme_version, true );
	wp_enqueue_script( 'owl-carousel-js', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array(), $theme_version, true );
	wp_enqueue_script( 'sticky-js', get_stylesheet_directory_uri() . '/assets/js/jquery.sticky.js', array(), $theme_version, true );
	wp_enqueue_script( 'easing-js', get_stylesheet_directory_uri() . '/assets/js/jquery.easing.1.3.min.js', array(), $theme_version, true );
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array(), $theme_version, true );
	wp_enqueue_script( 'myscript-js', get_stylesheet_directory_uri() . '/assets/js/myscript.js', array(), $theme_version, true );

	

}

add_action( 'wp_enqueue_scripts', 'myshop_register_scripts' );

/**
 * Подключение файла функции и хуков для header
 */
require 'include/header-functions.php';

/**
 * Подключение файл функции и хуков для главной страницы
 */
require 'include/index-functions.php';
?>