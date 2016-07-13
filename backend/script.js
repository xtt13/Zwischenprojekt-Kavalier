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


//##########Charts##########
day_of_order();
hour_of_order();
zip_of_order();
sold_products();
order_payment();
all_sold_products();

function day_of_order(){
  var ctx = document.getElementById("day_of_order");
  var chart_data = $(ctx).data('chart-data');
  var data = {
      labels: chart_data.daynames,
      datasets: [
          {
              label: "Day of Order",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "#D1BCA3",
              borderColor: "#282f43 ",
              borderCapStyle: 'butt',
              borderDash: [],
              borderDashOffset: 0.0,
              borderJoinStyle: 'miter',
              pointBorderColor: "#D1BCA3",
              pointBackgroundColor: "rgb(40,47,67, 1.0)",
              pointBorderWidth: 1,
              pointHoverRadius: 6,
              pointHoverBackgroundColor: "#D1BCA3",
              pointHoverBorderColor: "#282f43 ",
              pointHoverBorderWidth: 2,
              pointRadius: 4,
              pointHitRadius: 10,
              data: chart_data.amount,
          }
      ]
  };
  var myLineChart = new Chart(ctx, {
      type: 'line',
      data: data
  });

}

function hour_of_order(){

  var ctx = document.getElementById("hour_of_order");
  var chart_data = $(ctx).data('chart-data');
  var data = {
      labels:chart_data.hour,
      datasets: [
          {
              label: "Orders per Hour",
              fill: false,
              lineTension: 0.1,
              backgroundColor: "#D1BCA3",
              borderColor: "#282f43 ",
              borderCapStyle: 'butt',
              borderDash: [],
              borderDashOffset: 0.0,
              borderJoinStyle: 'miter',
              pointBorderColor: "#D1BCA3",
              pointBackgroundColor: "rgb(40,47,67, 1.0)",
              pointBorderWidth: 1,
              pointHoverRadius: 6,
              pointHoverBackgroundColor: "#D1BCA3",
              pointHoverBorderColor: "#282f43 ",
              pointHoverBorderWidth: 2,
              pointRadius: 4,
              pointHitRadius: 10,
              data: chart_data.amount,
          }
      ]
  };
  var myLineChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: {
        scales: {
            yAxes: [{
                ticks: {
                    max: 8,
                    min: 0,
                    stepSize: 1
                }
            }]
        }
    }
  });

}

function zip_of_order(){
    var ctx = document.getElementById("zip_of_order");
    var chart_data = $(ctx).data('chart-data');


  var data = {
    labels: chart_data.zip,
    datasets: [
        {
            label: "Orders to zip",
            backgroundColor: "rgba(209, 188, 163, 1.0)",
            borderColor: "#282f43",
            borderWidth: 1,
            hoverBackgroundColor: "rgba(209, 188, 163, 0.7)",
            hoverBorderColor: "",
            data: chart_data.amount,
        }
    ]
}
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    scales: {
        yAxes: [{
            ticks: {
                max: 5,
                min: 0,
                stepSize: 1
            }
        }]
    }
}

});
}

function sold_products(){

  var ctx = document.getElementById("sold_products");
  var chart_data = $(ctx).data('chart-data');

  var data = {
    labels: chart_data.product_name,
    datasets: [
        {
            data: chart_data.amount,
            backgroundColor: [

                "#282f43",
                '#000000',
                "#D1BCA3"
            ],
            hoverBackgroundColor: [
                "rgba(40,47,67, 0.7)",
                "rgba(0,0,0,0.7)",
                "rgba(209, 188, 163, 0.7)"
            ]
        }]
};

  var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: data,

});
}

function order_payment(){
  var ctx = document.getElementById("order_payment");
  var chart_data = $(ctx).data('chart-data');

  var data = {
    labels: chart_data.payment_name,
    datasets: [
        {
            data: chart_data.amount,
            backgroundColor: [

                "#282f43",
                '#000000',
                "#D1BCA3"
            ],
            hoverBackgroundColor: [
                "rgba(40,47,67, 0.7)",
                "rgba(0,0,0,0.7)",
                "rgba(209, 188, 163, 0.7)"
            ]
        }]
};

  var myPieChart = new Chart(ctx,{
    type: 'pie',
    data: data,

});

}
function all_sold_products(){
  var ctx = document.getElementById("all_sold_products");
  var chart_data = $(ctx).data('chart-data');

  var data = {
    labels: chart_data.product_name,
    datasets: [
        {
            label: "Orders to zip",
            backgroundColor: "rgba(209, 188, 163, 1.0)",
            borderColor: "#282f43",
            borderWidth: 1,
            hoverBackgroundColor: "rgba(209, 188, 163, 0.7)",
            hoverBorderColor: "",
            data: chart_data.amount,
        }
    ]
}
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    scales: {
        yAxes: [{
            ticks: {
                max: 60,
                min: 0,
                stepSize: 10
            }
        }]
    }
}

});


};
