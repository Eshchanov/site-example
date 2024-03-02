jQuery(document).ready(function ($) {
  jQuery(".header_burger ").click(function (event) {
    jQuery('.header_burger,.main-menu').toggleClass('active');
    jQuery('body').toggleClass('lock');
  });
  jQuery("#tashkent-region").click(function (event) {
    jQuery('.map-tooltip').toggleClass('active');
    jQuery("#tashkent-region").toggleClass('active');
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
  jQuery('.open-succes-link').magnificPopup({
    type: 'inline',
    midClick: true
  });
  jQuery('.open-service-link').magnificPopup({
    type: 'inline',
    midClick: true
  });
  //news block adaptive height
  // jQuery('.news-gallery').each(function () {
  //   var highestBox = 0;
  //   jQuery('.news-body ', this).each(function () {
  //     if (jQuery(this).height() > highestBox) {
  //       highestBox = $(this).height();
  //     }
  //   });
  //   jQuery('.news-body ', this).height(highestBox);
  // });

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
// const swiper = new Swiper('.main-slide', {
//   direction: 'horizontal',
//   loop: true,
//   autoplay: {
//     delay: 10000,
//     disableOnInteraction: false,
//   },
//   pagination: {
//     el: '.swiper-pagination',
//     clickable: true,
//   },
// });
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
  if (x.length){
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

const token = '2101495086:AAGcZYeTP6Cd7kRLaqF_sF_S9GaXW4F9-Lo';
const chatId = -1001617440468;
$(document).ready(function (){
  let sendMessage = (name, phone, type, data = null) => {
    if (data) {
      let text = `Yangi Foydalanuvchi! 
%0A%0AIsm: ${name}
%0ATelefon: ${phone} 
%0AQaysi formadan: ${type} 
%0AMa\'lumotlar: ${data}

%0A%0ATezroq qong'iroq qiling! Xaridor sizning qong'iroq qilishingizni kutmoqda!`;
      $.get(`https://api.telegram.org/bot${token}/sendMessage?chat_id=${chatId}&text=${text}`, function( result ) {
        console.log(result)
      });
    } else {
      let text = `Yangi Foydalanuvchi! 
%0A%0AIsm: ${name}
%0ATelefon: ${phone}
%0AQaysi formadan: ${type}

%0A%0ATezroq qong'iroq qiling! Xaridor sizning qong'iroq qilishingizni kutmoqda!`;
      $.get(`https://api.telegram.org/bot${token}/sendMessage?chat_id=${chatId}&text=${text}`);
    }
  }
  $("#popup button").on('click', function (event) {
    event.preventDefault();
    let name = $("#popup input[name='name']").val();
    let phone = $("#popup input[name='phone']").val();
    let type = $("#popup input[name='type']").val();
    let comment = $("#popup textarea[name='question']").val();
    let data = `%0ASavolgizni yozing: ${comment}`
    if (!name || !phone || !data) {
      $("#popup .help-box").css({'display':'block'});
    } else {
      $("#popup .help-box").css({'display':'none'});
      $("#popup .submiter").css({'display':'none'});
      $("#popup .loader").css({'display':'block'});
      setTimeout(function () {
        $("#popup .loader").css({'display':'none'});
        $("#popup .submited").css({'display':'block'});
      }, 2000);
      sendMessage(name, phone, type, data);
      $("#popup input[name='name']").val("");
      $("#popup input[name='phone']").val("");
      $("#popup textarea[name='question']").val("");
    }
    $('.mfp-close').on('click', function () {
      $("#popup .submited").css({'display':'none'});
      $("#popup .loader").css({'display':'none'});
      $("#popup .submiter").css({'display':'block'});
    });
  });
  $(".form-contract button").on('click', function (event) {
    event.preventDefault();
    let name = $(".form-contract input[name='name']").val();
    let phone = $(".form-contract input[name='phone']").val();
    let type = $(".form-contract input[name='type']").val();
    let surname = $(".form-contract input[name='surname']").val();
    let patronymic = $(".form-contract input[name='patronymic']").val();
    let companyname = $(".form-contract input[name='companyname']").val();
    let city = $(".form-contract input[name='city']").val();
    let where2 = $(".form-contract input[name='where-2']").val();
    const services = [$(".form-contract input[name='services[]']").val()];
    let nWeight = $(".form-contract input[name='n-weight']").val();
    let lWeight = $(".form-contract input[name='l-weight']").val();
    let shortInfo = $(".form-contract textarea[name='short-info']").val();
    let data = `%0AFamilya: ${surname}
    %0AOtasining ismi: ${patronymic}
    %0AKompaniya nomi: ${companyname}
    %0AQaysi shahardan: ${city}
    %0AManzili: ${where2}
    %0AQaysi xizmat turidan foydalanmoqchi: ${services}
    %0AYukning kutilayotgan og’irligi: ${nWeight}
    %0AYukning kutilayotgan hajmi: ${lWeight}
    %0AYuk xarakeristikasi tog’risida qisqacha ma’lumot: ${shortInfo}`;
    if (!name || !phone || !data) {
      $(".form-contract .help-box").css({'display':'block'});
    } else {
      $(".form-contract .help-box").css({'display':'none'});
      $(".open-succes-link").click();
      sendMessage(name, phone, type, data);
      $(".form-contract input[name='name']").val("");
      $(".form-contract input[name='phone']").val("");
      $(".form-contract input[name='type']").val("");
      $(".form-contract input[name='surname']").val("");
      $(".form-contract input[name='patronymic']").val("");
      $(".form-contract input[name='companyname']").val("");
      $(".form-contract input[name='city']").val("");
      $(".form-contract input[name='where-2']").val("");
      $(".form-contract input[name='n-weight']").val("");
      $(".form-contract input[name='l-weight']").val("");
      $(".form-contract textarea[name='short-info']").val("");
    }
  });
  $(".form-complaint button").on('click', function (event) {
    let name = $(".form-complaint input[name='name']").val();
    let phone = $(".form-complaint input[name='phone']").val();
    let type = $(".form-complaint input[name='type']").val();
    let comment = $(".form-complaint textarea[name='short-info']").val();
    let data = `%0AShikoyat yoki taklifingiz: ${comment}`;
    if (!name || !phone || !data) {
      $(".form-complaint .help-box").css({'display':'block'});
    } else {
      $(".form-complaint .help-box").css({'display': 'none'});
      $(".open-succes-link").click();
      sendMessage(name, phone, type, data);
      $(".form-complaint input[name='name']").val("");
      $(".form-complaint input[name='phone']").val("");
      $(".form-complaint input[name='type']").val("");
      $(".form-complaint textarea[name='short-info']").val("");
    }
  });
  $('.calc-form input[name="courier"]').on('click', function () {
    let courier = $(this).val();
    let couriers = $('.calc-form input[name="courier-plus"]');
    if (this.checked) {
      if (couriers.val().length > 3){
        couriers.val(couriers.val() + ', ' + courier)
      } else {
        couriers.val(couriers.val() + courier)
      }
    } else {
      if (couriers.val().search(', ' + courier)){
        couriers.val(couriers.val().replace(', ' + courier, ''))
      } else {
        couriers.val(couriers.val().replace(courier, ''))
      }
    }
    console.log(couriers.val());
  });
  $('.calc-form input[name="danger"]').on('click', function () {
    let danger = $(this).val();
    let dangers = $('.calc-form input[name="danger-plus"]');
    if (this.checked) {
      if (dangers.val().length > 3){
        dangers.val(dangers.val() + ', ' + danger)
      } else {
        dangers.val(dangers.val() + danger)
      }
    } else {
      if (dangers.val().search(', ' + danger)){
        dangers.val(dangers.val().replace(', ' + danger, ''))
      } else {
        dangers.val(dangers.val().replace(danger, ''))
      }
    }
    console.log(dangers.val());
  });
  $(".calc-form button").on('click', function (event) {
    let name = $(".calc-form input[name='name']").val();
    let phone = $(".calc-form input[name='phone']").val();
    let type = $(".calc-form input[name='type']").val();
    let servis = $(".calc-form select[name='servis']").val();
    let where = $(".calc-form input[name='where']").val();
    let where2 = $(".calc-form input[name='where-2']").val();
    let dangers = $('.calc-form input[name="danger-plus"]').val();
    let couriers = $('.calc-form input[name="courier-plus"]').val();
    let quantity = $(".calc-form input[name='quantity']").val();
    let kubik = $(".calc-form input[name='kubik']").val();
    let width = $(".calc-form input[name='width']").val();
    let height = $(".calc-form input[name='height']").val();
    let length = $(".calc-form input[name='length']").val();
    let data = `%0AQaysi xizmat turidan foydalanmoqchi: ${servis}
    %0AQayerdan: ${where}
    %0AQayerga: ${where2}
    %0AJo'natma og'irligi: ${quantity}
    %0AKuryer xizmati: ${couriers}
    %0AKub yoki rulon: ${kubik}
    %0AUzunligi: ${width}
    %0ABalandligi: ${height}
    %0AEni: ${length}
    %0AXavfli yuk yoki katta hajmdagi yuk: ${dangers}`;
    if (!name || !phone || !data) {
      $(".calc-form .help-box").css({'display':'block'});
    } else {
      $(".calc-form .help-box").css({'display': 'none'});
      $(".open-succes-link").click();
      sendMessage(name, phone, type, data);
      $(".calc-form input[name='name']").val("");
      $(".calc-form input[name='phone']").val("");
      $(".calc-form input[name='type']").val("");
      $(".calc-form select[name='servis']").val("");
      $(".calc-form input[name='where']").val("");
      $(".calc-form input[name='where-2']").val("");
      $(".calc-form input[name='quantity']").val("");
      $(".calc-form input[name='kubik']").val("");
      $(".calc-form input[name='width']").val("");
      $(".calc-form input[name='height']").val("");
      $(".calc-form input[name='length']").val("");
    }
  });
  $('.calc-form-2 input[name="courier2"]').on('click', function () {
    let courier = $(this).val();
    let couriers = $('.calc-form input[name="courier-plus2"]');
    if (this.checked) {
      if (couriers.val().length > 3){
        couriers.val(couriers.val() + ', ' + courier)
      } else {
        couriers.val(couriers.val() + courier)
      }
    } else {
      if (couriers.val().search(', ' + courier)){
        couriers.val(couriers.val().replace(', ' + courier, ''))
      } else {
        couriers.val(couriers.val().replace(courier, ''))
      }
    }
    console.log(couriers.val());
  });
  $('.calc-form-2 input[name="danger2"]').on('click', function () {
    let danger = $(this).val();
    let dangers = $('.calc-form input[name="danger-plus2"]');
    if (this.checked) {
      if (dangers.val().length > 3){
        dangers.val(dangers.val() + ', ' + danger)
      } else {
        dangers.val(dangers.val() + danger)
      }
    } else {
      if (dangers.val().search(', ' + danger)){
        dangers.val(dangers.val().replace(', ' + danger, ''))
      } else {
        dangers.val(dangers.val().replace(danger, ''))
      }
    }
    console.log(dangers.val());
  });
  $(".calc-form-2 button").on('click', function (event) {
    let name2 = $(".calc-form-2 input[name='name2']").val();
    let phone2 = $(".calc-form-2 input[name='phone2']").val();
    let type2 = $(".calc-form-2 input[name='type2']").val();
    let servis2 = $(".calc-form-2 select[name='servis2']").val();
    let country = $(".calc-form-2 input[name='country']").val();
    let country2 = $(".calc-form-2 input[name='country2']").val();
    let where2 = $(".calc-form-2 input[name='where2']").val();
    let where2Two = $(".calc-form-2 input[name='where-2-2']").val();
    let dangers2 = $('.calc-form-2 input[name="danger-plus2"]').val();
    let couriers2 = $('.calc-form-2 input[name="courier-plus2"]').val();
    let quantity2 = $(".calc-form-2 input[name='quantity2']").val();
    let kubik2 = $(".calc-form-2 input[name='kubik2']").val();
    let width2 = $(".calc-form-2 input[name='width2']").val();
    let height2 = $(".calc-form-2 input[name='height2']").val();
    let length2 = $(".calc-form-2 input[name='length2']").val();
    let data = `%0AQaysi xizmat turidan foydalanmoqchi: ${servis2}
    %0AQaysi davlatdan: ${country}
    %0AQaysi davlatga: ${country2}
    %0AQaysi shaxardan: ${where2}
    %0AQaysi shaxarga: ${where2Two}
    %0AJo'natma og'irligi: ${quantity2}
    %0AKuryer xizmati: ${couriers2}
    %0AKub yoki rulon: ${kubik2}
    %0AUzunligi: ${width2}
    %0ABalandligi: ${height2}
    %0AEni: ${length2}
    %0AXavfli yuk yoki katta hajmdagi yuk: ${dangers2}`;
    if (!name2 || !phone2 || !data) {
      $(".calc-form-2 .help-box").css({'display':'block'});
    } else {
      $(".calc-form-2 .help-box").css({'display': 'none'});
      $(".open-succes-link").click();
      sendMessage(name2, phone2, type2, data);
      $(".calc-form-2 input[name='name2']").val("");
      $(".calc-form-2 input[name='phone2']").val("");
      $(".calc-form-2 input[name='type']").val("");
      $(".calc-form-2 select[name='servis2']").val("");
      $(".calc-form-2 input[name='where2']").val("");
      $(".calc-form-2 input[name='where-2-2']").val("");
      $(".calc-form-2 input[name='quantity2']").val("");
      $(".calc-form-2 input[name='kubik2']").val("");
      $(".calc-form-2 input[name='width2']").val("");
      $(".calc-form-2 input[name='height2']").val("");
      $(".calc-form-2 input[name='length2']").val("");
    }
  });
  $("#service button").on('click', function (event) {
    event.preventDefault();
    let name = $("#service input[name='name']").val();
    let phone = $("#service input[name='phone']").val();
    let type = $("#service input[name='type']").val();
    if (!name || !phone) {
      $("#service .help-box").css({'display':'block'});
    } else {
      $("#service .help-box").css({'display':'none'});
      $("#service .submiter").css({'display':'none'});
      $("#service .loader").css({'display':'block'});
      setTimeout(function () {
        $("#service .loader").css({'display':'none'});
        $("#service .submited").css({'display':'block'});
      }, 2000);
      sendMessage(name, phone, type);
      $("#service input[name='name']").val("");
      $("#service input[name='phone']").val("");
    }
    $('.mfp-close').on('click', function () {
      $("#service .submited").css({'display':'none'});
      $("#service .loader").css({'display':'none'});
      $("#service .submiter").css({'display':'block'});
    });
  });
});