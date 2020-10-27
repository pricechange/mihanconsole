<?php

/** 
* Plugin Name: pricechange
* Plugin URI: https://mihanconsole.ir/docs/pricechange
* Description: با استفاده از این افزونه قیمت "0 تومان" را به کلمه رایگان تغییر دهید!
* Author: MihanConsole
* Author URI: https://mihanconsole.ir/
* Version: 1.0
* License: GPLv3
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
* Text Domain: pricechange
**/ 

define( 'CP_DIR', plugin_dir_path(__FILE__) );
define( 'CP_URL', plugin_dir_url(__FILE__));



// wordpress widget

function pricechange_widget() {
	wp_add_dashboard_widget(
		'Update_notice_pricechange',
		'میهن آموزش',
		'Update_notice'
	);
}
add_action( 'wp_dashboard_setup', 'pricechange_widget' );

function Update_notice() {
	echo "اطلاعیه های آپدیت های افزونه را می توانید از طریق وب سایت میهن آموزش دریافت کنید!";
}


// Price change functions for WooCommerce plugin

add_filter( 'woocommerce_get_price_html', 'pricechange', 100, 2 );

function pricechange( $price, $product ){

if ( '' === $product->get_price() || 0 == $product->get_price() ) {
$price = 'رایگان';
}
return $price;
}