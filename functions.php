<?php 
/**
 * Функции, хуки для дочерней темы
 * 
 */
?>
<?php

if ( ! function_exists( 'storefront_is_woocommerce_activated' ) ) {
	/**
	 * Тестовый вывод данных
	 */
	function test_function_show() {
		echo "test";
	}
}
add_action( 'woocommerce_before_main_content','test_function_show',30 );
?>