<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shop
 */

get_header();
?>
<div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are awesome</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, dolorem, excepturi. Dolore aliquam quibusdam ut quae iure vero exercitationem ratione!</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi ab molestiae minus reiciendis! Pariatur ab rerum, sapiente ex nostrum laudantium.</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are great</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe aspernatur, dolorum harum molestias tempora deserunt voluptas possimus quos eveniet, vitae voluptatem accusantium atque deleniti inventore. Enim quam placeat expedita! Quibusdam!</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>We are superb</h2>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, eius?</p>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti voluptates necessitatibus dicta recusandae quae amet nobis sapiente explicabo voluptatibus rerum nihil quas saepe, tempore error odio quam obcaecati suscipit sequi.</p>
                                                <a href="" class="readmore">Learn more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>30 Days return</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Free shipping</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Secure payments</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-gift"></i>
                        <p>New products</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
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



                        </div> <!-- class="product-carousel" -->
                    </div> <!-- class="latest-product" -->
                </div> <!-- class="col-md-12" -->
            </div> <!-- class="row" -->
        </div> <!-- container -->
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Brands</h2>
                        <div class="brand-list">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/vendor/img/services_logo__1.jpg" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/vendor/img/services_logo__2.jpg" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/vendor/img/services_logo__3.jpg" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/vendor/img/services_logo__4.jpg" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/vendor/img/services_logo__1.jpg" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/vendor/img/services_logo__2.jpg" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/vendor/img/services_logo__3.jpg" alt="">
                            <img src="<?php echo get_stylesheet_directory_uri();?>/vendor/img/services_logo__4.jpg" alt="">                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
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

<?php
get_footer();
