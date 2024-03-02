jQuery(document).ready(function ($) {
  jQuery(".header_burger ").click(function (event) {
    jQuery('.header_burger,.main-menu').toggleClass('active');
    jQuery('body').toggleClass('lock');
  });
  jQuery("#tashkent-region").hover(function (event) {
    jQuery('.map-tooltip').toggleClass('active');

  });
  jQuery(".uzb").click(function (event) {
    event.preventDefault();
    jQuery('.uzb').addClass("active");
    jQuery('.world').removeClass("active")
    jQuery('.calc-form-2').addClass("hidden-form").removeClass("show-form");
    jQuery('.calc-form').removeClass("hidden-form").addClass("show-form");
  });
  jQuery(".world").click(function (event) {
    event.preventDefault();
    jQuery('.world').addClass("active");
    jQuery('.uzb').removeClass("active")
    jQuery('.calc-form-2').removeClass("hidden-form").addClass("show-form");
    jQuery('.calc-form').removeClass("show-form").addClass("hidden-form")
  });
  //check kg or tonna range slider
  jQuery(".kg").click(function (event) {
    event.preventDefault();
    jQuery('.kg').addClass("active");
    jQuery('.tn').removeClass("active")
    jQuery('.tnr').addClass("hidden-form").removeClass("show-form");
    jQuery('.kgr').removeClass("hidden-form").addClass("show-form");
  });
  jQuery(".tn").click(function (event) {
    event.preventDefault();
    jQuery('.tn').addClass("active");
    jQuery('.kg').removeClass("active")
    jQuery('.tnr').removeClass("hidden-form").addClass("show-form");
    jQuery('.kgr').removeClass("show-form").addClass("hidden-form")
  });

  jQuery('input[name="kubik"]:radio').click(function () {
    switch (jQuery(this).val()) {
      case "kub":
        jQuery('.img-2').addClass("dnone").removeClass("dblock");
        jQuery('.img-1').removeClass("dnone").addClass("dblock");
        jQuery('.eni').addClass("dblock").removeClass("dnone");
        break;
      case "rulon":
        jQuery('.img-2').removeClass("dnone").addClass("dblock");
        jQuery('.img-1').addClass("dnone").removeClass("dblock");
        jQuery('.eni').addClass("dnone").removeClass("dblock");
        break;
    }
  });
  jQuery(".footer-top h4").click(function () {
    jQuery(this).parent(".foot-menu").toggleClass("open");
    jQuery('html, body').animate({ scrollTop: jQuery(this).offset().top - 170 }, 700);
  });
  jQuery('.phone-mask').mask('+998(00) 000 0000');
  jQuery('.open-popup-link').magnificPopup({
    type: 'inline',
    midClick: true
  });
  //news block adaptive height
  jQuery('.news-gallery').each(function () {
    var highestBox = 0;
    jQuery('.news-body ', this).each(function () {
      if (jQuery(this).height() > highestBox) {
        highestBox = $(this).height();
      }
    });
    jQuery('.news-body ', this).height(highestBox);
  });

  var valueBubble = '<output class="rangeslider__value-bubble" />';

  function updateValueBubble(pos, value, context) {
    pos = pos || context.position;
    value = value || context.value;
    var $valueBubble = $('.rangeslider__value-bubble', context.$range);
    var tempPosition = pos + context.grabPos;
    var position = (tempPosition <= context.handleDimension) ? context.handleDimension : (tempPosition >= context.maxHandlePos) ? context.maxHandlePos : tempPosition;

    if ($valueBubble.length) {
      $valueBubble[0].style.left = Math.ceil(position) + 'px';
      $valueBubble[0].innerHTML = value + ' kun';
    }
  };
  jQuery('.dayRange').rangeslider({
    polyfill: false,
    onInit: function () {
      this.$range.append($(valueBubble));
      updateValueBubble(null, null, this);
    },
    onSlide: function (pos, value) {
      updateValueBubble(pos, value, this);
    }
  });
  var valueBubble2 = '<output class="rangeslider__value-bubble" />';

  function updateValueBubble2(pos, value, context) {
    pos = pos || context.position;
    value = value || context.value;
    var $valueBubble2 = $('.rangeslider__value-bubble', context.$range);
    var tempPosition = pos + context.grabPos;
    var position = (tempPosition <= context.handleDimension) ? context.handleDimension : (tempPosition >= context.maxHandlePos) ? context.maxHandlePos : tempPosition;

    if ($valueBubble2.length) {
      $valueBubble2[0].style.left = Math.ceil(position) + 'px';
      $valueBubble2[0].innerHTML = value + ' kg';
    }
  };
  jQuery('.kgrange').rangeslider({
    polyfill: false,
    onInit: function () {
      this.$range.append($(valueBubble2));
      updateValueBubble2(null, null, this);
    },
    onSlide: function (pos, value) {
      updateValueBubble2(pos, value, this);
    }
  });
  var valueBubble3 = '<output class="rangeslider__value-bubble" />';

  function updateValueBubble3(pos, value, context) {
    pos = pos || context.position;
    value = value || context.value;
    var $valueBubble3 = $('.rangeslider__value-bubble', context.$range);
    var tempPosition = pos + context.grabPos;
    var position = (tempPosition <= context.handleDimension) ? context.handleDimension : (tempPosition >= context.maxHandlePos) ? context.maxHandlePos : tempPosition;

    if ($valueBubble3.length) {
      $valueBubble3[0].style.left = Math.ceil(position) + 'px';
      $valueBubble3[0].innerHTML = value + ' tn';
    }
  };
  jQuery('.tnrange').rangeslider({
    polyfill: false,
    onInit: function () {
      this.$range.append($(valueBubble3));
      updateValueBubble3(null, null, this);
    },
    onSlide: function (pos, value) {
      updateValueBubble3(pos, value, this);
    }
  });
  var valueBubble4 = '<output class="rangeslider__value-bubble" />';

  function updateValueBubble4(pos, value, context) {
    pos = pos || context.position;
    value = value || context.value;
    var $valueBubble4 = $('.rangeslider__value-bubble', context.$range);
    var tempPosition = pos + context.grabPos;
    var position = (tempPosition <= context.handleDimension) ? context.handleDimension : (tempPosition >= context.maxHandlePos) ? context.maxHandlePos : tempPosition;

    if ($valueBubble4.length) {
      $valueBubble4[0].style.left = Math.ceil(position) + 'px';
      $valueBubble4[0].innerHTML = value + ' m<em>3</em>';
    }
  };
  jQuery('.wght').rangeslider({
    polyfill: false,
    onInit: function () {
      this.$range.append($(valueBubble3));
      updateValueBubble4(null, null, this);
    },
    onSlide: function (pos, value) {
      updateValueBubble4(pos, value, this);
    }
  });
  //project-slide
  // jQuery('.slider-for').slick({
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   arrows: false,
  //   adaptiveHeight: true,
  //   asNavFor: '.slider-nav'
  // });
  // jQuery('.slider-nav').slick({
  //   slidesToShow: 4,
  //   slidesToScroll: 1,
  //   asNavFor: '.slider-for',
  //   centerMode: true,
  //   focusOnSelect: true
  // });

  var numSlick = 0;
  jQuery('.slider-for').each(function () {
    numSlick++;
    jQuery(this).addClass('slider-' + numSlick).slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      adaptiveHeight: true,
      asNavFor: '.slider-nav.slider-' + numSlick
    });
  });

  numSlick = 0;
  jQuery('.slider-nav').each(function () {
    numSlick++;
    jQuery(this).addClass('slider-' + numSlick).slick({
      vertical: false,
      centerMode: true,
      centerPadding: '0px',
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '.slider-for.slider-' + numSlick,
      arrow: false,
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 3,
          }
        }
      ]
    });
  });

});
const swiper = new Swiper('.main-slide', {
  direction: 'horizontal',
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});
const swiper2 = new Swiper('.slayd', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  navigation: {
    nextEl: '.icon-right',
    prevEl: '.icon-left',
  }
});
const swiper3 = new Swiper(".testimonials", {
  direction: 'horizontal',
  slidesPerView: 3,
  grabCursor: true,
  breakpoints: {
    1366: {
      slidesPerView: 3,
      spaceBetween: 30,
      grabCursor: true,
    },
    1024: {
      slidesPerView: 2,
      spaceBetween: 30,
      grabCursor: true,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 30,
      grabCursor: true,
    },
    375: {
      slidesPerView: 1,
      spaceBetween: 30,
      grabCursor: true,
    },
    360: {
      slidesPerView: 1,
      spaceBetween: 30,
      grabCursor: true,
    },
  },
  navigation: {
    nextEl: '.icon-right',
    prevEl: '.icon-left',
  },
});
// jQuery(".show-image").click(function (event) {
//   event.preventDefault();
//   var mainImage = jQuery(this).index();
//   jQuery('.images img').removeClass('active');
//   jQuery('.images img').eq(mainImage).addClass('active');
// });
// jQuery(".show-image").click(function (event) {
//   event.preventDefault();
//   var mainImage = jQuery(this).index();
//   jQuery('.thumbs a').removeClass('active');
//   jQuery('.thumbs a').eq(mainImage).addClass('active');
// });
// jQuery(".show-image-2").click(function (event) {
//   event.preventDefault();
//   var mainImage = jQuery(this).index();
//   jQuery('.images-2 img').removeClass('active');
//   jQuery('.images-2 img').eq(mainImage).addClass('active');
// });
// jQuery(".show-image-2").click(function (event) {
//   event.preventDefault();
//   var mainImage = jQuery(this).index();
//   jQuery('.thumbs-2 a').removeClass('active');
//   jQuery('.thumbs-2 a').eq(mainImage).addClass('active');
// });

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == (x.length - 1)) {
    document.getElementById("submitBtn").style.display = "inline";
    document.getElementById("nextBtn").style.display = "none";
  } else {
    //document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("calcForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}