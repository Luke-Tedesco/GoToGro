$(document).ready(function () {
  $.ajax({
    url: "http://localhost/GoToGroTest/HTML/get-salesdata.php",
    type: "GET",
    success: function (data) {
      console.log(data);

      var product_id = [];
      var quantity = [];

      var len = data.length;

      for (var i = len - 1; i >= 0; i--) {
        product_id.push(data[i].product_id);
        quantity.push(data[i].quantity);
      }
      /*
              var chartdata1 = {
                  labels: product_id,
                  datasets: [
                  {
                      label: "BANANA",
                      fill: false,
                      lineTension: 0.1,
                      backgroundColor: "rgba(29, 202, 255, 0.75)",
                      borderColor: "rgba(29, 202, 255, 1)",
                      pointHoverBackgroundColor: "rgba(29, 202, 255, 1)",
                      pointHoverBorderColor: "rgba(29, 202, 255, 1)",
                      data: quantity
                  }
                  ]
              };
                      
              var ctx1 = $("#mycanvas1");
      
              var LineGraph1 = new Chart(ctx1, {
                  type: 'line',
                  data: chartdata1
              });*/

      new Chart(document.getElementById("bar-chart"), {
        type: "bar",
        data: {
          labels: product_id,
          datasets: [
            {
              label: "Products",
              backgroundColor: [
                "#3e95cd",
                "#8e5ea2",
                "#3cba9f",
                "#e8c3b9",
                "#c45850",
                "#3e55cd",
                "#8e3ea2",
                "#3cbc9f",
                "#e8c3b9",
                "#c45850",
                "#3e95cd",
                "#8e5ea2",
                "#3cba9f",
                "#e8c3b9",
                "#c45850",
                "#3e95cd",
                "#8e5ea2",
                "#3cba9f",
                "#e8c3b9",
                "#c45850",
              ],
              data: quantity,
            },
          ],
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: "Product Turnover (7 days)",
          },
          scales: {
            yAxes: [
              {
                scaleLabel: {
                  display: true,
                  labelString: "Quantity",
                },
              },
            ],
            xAxes: [
              {
                scaleLabel: {
                  display: true,
                  labelString: "Product",
                },
              },
            ],
          },
        },
      });
    },
    error: function (data) {},
  });
});

$(document).ready(function () {
  $.ajax({
    url: "http://localhost/GoToGroTest/HTML/get-salesdata2.php",
    type: "GET",
    success: function (data) {
      console.log(data);

      var date = [];
      var sales = [];

      var len = data.length;

      for (var i = len - 1; i >= 0; i--) {
        date.push(data[i].date);
        sales.push(data[i].sales);
      }
      new Chart(document.getElementById("sales_bar-chart"), {
        type: "bar",
        data: {
          labels: date,
          datasets: [
            {
              label: "Sales ($)",
              backgroundColor: [
                "#3e95cd",
                "#8e5ea2",
                "#3cba9f",
                "#e8c3b9",
                "#c45850",
                "#f50537",
                "#334858",
                "#595750",
              ],
              data: sales,
            },
          ],
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: "Sales Summary",
          },
          scales: {
            yAxes: [
              {
                scaleLabel: {
                  display: true,
                  labelString: "Sales ($)",
                },
              },
            ],
            xAxes: [
              {
                scaleLabel: {
                  display: true,
                  labelString: "Date",
                },
              },
            ],
          },
        },
      });
    },
    error: function (data) {},
  });
});
