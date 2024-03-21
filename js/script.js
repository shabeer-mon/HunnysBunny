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
// FOOTER TAB
$('.footer-tab .footer-menu').hide();

$('.footer-tab .title').on('click', function() {
  $(this).toggleClass('active').next('.footer-menu ').slideToggle();
  $('.footer-menu ').not($(this).next('.footer-menu ')).slideUp();
});

$(window).scroll(function() {
  var footer = $('footer');
  var body = $('body');
  var footerTop = footer.offset().top;
  var windowHeight = $(window).height();
  var scrollPosition = $(this).scrollTop();

  // Check if footer is on the screen
  if (footerTop < scrollPosition + windowHeight) {
      body.addClass('footer-on-screen');
  } else {
      body.removeClass('footer-on-screen');
  }
});


// FOOTER TAB END
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
        speed:500,
        mobileFirst:true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3.5
            }
          }
        ]
        
    });

    $('.hunnys-bunny-banner').click(function(e){
      e.currentTarget.classList.add('slick-current', 'slick-active','slick-center');
  });
  });
