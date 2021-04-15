<?php
/**
 * Шаблон слайдера successes
 */
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
<?php  
$args = array(
    'post_type' => 'successes',                               
    'post_status' => 'publish', 
    'posts_per_page' => 3,                           
);
$index = 0;
$active = array('active','',''); 
$slide = array('one','two','three');  
$query = new WP_Query($args);
if( $query->have_posts() ){
    while( $query->have_posts() ){            
        $query->the_post(); ?> 

<div class="item <?php echo $active[$index]?>">
    <div class="single-slide">
        <div class="slide-bg slide-<?php echo $slide[$index]?>"></div>
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

        <?php
        $index++;        
    }       
}
wp_reset_postdata();
?>
        </div> <!-- End class="carousel-inner" role="listbox" -->
</div> <!-- End id="slide-list" class="carousel carousel-fade slide" data-ride="carousel" -->
</div> <!-- End slider area -->