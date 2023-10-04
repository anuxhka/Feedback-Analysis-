<?php
include ('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Generated Report</title>
</head>
<body>

 <?php
    

 ?>
    <div style="width: 500px;">
        <canvas id="myChart"></canvas>
    </div>


    <script>
        //setup 
        const yLabels = ['How much useful the content is?', 'Institute has satisfied facilities'];
        const xLabels = ['Excellent', 'Very good', 'Good', 'Average', 'Below average'];
        const data = {
          labels: yLabels,
          datasets: [{
            axis: 'x',
            label: 'Bar chart Carricular',
            data: [1, 2, 3, 4, 5], // Placeholder data for x-axis
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        };

        const config = {
          type: 'bar',
          data,
          options: {
            indexAxis: 'y', // Set to 'y' for horizontal chart
            scales: {
              x: {
                ticks: {
                  callback: function(value, index, values) {
                    return xLabels[index];
                  }
                }
              }
            }
          }
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>
