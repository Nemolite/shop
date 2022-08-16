<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
?>
<div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                            <?php
                            $query_args = array(
                                'showposts'   => 4, 
                                'post_status' => 'publish',
                                'post_type'   => 'product',
                                'orderby'     => 'date',
                                'order'       => 'DESC',
                            );
                                $r = new WP_Query( $query_args );
                            if ( $r->have_posts() ) {
                                while ( $r->have_posts() ) {
                                    $r->the_post();
                            ?>
                                <div class="thubmnail-recent">
                                    <img width="63" height="57" class="recent-thumb" src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), array(63, 57), false );?>" alt="">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                                    <div class="product-sidebar-price">
                                        <ins>
                                        <?php
                                        $product = wc_get_product(get_the_ID());
                                        $thePrice = $product->get_price(); 
                                        echo $thePrice;
                                        echo " ";
                                        $currency_symbol = html_entity_decode( get_woocommerce_currency_symbol() );
                                        echo $currency_symbol;
                                        ?>
                                        </ins>
                                        <del>
                                        <?php
                                        echo $product->get_price();
                                        echo " ";
                                        echo $currency_symbol;
                                        ?>                                    
                                        </del>
                                    </div>                             
                                </div>
                            <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>
                    </div><!-- class="single-sidebar" -->
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>

                            <?php
                            $query_args = array(
                                'showposts'   => 5, 
                                'post_status' => 'publish',
                                'post_type'   => 'product',
                                'orderby'     => 'date',
                                'order'       => 'DESC',
                            );
                                $r = new WP_Query( $query_args );
                            if ( $r->have_posts() ) {
                                while ( $r->have_posts() ) {
                                    $r->the_post();
                            ?>

                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>

                            <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>


                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <?php 
							/**
							 * Hook: shop_wc_single_product_breadcroumb.							
							 * 
							 * @hooked woocommerce_breadcrumb - 10							 
							 */
							do_action('shop_wc_single_product_breadcroumb');
							?>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
									<?php 
									/**
									 * Hook: shop_wc_single_product_img.							
									 * 
									 * @hooked woocommerce_show_product_images - 10							 
									 */
									do_action('shop_wc_single_product_img');
									?>
                                    </div>
									<div class="product-gallery">
										<div class="row">
										<?php 
										/**
										 * Hook: shop_woocommerce_product_thumbnails.							
										 * 
										 * @hooked shop_woocommerce_product_thumbnails_html - 10							 
										 */
										do_action( 'shop_woocommerce_product_thumbnails' );
										?>
										</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">
									<?php 
									/**
									 * Hook: shop_wc_single_product_title.							
									 * 
									 * @hooked woocommerce_template_single_title - 10							 
									 */
									do_action('shop_wc_single_product_title');
									?>
									</h2>
                                    <div class="product-inner-price">
									<?php 
									/**
									 * Hook: shop_wc_single_product_summary.							
									 * 
									 * @hooked shop_woocommerce_template_loop_price - 10							 
									 */
									do_action( 'shop_wc_single_product_summary' );
									?>
									
                                    </div>    
                                   
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <?php 
												/**
												 * Hook: shop_wc_single_product_description.							
												 * 
												 * @hooked woocommerce_template_single_excerpt - 10							 
												 */
												do_action( 'shop_wc_single_product_description' );
												?>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

														<?php 
													/**
													 * Hook: shop_wc_single_product_rating.							
													 * 
													 * @hooked woocommerce_template_single_rating - 10							 
													 */
													do_action( 'shop_wc_single_product_rating' );
													?>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">

                            <?php
                            $query_args = array(
                                'showposts'   => 4, // Количество выводимых товаров
                                'post_status' => 'publish',
                                'post_type'   => 'product', 
                                'orderby'     => 'rand', // случайные посты
                                'order'       => 'DESC',
                            );
                                $related = new WP_Query( $query_args );
                            if ( $related->have_posts() ) {
                                while ( $related->have_posts() ) {
                                    $related->the_post();
                            ?>
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                        <div class="product-hover">
                                            <a href="<?php echo get_home_url(); ?>/?add-to-cart=<?php echo get_the_ID();?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="<?php the_permalink(); ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>
                                
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                                
                                    <div class="product-carousel-price">
                                        <ins>
                                        <?php
                                        $product = wc_get_product(get_the_ID());
                                        $thePrice = $product->get_price(); 
                                        echo $thePrice;
                                        echo " ";
                                        $currency_symbol = html_entity_decode( get_woocommerce_currency_symbol() );
                                        echo $currency_symbol;
                                        ?>
                                        </ins>
                                        <del>
                                        <?php
                                        echo $product->get_price();
                                        echo " ";
                                        echo $currency_symbol;
                                        ?>                                     
                                        </del>
                                    </div> 
                                </div>


                            <?php
                                }
                            }
                            wp_reset_postdata();
                            ?>                                      
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

<?php
//global $wp_query;
echo "<pre>";
//print_r($wp_query);
echo "</pre>";
?>


<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10 del
	 * @hooked woocommerce_show_product_images - 20
	 * 
	 * @hooked woocommerce_breadcrumb - 5 temp
	 * @hooked shop_woocommerce_before_single_product_html - 3 del
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
