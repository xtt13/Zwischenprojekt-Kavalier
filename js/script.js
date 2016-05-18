/*jshint sub:true*/

jQuery(document).ready(function($) {

    $('.detail-select').on('change', function() {
     document.forms[myFormName].submit();
  });

  // SMOOTH ANCHOR SCROLLING

  $(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000);
          return false;
        }
      }
    });
  });

  $(".add-to-bag").click(function() {
      $('.cart p').html(function(i, val) { return +val+1; });
  });

  // MOBILE MENU

  $('.nav-icon').click(function(){

    $('header ul').toggleClass('open');
    $('header nav').toggleClass('open');
    $('.nav-icon').toggleClass('open');


  });

  // SLIDER

  $(".control_next").click(function(event) {
  event.preventDefault();
  });

  $(".control_prev").click(function(event) {
  event.preventDefault();
  });

  var slideCount = $('#slider ul li').length;
  var slideWidth = $('#slider ul li').width();
  var slideHeight = $('#slider ul li').height();
  var sliderUlWidth = slideCount * slideWidth;

  $('#slider').css({
    width: slideWidth,
    height: slideHeight
  });

  $('#slider ul').css({
    width: sliderUlWidth,
    marginLeft: -slideWidth
  });

  $('#slider ul li:last-child').prependTo('#slider ul');

  function moveLeft() {
    $('.slider-image').removeClass('slider-image-zoom');
    $('#slider ul').animate({
      left: +slideWidth
    }, 550, function() {
      $('#slider ul li:last-child').prependTo('#slider ul');
      $('#slider ul').css('left', '');
      $('.slider-image').addClass('slider-image-zoom');
    });
  }

  function moveRight() {
    $('.slider-image').removeClass('slider-image-zoom');
    $('#slider ul').animate({
      left: -slideWidth
    }, 550, function() {
      $('#slider ul li:first-child').appendTo('#slider ul');
      $('#slider ul').css('left', '');
      $('.slider-image').addClass('slider-image-zoom');
    });
  }

  $('a.control_prev').click(function() {
    moveLeft();
  });

  $('a.control_next').click(function() {
    moveRight();
  });

  // FORM VALIDATION REGISTER

  $('.register-email').on('input', function() {
    var input = $(this);
    var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var is_email = re.test(input.val());
    if (is_email) {
      input.removeClass("invalid").addClass("valid");
      $(".error-message").html("");
      $(".error").removeClass("error-message error-message-register-email");
    } else {
      input.removeClass("valid").addClass("invalid");
      $('.error').attr('class', 'error');
      $(".error").addClass("error-message error-message-register-email");
      $(".error-message").html("<p>We need your email!</p>");
    }
  });

  $('.register-password').on('input', function() {
    var input = $(this);
    var re = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$$/;
    var is_email = re.test(input.val());
    if (is_email) {
      input.removeClass("invalid").addClass("valid");
      $(".error-message").html("");
      $(".error").removeClass("error-message error-message-register-password");
    } else {
      input.removeClass("valid").addClass("invalid");
      $('.error').attr('class', 'error');
      $(".error").addClass("error-message error-message-register-password");
      $(".error-message").html("<p>1. Password will contain at least 1 upper case letter <br>2. Password will contain at least 1 lower case letter <br> 3. Password will contain at least 1 number or special character <br> 4. Password will contain at least 8 charcters in length </p>");
    }
  });

  $('.register-password-again').on('input', function() {
    var input = $(this);

    if (input.val() == $('.register-password').val() && input.val() !== "") {
      input.removeClass("invalid").addClass("valid");
      $(".error-message").html("");
      $(".error").removeClass("error-message error-message-register-password-again");
    } else {
      input.removeClass("valid").addClass("invalid");
      $('.error').attr('class', 'error');
      $(".error").addClass("error-message error-message-register-password-again");
      $(".error-message").html("<p>Unequal Passwords</p>");
    }
  });


  $('.register-name').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
      $(".error-message").html("");
      $(".error").removeClass("error-message error-message-register-name");
    } else {
      input.removeClass("valid").addClass("invalid");
      $('.error').attr('class', 'error');
      $(".error").addClass("error-message error-message-register-name");
      $(".error-message").html("<p>We need your name!</p>");
    }
  });

  $('.register-zip').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $('.register-country').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $('.register-adress').on('input', function() {
    var input = $(this);
    var re = /^([A-ZÄÖÜ][a-zäöüß]+(([.] )|( )|([-])))+[1-9][0-9]{0,3}[a-z]?$/;
    var is_email = re.test(input.val());
    if (is_email) {
      input.removeClass("invalid").addClass("valid");
      $(".error-message").html("");
      $(".error").removeClass("error-message error-message-register-adress");
    } else {
      input.removeClass("valid").addClass("invalid");
      $('.error').attr('class', 'error');
      $(".error").addClass("error-message error-message-register-adress");
      $(".error-message").html("<p>We need your streetname + number!</p>");
    }
  });

  // FORM VALIDATION SHIPPINGINFORMATION

  $('.shipping-adress').on('input', function() {
    var input = $(this);
    var re = /^([A-ZÄÖÜ][a-zäöüß]+(([.] )|( )|([-])))+[1-9][0-9]{0,3}[a-z]?$/;
    var is_email = re.test(input.val());
    if (is_email) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $('.shipping-zip').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $('.shipping-country').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $('.invoice-adress').on('input', function() {
    var input = $(this);
    var re = /^([A-ZÄÖÜ][a-zäöüß]+(([.] )|( )|([-])))+[1-9][0-9]{0,3}[a-z]?$/;
    var is_email = re.test(input.val());
    if (is_email) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $('.invoice-zip').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });

  $('.invoice-country').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });




  // ALTERNATIVE INVOICEADRESS

  function shippingchecked() {
    $('.invoice-adress').toggleClass('shippingchecked');
    $('.invoice-country').toggleClass('shippingchecked');
    $('.invoice-zip').toggleClass('shippingchecked');

    $('.invoice-adress').toggleClass('invoice-adress-black');
    $('.invoice-country').toggleClass('invoice-country-black');
    $('.invoice-zip').toggleClass('invoice-zip-black');

    $('.invoice-adress').removeClass('invalid valid');
    $('.invoice-country').removeClass('invalid valid');
    $('.invoice-zip').removeClass('invalid valid');

    var invoiceadress = $(".invoice-adress").attr("disabled");
    var invoicecountry = $(".invoice-country").attr("disabled");
    var invoicezip = $(".invoice-zip").attr("disabled");


    if (invoiceadress == "disabled") {
      $(".invoice-adress").prop("disabled", false);
    } else {
      $(".invoice-adress").prop("disabled", true);
      $(".invoice-adress").val('');
    }

    if (invoicecountry == "disabled") {
      $(".invoice-country").prop("disabled", false);
    } else {
      $(".invoice-country").prop("disabled", true);
      $(".invoice-country").val('');
    }

    if (invoicezip == "disabled") {
      $(".invoice-zip").prop("disabled", false);
    } else {
      $(".invoice-zip").prop("disabled", true);
      $(".invoice-zip").val('');
    }
  }

  $('.shipping-alternative').click(function() {
    shippingchecked();
  });

  // $('.bag-delete').click(function() {
  //   event.preventDefault();
  //   var id = $(this).data("id");
  //   $.ajax({
  //           url: "index.php?site=bag",
  //           method: "get",
  //           data: {
  //             action: 'delete',
  //             id: id
  //           }
  //         })
  //         .done(function(data, textStatus, jqXhr) {
  //           // alert(data);
  //           $("form").replaceWith($("form", data));
  //           //$(this).closest('tr').fadeOut("slow");
  //           //$('.content_header').html(data);
  //         })
  //         .fail(function(jqXhr, textStatus, errorThrown) {
  //           // wird bei fehlerhaftem Request ausgeführt
  //           alert('KLAPPT NICHT!');
  //         });
  // });

  $('.bag-delete').click(function() {
    $(this).closest('tr').animate({ opacity: 0.25},400, function() {
         event.preventDefault();
         var id = $(this).data("id");
         $.ajax({
                 url: "index.php?site=bag",
                 method: "get",
                 data: {
                   action: 'delete',
                   id: id
                 }
               })
               .done(function(data, textStatus, jqXhr) {
                 alert('Klappt');
                 $("form").replaceWith($("form", data));
                 //$(this).closest('tr').fadeOut("slow");
                 //$('.content_header').html(data);
               })
               .fail(function(jqXhr, textStatus, errorThrown) {
                 // wird bei fehlerhaftem Request ausgeführt
                 alert('KLAPPT NICHT!');
               });
    });
  });



  //$(this).closest('tr').fadeOut("slow");
  //$(this).closest('tr').prev().fadeOut("slow");

  $(".bag-delete").hover(
  function() {
    $(this).css("background-image", "url('css/images/bag-delete-click.svg')");
  }, function() {
    $(this).css("background-image", "url('css/images/bag-delete.svg')");
  });

});
