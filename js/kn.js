jQuery(document).ready(function($) {
	
    // --------
    // MENU MOBILE
    // --------
    
    $('.menu--toggle').click(function(){
      $(this).toggleClass('open');
      $('nav.menu').slideToggle();
    });
      
    // --------
    // SCROLL TO TOP 
    // --------
	
    $(".backToTop").click(function(e){
      $("html, body").stop().animate({scrollTop: "0px"},{duration: 1000 , easing:'easeInOutCubic' });
      return false;
    });
    

    // --------
    // BOUTON DE SCROLL
    // --------
    $(".scroll_to").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({ scrollTop: $(hash).offset().top }, 400);
        }
    });

    
    // --------
    // SLICK
    // --------

    $('.slider_basic').each(function() {
        $(this).slick({
            slidesToShow: 1,
            autoplay: false,
            autoplaySpeed: 6000,
            speed :500,
        });
    });
    
    $('.carrousel__list').each(function() {
        $(this).slick({
            slidesToShow: $(this).data('items'),
            slidesToScroll: $(this).data('scroll'),
            infinite:true,
            responsive: [
              {
                breakpoint: 768,
                settings: {
                slidesToShow: 3,
                }
              },
                      {
                breakpoint: 576,
                settings: {
                slidesToShow: 2,
                }
              }
            ]
        });
    });

    $('.testimonials__list').each(function() {
        $(this).slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
        });
    });
    
    
    // --------
    // POST TAX FILTER
    // --------
    
    $('.tax-menu li').each(function(){
        $(this).click(function(){
             $tax = $(this).attr('data-tax');
                
             $(this).parents('.archive-wrapper').find('.item.unselected').removeClass('unselected');
                if($tax!='all-posts'){
                 $(this).parents('.archive-wrapper').find('.item[data-tax!="'+$tax+'"]').addClass('unselected');
                }
        });
    });
    
    // --------
    // VIDEO PLAY /PAUSE
    // --------
    
    $('.video-responsive .vid_play').click(function(){
        if($(this).hasClass('paused')){
            $(this).parent('.video-responsive').find('video').get(0).play();
            $(this).html('PAUSE');
            $(this).addClass('playing');
            $(this).removeClass('paused');
        }else{
            $(this).parent('.video-responsive').find('video').get(0).pause();
            $(this).html('PLAY');
            $(this).addClass('paused');
            $(this).removeClass('playing');             
        }
    });

    // ----------
    // CHIFFRES CLES
    // ---------
    
    $.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    $(window).on("resize scroll", (function() {
        $(".chiffre").each(function() {
            if(!isNaN($(this).find('.valeur').text())) {
                if($(this).isInViewport() && $(this).hasClass("init")){
                    $(this).removeClass('init');
                    var el = $(this).find('.valeur');
                    if(el.text().indexOf(".") > -1 || el.text().indexOf(",") > -1 ){
                        el.text().replace(",", ".");
                        el.prop('Counter',0).animate({
                            Counter: el.text()
                        }, {
                            duration: 4000,
                            easing: 'swing',
                            step: function (now2) {
                                el.text(now2.toFixed(1).replace(".", ","));
                                        
                                setTimeout(function() {
                                    el.parent().find(".prefix").addClass("active");
                                    el.parent().find(".suffix").addClass("active");
                                    el.parents('.chiffre').find(".label").addClass("active");
                                },4000);
                            }
                        });
                    } else {
                        el.prop('Counter',0).animate({
                            Counter: el.text()
                        }, {
                            duration: 4000,
                            easing: 'swing',
                            step: function (now) {
                                el.text(Math.ceil(now));
                                
                                setTimeout(function() {
                                    el.parent().find(".prefix").addClass("active");
                                    el.parent().find(".suffix").addClass("active");
                                    el.parents('.chiffre').find(".label").addClass("active");
                                },4000);
                            }
                        });
                    }
                }
            }
        });
    }));

 });