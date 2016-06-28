$('#file-upload').change(function() {
    var filepath = this.value;
    var m = filepath.match(/([^\/\\]+)$/);
    var filename = m[1];
    $('#filename').html(filename);

});

//$(body).on('click', '.accordeon-title', function(){

  var contents = $('.accordeon-content');
  var titles = $('.accordeon-title');
  titles.on('click',function(){
  //$(body).on('click', '.accordeon-title', function(){
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


    });
});
