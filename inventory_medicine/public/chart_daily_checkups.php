<!--    connection database-->
     <?php include("private/database.php"); ?>
<?php

$year = mysqli_query($conn, "SELECT DATE_FORMAT(date,'%M. %d. %y') AS month FROM tbl_checkups Group by month ORDER by date");
//$vote = mysqli_query($conn, "SELECT vote FROM tbl_vote WHERE taon='2016' order by id asc");
$vote = mysqli_query($conn, "SELECT DATE_FORMAT(date,'%M. %d. %y') AS daily, COUNT(date) AS sum FROM tbl_checkups  Group by date");

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
            width: 100%;
            margin: 5px auto;
        }
    </style>
</head>
 <body>
    <div class="container">
        <canvas id="myChart3"></canvas>
    </div>
    <script>
        var ctx = document.getElementById("myChart3");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php while ($b = mysqli_fetch_array($year)) { echo '"' . $b['month'] . '",';}?>],
                datasets: [{
                        label: 'Number of Checkups Daily',
						 backgroundColor: 'rgba(104, 232, 138, 0.68)',
					
					borderWidth: 1,
					borderColor:  'rgba(75, 192, 192, 1)',
                        data: [<?php while ($p = mysqli_fetch_array($vote)) { echo '"' . $p['sum'] . '",';}?>],
//                        backgroundColor: [
//                            'rgba(255, 99, 132, 0.2)',
//                            'rgba(54, 162, 235, 0.2)',
//                            'rgba(255, 206, 86, 0.2)',
//                            'rgba(75, 192, 192, 0.2)',
//                            'rgba(153, 102, 255, 0.2)',
//                            'rgba(255, 159, 64, 0.2)',
//                            'rgba(255, 99, 132, 0.2)',
//                            'rgba(54, 162, 235, 0.2)',
//                            'rgba(255, 206, 86, 0.2)',
//                            'rgba(75, 192, 192, 0.2)',
//                            'rgba(153, 102, 255, 0.2)',
//                            'rgba(255, 159, 64, 0.2)'
//                        ],
//                        borderColor: [
//                            'rgba(255,99,132,1)',
//                            'rgba(54, 162, 235, 1)',
//                            'rgba(255, 206, 86, 1)',
//                            'rgba(75, 192, 192, 1)',
//                            'rgba(153, 102, 255, 1)',
//                            'rgba(255, 159, 64, 1)',
//                            'rgba(255, 99, 132, 0.2)',
//                            'rgba(54, 162, 235, 0.2)',
//                            'rgba(255, 206, 86, 0.2)',
//                            'rgba(75, 192, 192, 0.2)',
//                            'rgba(153, 102, 255, 0.2)',
//                            'rgba(255, 159, 64, 0.2)'
//                        ],
                        
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
                        labelString: 'Daily Total Checkups'
                    }
						
                        }]
                }
            }
        } );
    </script>
</body> 
</html> 