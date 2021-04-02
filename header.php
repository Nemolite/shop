<?php
/**
 * The header для дочерней темы storefront
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package myshop
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'storefront_before_header' ); ?>
   
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   
    <?php 
    /**
	 * Hook: myshop_top_left_menu.
	 *
	 * @hooked top_left_menu - 10	
	 */
	do_action('myshop_top_left_menu');
    ?> 
                </div>
          
                <div class="col-md-4">


                    



   












                    <div class="header-right">

                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <div class="header-right">
                    <?php 
    /**
	 * Hook: myshop_top_right_menu.
	 *
	 * @hooked top_right_menu - 10	
	 */
	do_action('myshop_top_right_menu');
    ?>
                    <?php 
    /**
	 * Hook: myshop_top_right_menu.
	 *
	 * @hooked top_right_menu - 10	
	 */
	do_action('myshop_top_right_menu');
    ?>
                    </div>

                
 

                </div>
            </div>
        </div>
    </div> <!-- End header area -->
	<div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="<?php echo get_home_url(); ?>">e<span>Electronics</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt">$800</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->

	<div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
	<?php
    /**
	 * Hook: myshop_primary_top_menu.
	 *
	 * @hooked primary_top_menu - 10	
	 */
	do_action('myshop_primary_top_menu');
       
        ?> 
            </div>
        </div>
    </div> <!-- End mainmenu area -->   

	<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'storefront_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">
		<?php
		do_action( 'storefront_content_top' );
