<?php 
/**
 * Функции, хуки для дочерней темы
 * 
 */
?>
<?php

if ( ! function_exists( 'test_function_show' ) ) {
	/**
	 * Тестовый вывод данных
	 */
	function test_function_show() {
		echo "test";
	}
}
add_action( 'woocommerce_before_main_content','test_function_show',30 );

if ( ! function_exists( 'test_2_function_show' ) ) {
	/**
	 * Тестовый вывод данных
	 */
	function test_2_function_show() {
		echo "test info";
	}
}
add_action( 'woocommerce_before_add_to_cart_form','test_2_function_show', 70 );


if ( ! function_exists( 'test_3_function_show' ) ) {
	/**
	 * Начало блока
	 */
	function test_3_function_show() {
		?>
        <div class="test3">
        <?php
	}
}
add_action( 'woocommerce_before_add_to_cart_button','test_3_function_show', 70 );

if ( ! function_exists( 'test_4_function_show' ) ) {
	/**
	 * Конец блока
	 */
	function test_4_function_show() {
		?>
        </div>
        <?php
	}
}
add_action( 'woocommerce_after_add_to_cart_button','test_4_function_show', 70 );







?>




