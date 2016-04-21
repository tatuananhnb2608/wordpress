jQuery(document).ready(function(e) {jQuery('ul').each(function(){ jQuery(this).find('li:last').addClass('last'); });jQuery('ul').each(function(){ jQuery(this).find('li:first').addClass('first'); });
    var owl_slider;
    owl_slider = jQuery("#owl-slider");
    owl_slider.owlCarousel({
        autoplay : true,
        loop: true,
        mouseDrag: false,
        items: 1,
        lazyLoad: true,
        animateOut: 'zoomOut',
        //animateIn: 'zoomOut',
        autoplayHoverPause: true,
        dots: false,
        nav:true,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    });
    var owl_selling;
    owl_selling = jQuery("#owl-selling");
    owl_selling.owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsiveClass:true,
        responsive:{
            320:{
                items:1,
            },
            390:{
                items:2,
            },
            480:{
                items:2,
            },
            600:{
                items:3,
            },
            1000:{
                items:4,
            }
        }
    });
    jQuery('#mega').dcVerticalMegaMenu({
        rowItems: '3',
        speed: 'fast',
        effect: 'slide',
        direction: 'right'
    });
    new WOW().init();
    jQuery(".screen .frame img").mouseover(function() {
        var distance = this.height - jQuery(this).parent().height();
        jQuery(this).stop().animate({marginTop: - distance}, 3000, 'linear');
    }).mouseout(function() {
        jQuery(this).stop().animate({marginTop: '0'}, 300);
    });
    jQuery('.scrollTo').on('click', scrollToTop);
    function scrollToTop() {verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;element = jQuery('body');offset = element.offset();offsetTop = offset.top;jQuery('html, body').animate({scrollTop: offsetTop}, 500, 'linear');}
    jQuery(".navbar-toggle").click(function(){jQuery('body').addClass('mnopen');})
    jQuery(".close-menu").click(function(){jQuery('body').removeClass('mnopen');})
});