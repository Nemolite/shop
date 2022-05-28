<?php
/**
 * Блоки Top Sellers,  Recently Viewed,  Top New
 */
?>
<div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Top Sellers</h2>
                        <a href="" class="wid-view-more">View All</a>

                        <?php
                        $query_args = array(
                            'showposts'   => 3,
                            'post_status' => 'publish',
                            'post_type'   => 'product',
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'meta_key' => 'total_sales',
                        );
                        $r = new WP_Query( $query_args );
                    if ( $r->have_posts() ) {
                        while ( $r->have_posts() ) {
                            $r->the_post();
                    ?>

                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="product-thumb"></a>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                            <div class="product-wid-rating">
                               <?php
                               // для фронта
                                require_once ABSPATH .'wp-admin/includes/template.php';

                                // подключим иконки
                                add_action('wp_enqueue_scripts', function(){    wp_enqueue_style('dashicons');    });

                                // Выводим HTML
                                wp_star_rating( array( 'rating'=>4.5, 'type'=>'rating', 'number'=>521, ) );

                                echo '
                                <style>
                                .screen-reader-text{ position: absolute; margin: -1px; padding: 0; height: 1px; width: 1px; overflow: hidden; clip: rect(0 0 0 0); border: 0; word-wrap: normal!important; }
                                .star-rating .star-full:before { content: "\f155"; }
                                .star-rating .star-half:before { content: "\f459"; }
                                .star-rating .star-empty:before { content: "\f154"; }
                                .star-rating .star {
                                    color: #ffc808;
                                    display: inline-block;
                                    font-family: dashicons;
                                    font-size: 15px;
                                    font-style: normal;
                                    font-weight: 400;
                                    height: 20px;
                                    line-height: 1;
                                    text-align: center;
                                    text-decoration: inherit;
                                    vertical-align: top;
                                    width: 16px;
                                }
                                .product-wid-rating {
                                    color: #ffc808;
                                    margin-bottom: 0px;
                                }
                                </style>';
                               ?>
                            </div>
                            <div class="product-wid-price">
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
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recently Viewed</h2>
                        <a href="#" class="wid-view-more">View All</a>
                        <?php
                        $query_args = array(
                            'showposts'   => 3,
                            'post_status' => 'publish',
                            'post_type'   => 'product',
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'meta_key' => 'total_sales',
                        );
                        $r = new WP_Query( $query_args );
                    if ( $r->have_posts() ) {
                        while ( $r->have_posts() ) {
                            $r->the_post();
                    ?>

                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="product-thumb"></a>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                            <div class="product-wid-rating">
                               <?php
                               // для фронта
                                require_once ABSPATH .'wp-admin/includes/template.php';

                                // подключим иконки
                                add_action('wp_enqueue_scripts', function(){    wp_enqueue_style('dashicons');    });

                                // Выводим HTML
                                wp_star_rating( array( 'rating'=>4.5, 'type'=>'rating', 'number'=>521, ) );

                                echo '
                                <style>
                                .screen-reader-text{ position: absolute; margin: -1px; padding: 0; height: 1px; width: 1px; overflow: hidden; clip: rect(0 0 0 0); border: 0; word-wrap: normal!important; }
                                .star-rating .star-full:before { content: "\f155"; }
                                .star-rating .star-half:before { content: "\f459"; }
                                .star-rating .star-empty:before { content: "\f154"; }
                                .star-rating .star {
                                    color: #ffc808;
                                    display: inline-block;
                                    font-family: dashicons;
                                    font-size: 15px;
                                    font-style: normal;
                                    font-weight: 400;
                                    height: 20px;
                                    line-height: 1;
                                    text-align: center;
                                    text-decoration: inherit;
                                    vertical-align: top;
                                    width: 16px;
                                }
                                .product-wid-rating {
                                    color: #ffc808;
                                    margin-bottom: 0px;
                                }
                                </style>';
                               ?>
                            </div>
                            <div class="product-wid-price">
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
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Recently Viewed</h2>
                        <a href="#" class="wid-view-more">View All</a>
                        <?php
                        $query_args = array(
                            'showposts'   => 3,
                            'post_status' => 'publish',
                            'post_type'   => 'product',
                            'orderby'     => 'date',
                            'order'       => 'DESC',
                            'meta_key' => 'total_sales',
                        );
                        $r = new WP_Query( $query_args );
                    if ( $r->have_posts() ) {
                        while ( $r->have_posts() ) {
                            $r->the_post();
                    ?>

                        <div class="single-wid-product">
                            <a href="single-product.html"><img src="<?php echo get_the_post_thumbnail_url();?>" alt="" class="product-thumb"></a>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                            <div class="product-wid-rating">
                               <?php
                               // для фронта
                                require_once ABSPATH .'wp-admin/includes/template.php';

                                // подключим иконки
                                add_action('wp_enqueue_scripts', function(){    wp_enqueue_style('dashicons');    });

                                // Выводим HTML
                                wp_star_rating( array( 'rating'=>4.5, 'type'=>'rating', 'number'=>521, ) );

                                echo '
                                <style>
                                .screen-reader-text{ position: absolute; margin: -1px; padding: 0; height: 1px; width: 1px; overflow: hidden; clip: rect(0 0 0 0); border: 0; word-wrap: normal!important; }
                                .star-rating .star-full:before { content: "\f155"; }
                                .star-rating .star-half:before { content: "\f459"; }
                                .star-rating .star-empty:before { content: "\f154"; }
                                .star-rating .star {
                                    color: #ffc808;
                                    display: inline-block;
                                    font-family: dashicons;
                                    font-size: 15px;
                                    font-style: normal;
                                    font-weight: 400;
                                    height: 20px;
                                    line-height: 1;
                                    text-align: center;
                                    text-decoration: inherit;
                                    vertical-align: top;
                                    width: 16px;
                                }
                                .product-wid-rating {
                                    color: #ffc808;
                                    margin-bottom: 0px;
                                }
                                </style>';
                               ?>
                            </div>
                            <div class="product-wid-price">
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
    </div> <!-- End product widget area -->