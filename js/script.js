$(document).ready(function () {
  $(".hamburger").click(function () {
    $(this).toggleClass("is-active");
    $(".navbar").toggleClass("active");
    $(".main").toggleClass("small");
    window.setTimeout(function () {
      $(".navbar").toggleClass("vissible");
    }, 400); //<-- Delay in milliseconds
    window.setTimeout(function () {
      $(".navbar").toggleClass("hide-vissible");
    }, 200); //<-- Delay in milliseconds
    window.setTimeout(function () {
      $(".navbar").toggleClass("show-menu");
    }, 800); //<-- Delay in milliseconds
  });
  $(".navbar .btn-close").click(function () {
    $(".hamburger").removeClass("is-active");
    $(".navbar").removeClass("active, vissible");
  });
  $(".top-bar .btn-close").click(function () {
    $("body").removeClass("top-bar-active");
    $(".top-bar").hide();
  });
  $(".search-btn").click(function () {
    $("body").addClass("search-active");
  });



   //  Menu and Sub menu
   $(".dropdown-toggle").click(function () {
    var dropdownItem = $(this).closest(".dropdown");
    var dropdownContent = dropdownItem.find(".submenu");
    // Toggle active class and slide up/down the content
    dropdownItem.toggleClass("active");
    dropdownContent.toggleClass("active");
    $(".category-menu").toggleClass("dropdown-active");
    // Close other accordion items if they are open
    // $(".collapse-item").not(accordionItem).removeClass("active");
    // $(".collapse-panel").not(accordionContent).slideUp();
  });
  $(".submenu-close").click(function () {
    $(".dropdown").removeClass("active");
    $(".submenu").removeClass("active");
    $(".category-menu").removeClass("dropdown-active");
  });

  // drawer
  $(".drawer-button").click(function () {
    var targetModalId = $(this).data("target");
    $("#" + targetModalId)
      .show()
      .addClass("active");
    $("body").addClass("overlay-active");
  });

  // Close the modal when the close button or outside the modal is clicked
  $(".close, .modal").click(function () {
    $(".modal").removeClass("active");
    $("body").removeClass("overlay-active");
    window.setTimeout(function () {
      $(".modal").hide();
    }, 400); //<-- Delay in milliseconds
  });

  // Prevent the modal from closing when the modal content is clicked
  $(".drawer-block").click(function (e) {
    e.stopPropagation();
  });

  // drawer end

  // Search filter
  $("#filterInput").on("input", function () {
    var filterInputValue = $(this).val().toLowerCase();

    // Show filter section if filter input is not empty
    if (filterInputValue.trim() !== "") {
      $("#filterSection").slideDown();
    } else {
      $("#filterSection").slideUp();
    }
if(filterInputValue.length>2){
    $.ajax({
      url:'',
      method:'POST',
      data:{
        serch_by_name:filterInputValue
      },
      success:function (res) {
        // console.log(res);
    $("#filterList").html(res);

      }

    });
    // Filter items based on input value
}

    // $("#filterList .prod-list-item").each(function () {
    //   var text = $(this).text().toLowerCase();
    //   if (text.indexOf(filterInputValue) !== -1) {
    //     $(this).show();
    //     $(".no-data").hide();
    //   } else {
    //     $(this).hide();
    //     $(".no-data").show();
    //   }
    // });
  });

  // filter drawer
  $(".filter-button").click(function () {
    $("body").addClass("overlay-active");
    $(".filter-drawer").addClass("active");
  });

  


  //Drawer COLSER
  $(".drawer-close").click(function () {
    $("body").removeClass("overlay-active");
    $(".filter-drawer").removeClass("active");
    $(".cart-drawer").removeClass("active");
  });
  // Search close
  $(".search-close").click(function () {
    $("body").removeClass("search-active");
  });

  // collapse
  $(".collapse-item.active .collapse-panel").slideDown();
  $(".collapse-title").click(function () {
    var accordionItem = $(this).closest(".collapse-item");
    var accordionContent = accordionItem.find(".collapse-panel");
    // Toggle active class and slide up/down the content
    accordionItem.toggleClass("active");
    accordionContent.slideToggle();
    // Close other accordion items if they are open
    $(".collapse-item").not(accordionItem).removeClass("active");
    $(".collapse-panel").not(accordionContent).slideUp();
  });
  // collapse end

  // footer-on-scree
  $(window).scroll(function () {
    var footer = $("footer");
    var body = $("body");
    var footerTop = footer.offset().top;
    var windowHeight = $(window).height();
    var scrollPosition = $(this).scrollTop();

    // Check if footer is on the screen
    if (footerTop < scrollPosition + windowHeight) {
      body.addClass("footer-on-screen");
    } else {
      body.removeClass("footer-on-screen");
    }
  });
  // footer-on-scree end

  // Category filter
  // Initialize filter counter
  updateFilterCounter();

  // Checkbox change event
  $(".category-checkbox").change(function () {
    applyFilter();
    updateFilterCounter();
  });

  // Clear button click event
  $("#clearButton").click(function () {
    clearFilter();
  });

  function applyFilter() {
    var selectedCategories = [];
    $(".category-checkbox:checked").each(function () {
      selectedCategories.push($(this).val());
    });

    if (selectedCategories.length > 0) {
      $(".product").hide();
      selectedCategories.forEach(function (category) {
        $('.product[data-categories*="' + category + '"]').show();
        showSelectedCategories(selectedCategories);
      });
    } else {
      // If no categories selected, show all products
      $(".product").show();
    }
  }

  function clearFilter() {
    $(".category-checkbox").prop("checked", false);
    $(".product").show();
    updateFilterCounter();
  }

  function updateFilterCounter() {
    var selectedCategories = $(".category-checkbox:checked").length;
    $("#filterCounter").text("(" + selectedCategories + ")");
  }

  $(".applyButton").click(function () {
    $("body").removeClass("overlay-active");
    $(".filter-drawer").removeClass("active");
  });
  function showSelectedCategories(selectedCategories) {
    $(".applied-categories").empty();
    if (selectedCategories.length > 0) {
      selectedCategories.forEach(function (category) {
        $(".applied-categories").append(
          '<span class="applied-category">' + category + "</span>"
        );
      });
    }
  }
  // Category filter end

  // load more
  var totalProducts = $(".product-card").length;
  var productsToShow = 4;
  var productsShown = productsToShow;

  updateCounter();

  $(".product-card:lt(" + productsToShow + ")").show();

  $("#loadMoreButton").click(function () {
    productsToShow += 4;
    productsShown = Math.min(productsToShow, totalProducts);
    $(".product-card:lt(" + productsToShow + ")").slideDown();
    updateCounter();
    if (productsShown === totalProducts) {
      $(this).hide();
      $("#showAllButton").hide();
      $(".load-more-block").hide();
    }
  });

  $("#showAllButton").click(function () {
    $(".product-card").slideDown();
    updateCounter();
    $(this).hide();
    $("#loadMoreButton").hide();
    $(".load-more-block").hide();
  });

  function updateCounter() {
    $("#productCounter").text("(" + productsShown + "/" + totalProducts + ")");
  }
  // load more  end

// Login page functions
$(".reg-link .link-item").click(function () {
  $(".register-block").addClass("active");
  $(".log-in-box").addClass("inactive");
});

$(".login-link .link-item").click(function () {
  $(".register-block").removeClass("active");
  $(".log-in-box").removeClass("inactive");
});


  // Slick
  $(".hunnys-bunny-banner").slick({
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    autoplay: true,
    swipe: true,
    speed: 800,
  });

  $(".offerInfo").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    autoplay: true,
    mobileFirst: true,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: "ease-in-out",
    touchThreshold: 100,
    responsive: [
      {
        breakpoint: 980,
        settings: {
          settings: "unslick",
          slidesToShow: 3,
          fade: false,
        },
      },
    ],
  });

  $(".prod-slider").slick({
    infinite: false,
    slidesToShow: 1.5,
    slidesToScroll: 1,
    dots: false,
    autoplay: false,
    swipe: true,
    speed: 500,
    mobileFirst: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3.5,
        },
      },
    ],
  });

  $(".swiper-slider").on("init reInit afterChange", function (event, slick) {
    $(".swiper__counter").html(
      slick.slickCurrentSlide() + 1 + "/" + slick.slideCount
    );
  });
  $(".swiper-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    swipe: true,
    speed: 500,
    mobileFirst: true,
    appendArrows: $(".swiper-slider__arrows"),
    prevArrow:
      '<div class="swiper__arrow arrow-left"><i class="icon-left"></i></div>',
    nextArrow:
      '<div class="swiper__arrow arrow-right"><i class="icon-right"></i></div>',
  });
