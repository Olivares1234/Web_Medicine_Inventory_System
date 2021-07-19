<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Print</title>
	<!--	<link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css"/>
	<style>
		@media screen {
			#printSection {
				display: none;
			}
		}
		
		@media print {
			body * {
				visibility: hidden;
			}
			#printSection,
			#printSection * {
				visibility: visible;
			}
			#printSection {
				position: absolute;
				left: 0;
				top: 0;
			}
		}
	</style>
</head>

<body onload="print()">
	<div class="container" id="printThis">
		<center>
			<h3 style="margin-top: 30px"><span><i class="fas fa-hand-holding-medical fa-lg" style="color:teal;"></i></span>Total Vaccinated Today</h3>
			<hr>
		</center>
		<table id="ready" class="table table-striped table-bordered table-responsive" style="width:100%;">
			<thead>
				<tr>
					<th style="display:none">ID</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Age</th>
					<th>Address</th>
					<th>Civil Status</th>
					<th>Citizenship</th>
					<th>Contact no.</th>
					<th>Date</th>
					<th>Has Vaccinated</th>
				</tr>
			</thead>
			<tbody>
				<?php 
		include("private/database.php");
		// no need if (isset) 
		$get_master_list = mysqli_query($conn, "SELECT * FROM tbl_residents WHERE vaccinated='Yes' AND DATE(`date`) = CURDATE()");
		while($row = mysqli_fetch_array($get_master_list)){
			
		?>

					<tr>
						<td>
							<?php echo $row["name"];?>
						</td>
						<td>
							<?php echo $row["gender"];?>
						</td>
						<td>
							<?php echo $row["age"];?>
						</td>
						<td>
							<?php echo $row["address"];?>
						</td>
						<td>
							<?php echo $row["civilstatus"];?>
						</td>
						<td>
							<?php echo $row["citizenship"];?>
						</td>
						<td>
							<?php echo $row["contact_no"];?>
						</td>
						<td>
							<?php echo $row["date"];?>
						</td>
						<td>
							<?php echo $row["vaccinated"];?>
						</td>


					</tr>

			</tbody>
			<?php } ?>

		</table>
		<?php 
//			count dattable row
			$sql_count =  "SELECT COUNT(*) FROM tbl_residents WHERE vaccinated='Yes'";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total."Total Vaccinated Today</h5> ";
								
			}
			?>
	</div>
	<div class="container">
		<button type="button" id="Print" class="btn btn-sm btn-primary float-left" data-toggle="modal" data-target="#"><i class="fas fa-print"></i> Print</button>
	</div>
	<script>
		
		document.getElementById("Print").onclick = function() {
			printElement(document.getElementById("printThis"));
		};

		function printElement(elem) {
			// dont change var variable to let
			var domClone = elem.cloneNode(true);

			var $printSection = document.getElementById("printSection");

			if (!$printSection) {
				var $printSection = document.createElement("div");
				$printSection.id = "printSection";
				document.body.appendChild($printSection);
			}

			$printSection.innerHTML = "";
			$printSection.appendChild(domClone);
			window.print();
		}
	</script>
</body>

</html>