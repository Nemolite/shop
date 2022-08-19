<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">                        
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<h2><?php 
							//woocommerce_page_title();							 
							$shop_page_id = wc_get_page_id( 'cart' );
							$page_title   = get_the_title( $shop_page_id );
							echo $page_title;
							?></h2>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php
/**
 * Hook: woocommerce_before_cart.							
 * 
 * @hooked shop_woocommerce_before_cart_html - 10							 
 */
do_action( 'woocommerce_before_cart' ); ?>

<div class="col-md-4">
    <div class="single-sidebar">
        <h2 class="sidebar-title">Search Products</h2>
        <?php get_search_form(); ?>
    </div><!-- class="single-sidebar" -->
                    
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
                                <img width="63" height="57" class="recent-thumb" src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'sidebar-image-single-product', false );?>" alt="">
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
            <li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>                            
            <?php
    		            }
                    }
                wp_reset_postdata();
            ?>

        </ul>
    </div><!-- class="single-sidebar" -->
</div><!-- class="col-md-4" -->

<div class="col-md-8">
	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
				<th class="product-remove">&nbsp;</th>
				<th class="product-thumbnail">&nbsp;</th>
				<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
				<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
				<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

					    <!--  удаления-->
						<td class="product-remove">
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</td>

						<!--  миниатюра изображения товара-->
						<td class="product-thumbnail">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
						</td>

						<!--  название  товара-->
						<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
						<?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
						</td>

						<!--  стоимость  товара-->
						<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</td>

						<!--  количество  товара-->
						<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</td>
						<!--  стоимость позиции товара с учетом количества -->
						<td class="product-subtotal" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"><?php esc_html_e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" style="width: 100px;" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <button type="submit" class="button" style="margin-right:4px;" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
					
					<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
					
					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>

<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

<div class="cart-collaterals">
	<?php
		/**
		 * Cart collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10 
		 */
		do_action( 'woocommerce_cart_collaterals' );
	?>
</div>

</div><!-- class="col-md-8" -->

<?php 
/**
* woocommerce_after_cart.
*		
* @hooked shop_woocommerce_after_cart_html - 10
 */
do_action( 'woocommerce_after_cart' ); ?>
			