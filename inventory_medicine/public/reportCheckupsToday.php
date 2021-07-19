<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HCBPCL - Total Checkups Today</title>
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
	<link rel="shortcut icon" type="image/png" href="./img/60a812843d3c929dce80a4b188beec51-injection-needle-by-vexels.png" sizes="1366x768">
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
			.label-default {
     color: #5e5e5e; }
 }
  .label-default[href]:hover, .label-default[href]:focus {
   color: #5e5e5e; }

.label-primary {
  color: #1872a2;}
  .label-primary[href]:hover, .label-primary[href]:focus {
    color: #1872a2; }

.label-success {
  color: #75a74d; }
  .label-success[href]:hover, .label-success[href]:focus {
    color: #75a74d; }

.label-info {
  color:#31b0d5;}
  .label-info[href]:hover, .label-info[href]:focus {
    color: #31b0d5; }

.label-warning {
  color: #e66c0e; }
  .label-warning[href]:hover, .label-warning[href]:focus {
   color: #e66c0e; }

.label-danger {
 color: #f23b3b; }
  .label-danger[href]:hover, .label-danger[href]:focus {
   color: #f23b3b; }
   
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
	
	$query="SELECT * FROM tbl_checkups";
	$result = mysqli_query($conn, $query);
	
	?>



							<div class="modal fade" id="reportNegative" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-user  fa-2x" style="color:teal;"></i> <i class="fas fa-clipboard-list  fa-2x" style="color:teal;"></i></span> Total Checkups Today</h5>
											<button class="btn btn-danger" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body text-left">
											<!--                                                    <p>Add User</p>-->
											<form method="POST" action="reportNegative.php" accept-charset="utf-8">
												<div class="form-group" name="view" id="frmBox1">
													<input type="text" id="cheksid" name="cheksid" hidden>


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
										<h3><span><i class="fas fa-user  fa-lg" style="color:teal;"></i> <i class="fas fa-clipboard-list  fa-lg" style="color:teal;"></i></span> <b> Total Checkups Today </b>
                         <button type="button"  class="detail btn btn-sm btn-outline-primary float-sm-right" data-toggle="modal" data-target="#reportNegative"><i class="fas fa-print"></i> Print</button>
                        </h3>
									</div>
									<div class="box box-primary">
										<div class="box-body">
											<table cellspacing="0" width="100%" id="myTables" class=" table  table-hover table-bordered table-condensed display nowrap">
												<center>
													<thead>
														<tr>
															<th>ID</th>
															<th>Patient Name</th>
															<th>Age</th>
															<th>Date</th>
															<th>Status</th>
															<th>Comment</th>
														</tr>
													</thead>
													<tbody>
														<?php 
								$getAll_query =  "SELECT * FROM tbl_checkups WHERE DATE(`date`) = CURDATE()";
									$sql =  mysqli_query($conn, $getAll_query);
								while($checkups = mysqli_fetch_assoc($sql)){
									
								?>
															<tr>
																<td class="id"><?php echo $checkups["id"];?></td>
																<td class="patient_name"><?php echo $checkups["patient_name"];?></td>
																<td class="id"><?php echo $checkups["age"];?></td>
																<td class="date"><?php echo $checkups["date"];?></td>
																<td class="status1"><?php if ($checkups['status'] == 'Bad Condition') { ?>
																<span class="label label-danger"><?php echo $checkups['status']; ?></span>
																<?php } else { ?>
																<span class="label label-success"><?php echo $checkups['status']; ?></span>
																<?php } ?></td>
																<td class="comment"><?php echo $checkups["comment"];?></td>
															</tr>
															<?php } ?>


													</tbody>
												</center>
											</table>
										</div>
									</div>
									<?php 
//			count dattable row
			$sql_count =  "SELECT COUNT(*) FROM tbl_checkups WHERE DATE(`date`) = CURDATE()";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total."Total Today Checkups</h5> ";
								
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
									$('#myTables').DataTable({
										"scrollX": true,
											

									})
								});
								//		Error alert show and time hide

								$(".detail").click(function() {
									let reportNegativeID = $(this).attr("id");

									$.ajax({
										url: "reportViewCheckupsToday.php",
										method: "post",
										data: {
											reportNegativeID: reportNegativeID
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