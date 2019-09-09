$=jQuery
jQuery(document).ready(function () {



  /* search toggle */
        $('body').click(function(evt){
          if(!( $(evt.target).closest('.search-section').length || $(evt.target).hasClass('search-toggle') ) ){
           if ($(".search-toggle").hasClass("search-active")){
            $(".search-toggle").removeClass("search-active");
            $(".search-box").slideUp("slow");
          }
        }
        });
        $(".search-toggle").click(function(){
        $(".search-box").toggle("slow");
             if ( !$(".search-toggle").hasClass("search-active")){
           $(".search-toggle").addClass("search-active");

        }
        else{
        $(".search-toggle").removeClass("search-active");
        }
        
    });

  jQuery('.menu-top-menu-container').meanmenu({
    meanMenuContainer: '.main-navigation',
    meanScreenWidth:"767",
    meanRevealPosition: "right",
  });


         /* back-to-top button*/

     $('.back-to-top').hide();
     $('.back-to-top').on("click",function(e) {
     e.preventDefault();
     $('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    
    $(window).scroll(function(){
      var scrollheight =400;
      if( $(window).scrollTop() > scrollheight ) {
           $('.back-to-top').fadeIn();

          }
        else {
              $('.back-to-top').fadeOut();
             }
     });

    


           // slider

           var owllogo = $("#owl-slider-demo");

              owllogo.owlCarousel({
                  items:1,
                  loop:true,
                  nav:true,
                  dots:false,
                  smartSpeed:900,
                  autoplay:true,
                  autoplayTimeout:5000,
                  fallbackEasing: 'easing',
                  transitionStyle : "fade",
                  autoplayHoverPause:true,
                  animateOut: 'fadeOut'
              });


             var owl = $("#clients-slider");
              owl.owlCarousel({
              items:3,
              loop:true,
              nav:true,
              dots:false,
              smartSpeed:900,
              autoplay:true,
              autoplayTimeout:1300,
              fallbackEasing: 'easing',
              transitionStyle : "fade",
              autoplayHoverPause:true,
              responsive:{
                  0:{
                      items:1
                  },
                  580:{
                      items:3
                  },
                  1000:{
                      items:4
                  }
              }
              
              });


              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })


              

    /* for counter */

    function count($this){
      var current = parseInt($this.html(), 10);
      current = current + 1; /* Where 1 is increment */

      $this.html(++current);
      if(current > $this.data('count')){
        $this.html($this.data('count'));
      } else {
        setTimeout(function(){count($this)}, 50);
      }
    }

    jQuery(".start-count").each(function() {
      jQuery(this).data('count', parseInt(jQuery(this).html(), 10));
      jQuery(this).html('0');
      count(jQuery(this));
    });

    $('#mixit-container').mixItUp();

        
});


$('.top-menu-toggle_bar_wrapper').on('click', function(){
  $(this).toggleClass('close');
  $(this).siblings('.top-menu-toggle_body_wrapper').slideToggle().toggleClass('hide-menu');
});

$(window).resize(function(){
  var winWidth = $(window).width();
  if(winWidth>1023){
    $('.top-menu-toggle_body_wrapper').remove('style');
    $('.top-menu-toggle_bar_wrapper').removeClass('close');
  }
});