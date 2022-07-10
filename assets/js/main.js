jQuery(document).ready(function(jQuery){	
    
    // jQuery sticky Menu
    
	jQuery(".mainmenu-area").sticky({topSpacing:0});
    
    
    jQuery('.product-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:5,
            }
        }
    });  
    
    jQuery('.related-products-carousel').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            1000:{
                items:2,
            },
            1200:{
                items:3,
            }
        }
    });  
    
    jQuery('.brand-list').owlCarousel({
        loop:true,
        nav:true,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:4,
            }
        }
    });    
    
    
    // Bootstrap Mobile Menu fix
    jQuery(".navbar-nav li a").click(function(){
       jQuery(".navbar-collapse").removeClass('in');
    });    
    
    // jQuery Scroll effect
    jQuery('.navbar-nav li a, .scroll-to-up').bind('click', function(event) {
        var $anchor = jQuery(this);
        var headerH = jQuery('.header-area').outerHeight();
        jQuery('html, body').stop().animate({
            scrollTop : jQuery($anchor.attr('href')).offset().top - headerH + "px"
        }, 1200, 'easeInOutExpo');

        event.preventDefault();
    });    
    
    // Bootstrap ScrollPSY
    jQuery('body').scrollspy({ 
        target: '.navbar-collapse',
        offset: 95
    })      
});

