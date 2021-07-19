<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HCBPCL - Total Vaccinated Weekly</title>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="./img/60a812843d3c929dce80a4b188beec51-injection-needle-by-vexels.png" sizes="1366x768">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
	<!--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css"/>-->

	<link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
	<link href="assets/css/master.css" rel="stylesheet">
	<style>
		body {
			font-family: 'IBM Plex Sans', sans-serif;
		}
		
		th {
			text-align: center;
			background-color: #b4e8ff;
		}
		
		td {
			text-align: center;
		}
		
		#foot {
			color: black;
		}
		
		.required {
			color: brown;
			font-weight: bold;
		}
		
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
		
		.table {
			width: 100%;
			margin-left: auto;
			margin-right: auto;
		}
		
			img[alt="www.000webhost.com"]{
		    display:none;
		    
		}
	</style>
</head>

<body>
	<?php session_start();?>
		<?php if(isset($_SESSION["username"])){
		$_SESSION["username"];
	}
	else{
		header("location:index.php");
	}
	?>
			<!--    connection database-->
			<?php include("private/database.php"); ?>
				<!--     			sidbar content-->
				<?php include("includes/sidebar.php") ?>
					<!--   	 navbar top head-->
					<?php include("includes/navbar.php") ?>
					
					
					<?php 
	
	$query="SELECT * FROM tbl_residents";
	$result = mysqli_query($conn, $query);
	
	?>



							<div class="modal fade" id="reportVaccinatedToday" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-hand-holding-medical fa-2x" style="color:teal;"></i> <i class="fas fa-notes-medical  fa-2x" style="color:teal;"></i></span> Total Vaccinated Daily</h5>
											<button class="btn btn-danger" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body text-left">
											<!--                                                    <p>Add User</p>-->
											<form method="POST" action="reportVaccinatedToday.php" accept-charset="utf-8">
												<div class="form-group" name="view" id="frmBox1">
													<input type="hidden" id="cheksid" name="cheksid" hidden>


												</div>
												<div class="text-center">
													<!--                                                            <button type="submit" name="btnUpdate" class="btn btn-primary" >Print</button>-->
													<!--                                                            <a href="checkupView.php" class="btn btn-primary"><span>Print</span></a>-->
													<!--                                                            <button type="button" id="Print" class="btn btn-primary">Print</button>-->
												</div>
											</form>
										</div>
										<!--
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
-->
									</div>
								</div>
							</div>




						<div class="content">
							<div class="container-fluid">
								<div class="page-title">
									<h3><span><i class="fas fa-syringe  fa-lg" style="color:teal;"></i> <i class="fas fa-notes-medical  fa-lg" style="color:teal;"></i></span> <b>Total Vaccinated Daily</b>
                         <button type="button" id="Print" class="detail btn btn-sm btn-outline-primary float-sm-right" data-toggle="modal" data-target="#reportVaccinatedToday"><i class="fas fa-print"></i> Print</button>
                        </h3>
								</div>

								<div class="box box-primary">
									<div class="box-body" >
										<table cellspacing="0" width="100%"  class="myTables table  table-hover table-bordered table-condensed  display nowrap">
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
														<th>Vaccine</th>
														<th>Has Vaccinated</th>

													</tr>
												</thead>
												<tbody>
													<?php 
								$getAll_query = "SELECT id,name,gender,age,address,civilstatus,citizenship,contact_no,DATE_FORMAT(`date`,'%a - %M. %d. %Y') 'date_t',vaccine,vaccinated FROM tbl_residents WHERE vaccinated='Yes' order by date";
									$sql =  mysqli_query($conn, $getAll_query);
								while($residents = mysqli_fetch_assoc($sql)){
									
								?>
														<tr>
															<td style="display:none" class="id">
																<?php echo $residents["id"];?>
															</td>
															<td class="name">
																<?php echo $residents["name"];?>
															</td>
															<td class="gender">
																<?php echo $residents["gender"];?>
															</td>
															<td class="age">
																<?php echo $residents["age"];?>
															</td>
															<td class="address">
																<?php echo $residents["address"];?>
															</td>
															<td class="civilstatus">
																<?php echo $residents["civilstatus"];?>
															</td>
															<td class="citizenship">
																<?php echo $residents["citizenship"];?>
															</td>
															<td class="contact_no">
																<?php echo $residents["contact_no"];?>
															</td>
															<td class="date">
																<?php echo $residents["date_t"];?>
															</td>
																<td class="vaccine">
																<?php echo $residents["vaccine"];?>
															</td>
															<td class="vaccinated">
																<?php echo $residents["vaccinated"];?>
															</td>
														</tr>
														<?php } ?>


												</tbody>
										</table>
									</div>
								</div>
								<?php 
//			count dattable row
			$sql_count =  "SELECT COUNT(*) FROM tbl_residents WHERE vaccinated='Yes'";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total." Total Vaccinated Daily</h5> ";
								
			}
			?>
							</div>
						</div>


						<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
						<!-- extension responsive -->
						<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
						<!--    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>-->

						<script src="assets/vendor/jquery3/jquery.min.js"></script>
						<script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
						<script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
						<script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
						<script src="assets/vendor/DataTables/datatables.min.js"></script>
						<script src="assets/js/initiate-datatables.js"></script>
						<script src="assets/js/script.js"></script>
						
						

						<script type="text/javascript">
							$(document).ready(function() {
										$('.myTables').DataTable({
												scrollX: true,

											//			responsive:true
										})
							});
							
							$(".detail").click(function() {
									let reportVaccinatedID = $(this).attr("id");

									$.ajax({
										url: "weeklyReportResidentsView.php",
										method: "post",
										data: {
											reportVaccinatedID: reportVaccinatedID
										},
										success: function(data) {
											$("#frmBox1").html(data);
											

										}
									});

								});


									
										
						</script>
						<footer id="foot">
							<hr>
							<center>
								<div>
									<b>Copyright &copy;</b>
									<script type="text/javascript">
										document.write(new Date().getFullYear());
									</script>
								</div>
							</center>
						</footer>
						<script>
						</script>
</body>

</html>