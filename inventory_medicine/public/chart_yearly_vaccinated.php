<!--    connection database-->
     <?php include("private/database.php"); ?>
<?php

$year1 = mysqli_query($conn, "SELECT SUM(vaccinated) as totalS, YEAR(date) as year FROM tbl_residents WHERE vaccinated='yes' Group by year");
//$vote = mysqli_query($conn, "SELECT vote FROM tbl_vote WHERE taon='2016' order by id asc");
$vote1 = mysqli_query($conn, "SELECT SUM(vaccinated) as totalS, YEAR(date) as month FROM tbl_residents WHERE vaccinated='yes' Group by month");
?>
 
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Learn Make Graphic with PHP</title>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.js"></script> 
 
	 <style type="text/css">
        .container {
            width: 20%;
            margin: 5px auto;
        }
    </style>
</head>
 <body>
    <div class="container">
        <canvas id="myChart5"></canvas>
    </div>
    <script>
        var ctx = document.getElementById("myChart5");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [<?php while ($b = mysqli_fetch_array($year1)) { echo '"' . $b['year'] . '",';}?>],
                datasets: [{
                        label: 'Number of Vaccinated Yearly',
					
                        data: [<?php while ($p = mysqli_fetch_array($vote1)) { echo '"' . $p['totalS'] . '",';}?>],
                        backgroundColor: [
                            'rgba(255, 206, 86, 1)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderWidth: 1,
					backgroundColor:    'rgba(255, 159, 64, 0.2)',
					lineTension: 0.4,
					pointHitRadius: 5,
					pointHoverRadius: 3,
					showlines: true || false
                    }]
            },
            options: {
				responsive: true,
//   title: {
//                display: true,
//                text: ['Chart.js','Line Chart']
//            },
//				title: {
//					display:true,
//			        text: ['Title','Subtitle']
//		},
				yAxis: {
					display: true,
    formatString: 'c',
    label_text: 'Cost (USD)',
    scale_type: 'stacked',
    label_style_fontSize: 13
  },
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				
	
				
				
				
	  legend: {
      display: false,
      position: "bottom",
		  
      labels: {
        fontColor: "#333",
        fontSize: 16
      }
    },
                scales: {
                    yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
						  scaleLabel: {
                        display: true,
                        labelString: 'Yearly Total Vaccinated'
                    }
						
                        }]
                }
            }
        } );
    </script>
</body> 
</html> 