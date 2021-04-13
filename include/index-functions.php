<?php
/**
 * Функции и хуки для главной страницы
 */

 /**
 * Блок слайдер (произвольные типы записей)
 */


function myshop_main_slider(){
	$labels = array(
		'name'               => 'Слайдер', 
		'singular_name'      => 'Успех', 
		'add_new'            => 'Добавить новую',
		'add_new_item'       => 'Добавить новый слайдер',
		'edit_item'          => 'Редактировать слайдер',
		'new_item'           => 'Новый слайдер',
		'view_item'          => 'Посмотреть слайдер',
		'search_items'       => 'Найти слайдер',
		'not_found'          => 'Слайдеров не найдено',
		'not_found_in_trash' => 'В корзине слайдеров не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Слайдеры'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true,  
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-format-gallery', 
		'menu_position' => 20, 
		'supports' => array( 'title', 'editor', 'thumbnail')
	);	
	register_post_type('successes', $args  );
}

add_action('init', 'myshop_main_slider');