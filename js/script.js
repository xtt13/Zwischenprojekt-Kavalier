// Weiß nicht mehr warum, aber das soll glaub ich stehen bleiben :'D
/*jshint sub:true*/

jQuery(document).ready(function($) {

// Beim Ändern der Selectbox im Detailbereich
$('.detail-select').on('change', function() {
   document.forms[myFormName].submit();
});

// Fade in wenn die Klasse .hideme erreicht ist inkl. ,dass es nicht auf Handys angewendet wird.
if (screen && screen.width > 480) {
  $(window).scroll( function(){

    $('.hideme').each( function(i){

        var bottom_of_object = $(this).offset().top + $(this).outerHeight();
        var bottom_of_window = $(window).scrollTop() + $(window).height();

        if( bottom_of_window > bottom_of_object ){
            $(this).animate({'opacity':'1'},800);
        }

      });

    });
} else {
  $('.hideme').removeClass('hideme');
}


  // SMOOTH ANCHOR SCROLLING
  $(function() {

    $('a[href*="#"]:not([href="#"])').click(function() {

      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            if($('.nav-icon').hasClass('open')){

              $(".main-header nav ul li").each(function (i){
                var me = $(this);
                setTimeout(function(){ $(me).fadeOut(500); }, (30 * i));
              });

              setTimeout(function(){
                $('header ul').removeClass('open');
                $('header nav').removeClass('open');
                $('.nav-icon').removeClass('open');
              }, 800);
            }
      });
          return false;
        }
      }
    });
  });

  // MOBILE MENU
  $('.nav-icon').click(function(){
    $('header ul').toggleClass('open');
    $('header nav').toggleClass('open');
    $('.nav-icon').toggleClass('open');
    $(".main-header nav ul li").css("display","none");
    $(".main-header nav ul li").each(function (i){
      var me = $(this);
      setTimeout(function(){ $(me).fadeIn(500); }, (30 * i));
});
  });

  // IMAGE SLIDER
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

  // NEWSLETTER EMAIL VALIDATION
  $('.newsletter-email').on('input', function() {
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

  // NEWSLETTER NAME VALIDATION
  $('.newsletter-name').on('input', function() {
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

  // CONTACT NAME VALIDATION
  $('.contactform-name').on('input', function() {
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

  // CONTACT EMAIL VALIDATION
  $('.contactform-email').on('input', function() {
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

  // CONTACT MESSAGE VALIDATION
  $('.contactform-textarea').on('input', function() {
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

  // REGISTER VALIDATION EMAIL
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

  // REGISTER VALIDATION PASSWORD
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

  // REGISTER VALIDATION PASSWORD AGAIN
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

  // REGISTER VALIDATION AGE
  $('.register-age').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
      $(".error-message").html("");
      $(".error").removeClass("error-message error-message-register-age");
    } else {
      input.removeClass("valid").addClass("invalid");
      $('.error').attr('class', 'error');
      $(".error").addClass("error-message error-message-register-age");
      $(".error-message").html("<p>We need your name!</p>");
    }
  });

  // REGISTER VALIDATION ZIP
  $('.register-zip').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });

  // REGISTER VALIDATION LOCATION
  $('.register-location').on('input', function() {
    var input = $(this);
    var is_name = input.val();
    if (is_name) {
      input.removeClass("invalid").addClass("valid");
    } else {
      input.removeClass("valid").addClass("invalid");
    }
  });

  // REGISTER VALIDATION COUNTRY
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
    $('.invoice-location').toggleClass('shippingchecked');

    $('.invoice-adress').toggleClass('invoice-adress-black');
    $('.invoice-country').toggleClass('invoice-country-black');
    $('.invoice-zip').toggleClass('invoice-zip-black');
    $('.invoice-location').toggleClass('invoice-zip-black');

    $('.invoice-adress').removeClass('invalid valid');
    $('.invoice-country').removeClass('invalid valid');
    $('.invoice-zip').removeClass('invalid valid');
    $('.invoice-location').removeClass('invalid valid');

    var invoiceadress = $(".invoice-adress").attr("disabled");
    var invoicecountry = $(".invoice-country").attr("disabled");
    var invoicezip = $(".invoice-zip").attr("disabled");
    var invoicelocation = $(".invoice-location").attr("disabled");


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

    if (invoicelocation == "disabled") {
      $(".invoice-location").prop("disabled", false);
    } else {
      $(".invoice-location").prop("disabled", true);
      $(".invoice-location").val('');
    }
  }

  $('.shipping-alternative').click(function() {
    shippingchecked();
  });

  // AJAX BAG DELETE
  $('body').on('click', '.bag-delete', function() {
    event.preventDefault();
    $('.cart p').text(parseInt($('.cart p').text()) - 1);
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
            $("form").replaceWith($("form", data));
          })
          .fail(function(jqXhr, textStatus, errorThrown) {
            alert("The Server didnt't answer your request!");
          });
  });

  // AJAY BAG QUANTITY Update

  $('body').on('change', '.bag-select', function() {

    var val = $(this).val();
    var meinevar = $(this).attr('name');
    var test = meinevar + ":" + val;
    var final_url = 'index.php?site=bag&action=update_cart&id=' + meinevar + '&quantity=' + val;

    $.ajax({
            url: final_url,
            method: "get"

          })
          .done(function(data, textStatus, jqXhr) {
            $(".bag-table").replaceWith($(".bag-table", data));
            $(".checkout-wrapper").replaceWith($(".checkout-wrapper", data));
          })
          .fail(function(jqXhr, textStatus, errorThrown) {
            // wird bei fehlerhaftem Request ausgeführt
            alert("The Server didn't answer your request!");
          });

  });





  // END


  $(".control_next").hover(
  function() {
    $(this).css("background-image", "url('css/images/button-right-hover.svg')");
  }, function() {
    $(this).css("background-image", "url('css/images/button-right.svg')");
  });

  $(".control_prev").hover(
  function() {
    $(this).css("background-image", "url('css/images/button-left-hover.svg')");
  }, function() {
    $(this).css("background-image", "url('css/images/button-left.svg')");
  });

  $(".bag-delete").hover(
  function() {
    $(this).css("background-image", "url('css/images/bag-delete-click.svg')");
  }, function() {
    $(this).css("background-image", "url('css/images/bag-delete.svg')");
  });

  var contents = $('.accordeon-content');
  var titles = $('.accordeon-title');
  titles.on('click',function(){
    var title = $(this);
    contents.filter(':visible').slideUp(function(){
    	$(this).prev('.accordeon-title').removeClass('is-opened');
    });

    var content = title.next('.accordeon-content');

    if (!content.is(':visible')) {
      content.slideDown(function(){title.addClass('is-opened');});
    }
  });



    //AJAX SONDERANGEBOTE

    $(".store-checkbox-sonderangebote").on("click", function(){
      //console.log('hoffentlich');
      event.preventDefault();

      if($(this).prop('checked') !== true){
        //console.log('juhu');

        $.ajax({
                url: 'index.php?site=store&action=sale',
                method: "get",
              })
              .done(function(data, textStatus, jqXhr) {
                // alert(data);
                //console.log('request');
                $(".wrapper-products").replaceWith($(".wrapper-products", data));
                $('.store-checkbox').prop('checked', false);
                $('.store-category').removeClass('category-underline');
                //$(this).closest('tr').fadeOut("slow");
                //$('.content_header').html(data);
              })
              .fail(function(jqXhr, textStatus, errorThrown) {
                // wird bei fehlerhaftem Request ausgeführt
                alert('Connection Problems! Please reload the Page!');
              });
          } else {
            //console.log('not checked');
            $('.store-checkbox').prop('checked', true);
          }
    });

    $('.store-category').click(function(){
      $('.store-checkbox').prop('checked', true);
    });




    // AJAX KATHEGORIE
    $('.store-category').click(function() {
      event.preventDefault();
      $(this).addClass('category-underline');
      $('.store-category').not(this).removeClass('category-underline');
      $.ajax({
              url: $(this).attr('href'),
              method: "get",
            })
            .done(function(data, textStatus, jqXhr) {
              // alert(data);
              $(".wrapper-products").replaceWith($(".wrapper-products", data));
              //$(this).closest('tr').fadeOut("slow");
              //$('.content_header').html(data);
            })
            .fail(function(jqXhr, textStatus, errorThrown) {
              // wird bei fehlerhaftem Request ausgeführt
              alert('Connection Problems! Please reload the Page!');
            });
    });



  // AJAX STORE Preis Sortierung
  $('body').on('change', '.select-price', function() {

    var sort = $('.select-price').val();
    var selected_category = $('.category-underline').attr('href');
    var final_url = selected_category + '&sort-price=' + sort;
    //alert(final_url);


    $.ajax({
            url: final_url,
            method: "get",
          })
          .done(function(data, textStatus, jqXhr) {
            // alert(data);
            $(".wrapper-products").replaceWith($(".wrapper-products", data));

            //alert('changed');
          })
          .fail(function(jqXhr, textStatus, errorThrown) {
            // wird bei fehlerhaftem Request ausgeführt
            alert('Connection Problems! Please reload the Page!');
          });

  });

  // AJAX STORE VIEWS
  $('body').on('change', '.select-view', function() {

    var sort = $('.select-view').val();
    var final_url = 'index.php?site=store&page=1&per-page=' + sort;
    //alert(final_url);


    $.ajax({
            url: final_url,
            method: "get",
          })
          .done(function(data, textStatus, jqXhr) {
            // alert(data);
            $(".wrapper-products").replaceWith($(".wrapper-products", data));

            //alert('changed');
          })
          .fail(function(jqXhr, textStatus, errorThrown) {
            // wird bei fehlerhaftem Request ausgeführt
            alert('Connection Problems! Please reload the Page!');
          });

  });

  // AJAX PAGINATATION NUMBER LINKS
  $('body').on('click', '.pagination', function() {
    event.preventDefault();
    $.ajax({
            url: $(this).attr('href'),
            method: "get",
          })
          .done(function(data, textStatus, jqXhr) {
            // alert(data);
            $(".wrapper-products").replaceWith($(".wrapper-products", data));
            $('html, body').animate({scrollTop : 0},600);
            //$(this).closest('tr').fadeOut("slow");
            //$('.content_header').html(data);
          })
          .fail(function(jqXhr, textStatus, errorThrown) {
            // wird bei fehlerhaftem Request ausgeführt
            alert('Connection Problems! Please reload the Page!');
          });
  });

  // AJAX PAGINATATION PREV
  $('body').on('click', '.pagination-prev', function() {
    event.preventDefault();
    $.ajax({
            url: $(this).attr('href'),
            method: "get",
          })
          .done(function(data, textStatus, jqXhr) {
            // alert(data);
            $(".wrapper-products").replaceWith($(".wrapper-products", data));
            $('html, body').animate({scrollTop : 0},600);
            //$(this).closest('tr').fadeOut("slow");
            //$('.content_header').html(data);
          })
          .fail(function(jqXhr, textStatus, errorThrown) {
            // wird bei fehlerhaftem Request ausgeführt
            alert('Connection Problems! Please reload the Page!');
          });
  });

  // AJAX PAGINATATION NEXT
  $('body').on('click', '.pagination-next', function() {
    event.preventDefault();
    $.ajax({
            url: $(this).attr('href'),
            method: "get",
          })
          .done(function(data, textStatus, jqXhr) {
            // alert(data);
            $(".wrapper-products").replaceWith($(".wrapper-products", data));
            $('html, body').animate({scrollTop : 0},600);
            //$(this).closest('tr').fadeOut("slow");
            //$('.content_header').html(data);
          })
          .fail(function(jqXhr, textStatus, errorThrown) {
            // wird bei fehlerhaftem Request ausgeführt
            alert('Connection Problems! Please reload the Page!');
          });
  });


  $('body').on('click', '.add-to-bag', function() {
  $('.cart p').html(function(i, val) {return +val+1; });
  $('.cart p').animate({
    width: '30px',
    height: '30px',

  }, 100, function() {
    $('.cart p').animate({
      width: '20px',
      height: '20px'
    });
  });
});

  // AJAX ADD-TO-BAG
  $('body').on('click', '.add-to-bag', function() {
    event.preventDefault();

    var url = $('.wrapper-detail form').attr('action');
    var quantity = $('.detail-select').val();
    var name = $('.hidden-product-name').val();
    var price = $('.hidden-product-price').val();
    var id = $('.hidden-product-id').val();

    //alert(url + ' ' + quantity);

    $.ajax({
            url: url,
            method: "post",
            data: {
               quantity: quantity,
               product_name: name,
               price: price
             }
          })
          .done(function(data, textStatus, jqXhr) {
            // alert(data);
            $(".wrapper-information").replaceWith($(".wrapper-information", data));

            if($('.quantity-success').length){
              $('.add-to-bag').html('✓');
              $('.add-to-bag').addClass('add-to-bag-success');

              // $('.cart p').html(function(i, val) {return +val+1; });

            } else {

            }

          })
          .fail(function(jqXhr, textStatus, errorThrown) {
            // wird bei fehlerhaftem Request ausgeführt
            alert('Connection Problems! Please reload the Page!');
          });


  });




    // AJAY NEWSLETTER
    $('body').on('click', '.button-newsletter', function() {
    event.preventDefault();

    var name = $('.newsletter-name').val();
    var email = $('.newsletter-email').val();
    var btn = 'set';

    $.ajax({
            url: 'index.php?site=homepage',
            method: "post",
            data: {
              newslettername: name,
              newsletteremail: email,
              newslettersbmt: btn
            }
          })
          .done(function(data, textStatus, jqXhr) {
            //alert(data);
            $(".newsletter").replaceWith($(".newsletter", data));

          })
          .fail(function(jqXhr, textStatus, errorThrown) {
            // wird bei fehlerhaftem Request ausgeführt
            alert('Connection Problems! Please reload the Page!');
          });
  });


  // AJAX CONTACTFORM
  $('body').on('click', '.button-contact', function() {
  event.preventDefault();

  var name = $('.contactform-name').val();
  var email = $('.contactform-email').val();
  var subject = $('.contactform-subject').val();
  var message = $('.contactform-textarea').val();
  var btn = 'set';

  $.ajax({
          url: 'index.php?site=homepage',
          method: "post",
          data: {
            contactname: name,
            contactemail: email,
            contactsubject: subject,
            contactmessage: message,
            contactsbmt: btn
          }
        })
        .done(function(data, textStatus, jqXhr) {
          //alert(data);
          $(".contactform").replaceWith($(".contactform", data));

        })
        .fail(function(jqXhr, textStatus, errorThrown) {
          // wird bei fehlerhaftem Request ausgeführt
          alert('Connection Problems! Please reload the Page!');
        });
});

// Update Accountinformation
$('body').on('click', '.account-update-submit', function() {
event.preventDefault();

var name = $('.register-name').val();
var email = $('.register-email').val();
var adress = $('.register-adress').val();
var zip = $('.register-zip').val();
var location = $('.register-location').val();
var country = $('.register-country').val();
var invoiceadress = $('.invoice-adress').val();
var invoicezip = $('.invoice-zip').val();
var invoicelocation = $('.invoice-location').val();
var invoicecountry = $('.invoice-country').val();
var btn = 'set';

$.ajax({
        url: 'index.php?site=account&action=information',
        method: "post",
        data: {
          name: name,
          email: email,
          adress: adress,
          zip: zip,
          location: location,
          country: country,
          alt_adress: invoiceadress,
          alt_zip: invoicezip,
          alt_location: invoicelocation,
          alt_country: invoicecountry,
          sbmbtn: btn
        }
      })
      .done(function(data, textStatus, jqXhr) {
        //alert(data);
        $(".account-form").replaceWith($(".account-form", data));

      })
      .fail(function(jqXhr, textStatus, errorThrown) {
        // wird bei fehlerhaftem Request ausgeführt
        alert('Connection Problems! Please reload the Page!');
      });
});

// Register User
// $('body').on('click', '.register-submit', function() {
// event.preventDefault();
//
// var name = $('.register-name').val();
// var email = $('.register-email').val();
// var adress = $('.register-adress').val();
// var zip = $('.register-zip').val();
// var location = $('.register-location').val();
// var country = $('.register-country').val();
// var invoiceadress = $('.invoice-adress').val();
// var invoicezip = $('.invoice-zip').val();
// var invoicelocation = $('.invoice-location').val();
// var invoicecountry = $('.invoice-country').val();
// var btn = 'set';
//
// $.ajax({
//         url: 'index.php?site=account&action=information',
//         method: "post",
//         data: {
//           name: name,
//           email: email,
//           adress: adress,
//           zip: zip,
//           location: location,
//           country: country,
//           alt_adress: invoiceadress,
//           alt_zip: invoicezip,
//           alt_location: invoicelocation,
//           alt_country: invoicecountry,
//           sbmbtn: btn
//         }
//       })
//       .done(function(data, textStatus, jqXhr) {
//         //alert(data);
//         $(".account-form").replaceWith($(".account-form", data));
//
//       })
//       .fail(function(jqXhr, textStatus, errorThrown) {
//         // wird bei fehlerhaftem Request ausgeführt
//         alert('Connection Problems! Please reload the Page!');
//       });
// });


});
