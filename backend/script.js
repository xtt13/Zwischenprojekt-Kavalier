$('#file-upload').change(function() {
    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];
    $('#filename').html(filename);

});

$('#file-upload2').change(function() {
    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];
    $('#filename2').html(filename);

});

//$(body).on('click', '.accordeon-title', function(){

var contents = $('.accordeon-content');
var titles = $('.accordeon-title');

$('body').on('click', ('.accordeon-title'),titles,function(){

  var titles = $('.accordeon-title');
  var contents = $('.accordeon-content');

  var title = $(this);
  contents.filter(':visible').slideUp(function(){
    $(this).prev('.accordeon-title').removeClass('is-opened');
  });

  var content = title.next('.accordeon-content');

  if (!content.is(':visible')) {
    content.slideDown(function(){title.addClass('is-opened');});
  }
});
//});

//
// ACHTUNG BEHEBT BUG MIT JQUERY UND AJAX REQUEST
//
// $(document).on('click', '.accordeon-title', function(){
//   var contents = $('.accordeon-content');
//   var titles = $('.accordeon-title');
//   titles.on('click',function(){
//     var title = $(this);
//     contents.filter(':visible').slideUp(function(){
//       $(this).prev('.accordeon-title').removeClass('is-opened');
//     });
//
//     var content = title.next('.accordeon-content');
//
//     if (!content.is(':visible')) {
//       content.slideDown(function(){title.addClass('is-opened');});
//     }
//   });
// });
//
// ENDE ACHTUNG!

// SEARCH AJAX

$('.search_request').keyup(function () {
    var meinevar = $(this).val();
    $.ajax({
      type: "GET",
      url: 'index.php?site=search&request=' + meinevar,
    })
    .done(function(data, textStatus, jqXhr) {
      //alert('klappt');
      $(".accordeon").replaceWith($(".accordeon", data));
      $(".answer p").replaceWith($(".answer p", data));
      $(".accordeon h3").css("display","none"); //hide
      $(".accordeon h3").each(function (i){
      var me = $(this);
      setTimeout(function(){ $(me).fadeIn(400); }, (30 * i));
      });


    });
});

// ORDERS SHIPPED AJAX
// $('body').on('click', '.button_do', function() {
//   event.preventDefault();
//   $.ajax({
//           url: $(this).attr('href'),
//           method: "get",
//         })
//         .done(function(data, textStatus, jqXhr) {
//           // alert(data);
//           $(".table").replaceWith($(".table", data));
//
//         })
//         .fail(function(jqXhr, textStatus, errorThrown) {
//           // wird bei fehlerhaftem Request ausgeführt
//           alert('KLAPPT NICHT!');
//         });
// });
