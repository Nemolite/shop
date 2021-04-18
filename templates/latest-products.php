<?php
/**
 * Latest Products
 */
?>

<div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Latest Products</h2>
                        <div class="product-carousel">

                    <?php
                        $query_args = array(
                            'showposts'   => 6,
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
                     <div class="single-product">
                                <div class="product-f-image">
                                    <img src="<?php echo get_the_post_thumbnail_url();?>" alt="">
                                    <div class="product-hover">
                                        <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="single-product.html" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>
                                
                                <h2><a href="single-product.html"><?php the_title();?></a></h2>
                                
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
                                    </ins> <del>
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
    </div> <!-- End main content area -->