// Input number 
  (function () {
    const quantityContainer = document.querySelector(".quantityBtn");
    const minusBtn = quantityContainer.querySelector(".minus");
    const plusBtn = quantityContainer.querySelector(".plus");
    const inputBox = quantityContainer.querySelector(".input-box");
  
    updateButtonStates();
  
    quantityContainer.addEventListener("click", handleButtonClick);
    inputBox.addEventListener("input", handleQuantityChange);
  
    function updateButtonStates() {
      const value = parseInt(inputBox.value);
      minusBtn.disabled = value <= 1;
      plusBtn.disabled = value >= parseInt(inputBox.max);
    }
  
    function handleButtonClick(event) {
      if (event.target.classList.contains("minus")) {
        decreaseValue();
      } else if (event.target.classList.contains("plus")) {
        increaseValue();
      }
    }
  
    function decreaseValue() {
      let value = parseInt(inputBox.value);
      value = isNaN(value) ? 1 : Math.max(value - 1, 1);
      inputBox.value = value;
      updateButtonStates();
      handleQuantityChange();
    }
  
    function increaseValue() {
      let value = parseInt(inputBox.value);
      value = isNaN(value) ? 1 : Math.min(value + 1, parseInt(inputBox.max));
      inputBox.value = value;
      updateButtonStates();
      handleQuantityChange();
    }
  
    function handleQuantityChange() {
      let value = parseInt(inputBox.value);
      value = isNaN(value) ? 1 : value;
  
      // Execute your code here based on the updated quantity value
      console.log("Quantity changed:", value);
    }
  })();
});
