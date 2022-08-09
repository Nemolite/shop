<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eElectronics - HTML eCommerce Template</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
       

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
  </head>
  <body>
   <div class="attention">
	<h1>Сайт создан в учебных целях в рамках рабочей программы образовательного учреждения</h1>
   </div>
   <div class="header-area">
	   <div class="container">
		   <div class="row">
			   <div class="col-md-8">
			   <?php
      
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
						'items_wrap'      => '<ul class="fix-top-menu">%3$s</ul>',
						'depth'           => 0,
						'walker'          => '',
					] );

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
					   <a href="<?php echo esc_url( wc_get_cart_url() ); ?>">
						Cart - <span class="cart-amunt">
									<?php 
										echo WC()->cart->get_cart_subtotal();
									?>
						</span> 
						<i class="fa fa-shopping-cart"></i> 
							<span class="product-count">
							<?php
							echo WC()->cart->get_cart_contents_count();
							?>
							</span>
						</a>
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
				?>  
		   </div>
	   </div>
   </div> <!-- End mainmenu area -->