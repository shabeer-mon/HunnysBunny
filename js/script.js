$(document).ready(function(){
    $(".hamburger").click(function(){
      $(this).toggleClass("is-active");
      $('.navbar').toggleClass("active");
      $('.main').toggleClass("small");
      window.setTimeout(function(){
        $('.navbar').toggleClass('vissible');
      }, 400); //<-- Delay in milliseconds
      window.setTimeout(function(){
        $('.navbar').toggleClass('hide-vissible');
      }, 200); //<-- Delay in milliseconds
      window.setTimeout(function(){
        $('.navbar').toggleClass('show-menu');
      }, 800); //<-- Delay in milliseconds
    });
    $(".navbar .btn-close").click(function(){
      $('.hamburger').removeClass("is-active");
      $('.navbar').removeClass("active, vissible");
    })
    $(".top-bar .btn-close").click(function(){
      $("body").removeClass("top-bar-active");
      $('.top-bar').hide();
    })

    $('.hunnys-bunny-banner').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        swipe:true,
        cssEase: 'linear',
        speed: 800,
    });


    
    $('.offerInfo').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        mobileFirst: true,
        autoplaySpeed:5000,
        fade: true,
        cssEase: 'ease-in-out',
        touchThreshold: 100,
        responsive: [
          {
            breakpoint: 980,
            settings: {
              settings: "unslick",
              slidesToShow: 3,
              fade: false,
            }
          },
        ]
    });


    $('.prod-slider').slick({
        infinite: false,
        slidesToShow: 1.5,
        slidesToScroll: 1,
        dots: false,
        autoplay: false,
        swipe:true,
        cssEase: 'linear',
        mobileFirst: true,
        speed:500,
        responsive: [
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 2.5,
            }
          },
          {
            breakpoint: 980,
            settings: {
              slidesToShow: 3.5,
            }
          }
        ]
        
    });

    $('.hunnys-bunny-banner').click(function(e){
      e.currentTarget.classList.add('slick-current', 'slick-active','slick-center');
  });
  slider.slick(settings);
  $(window).on("resize", function () {
      if ($(window).width() > $breakpoint) {
        return;
      }
      if (!slider.hasClass("slick-initialized")) {
        return slider.slick(settings);
      }
    });
  });
