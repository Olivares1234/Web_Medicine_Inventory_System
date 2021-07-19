<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HCBPCL - Vaccination</title>
	<link rel="shortcut icon" type="image/png" href="./img/60a812843d3c929dce80a4b188beec51-injection-needle-by-vexels.png" sizes="1366x768">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
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

		div.dataTables_wrapper {
			width: 800 auto;
			margin: 0 auto;
		}

		.required {
			color: brown;
			font-weight: bold;
		}
		 input[type=number] {
        /*for absolutely positioning spinners*/
        position: relative; 
        padding: 0px;
        padding-right: 20px;
      }

      input[type=number]::-webkit-inner-spin-button,
      input[type=number]::-webkit-outer-spin-button {
        opacity: 1;
      }

      input[type=number]::-webkit-outer-spin-button, 
      input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: inner-spin-button !important;
        width: 25px;
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
		}
	</style>
</head>

<body>

	<?php include("private/database.php"); ?>
	<?php session_start();?>
	<?php if(isset($_SESSION["username"])){
		$_SESSION["username"];
	}
	else{
		header("location:index.php");
	}
	?>
	<?php include("includes/sidebar.php") ?>
	<?php include("includes/navbar.php") ?>
	
<!--	combobox selection vaccine inventory-->
	<?php
	$query = mysqli_query($conn,"SELECT * FROM tbl_vaccines WHERE stocks - 1 >= 0 order by id");
	?>
	
	<?php
	$query1 = mysqli_query($conn,"SELECT * FROM tbl_vaccines WHERE stocks - 1 >= 0 order by id");
	?>
	
	<!--Add/Insert Vaccination Record-->
	<?php
	$error="";
	if(isset($_POST["btnSubmit"])){
				$patientName = mysqli_real_escape_string($conn, $_POST["patientName"]);
				$age = mysqli_real_escape_string($conn, $_POST["age"]);
				$gender = mysqli_real_escape_string($conn, $_POST["gender"]);
				$vaccineName = mysqli_real_escape_string($conn, $_POST["vaccinename"]);
				$day = mysqli_real_escape_string($conn,$_POST["day"]);
				$date = mysqli_real_escape_string($conn,$_POST["date"]);
//				$condition = mysqli_real_escape_string($conn,$_POST["condition"]);
				$comment = mysqli_real_escape_string($conn,$_POST["comment"]);
		
		$checklistresident= mysqli_query($conn, "SELECT * FROM tbl_residents WHERE name='$patientName'"); 
		$num= mysqli_num_rows($checklistresident); 
		
		if($num != 0){ 
			$insert_query = mysqli_query($conn, "INSERT INTO tbl_vaccination (patient_name,age,gender,vaccine_name,day,date,comment) VALUES ('$patientName','$age','$gender','$vaccineName', '$day','$date','$comment')");
					
	
			
			if($insert_query){
					$error ="<div class='alert alert-success' role='alert'>Successfully Added!
					<button class='close' data-dismiss='alert'><span>&times;</span></button></div><script type='text/javascript'>
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'assets/music/success_message.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
		
    }
play_sound();
</script>";
			}
			$insert_query = mysqli_query($conn, "UPDATE tbl_vaccines SET stocks= stocks - 1 WHERE name='$vaccineName' order by id");
	}
		
		
			else{
					$error ="<div class='alert alert-warning' role='alert'>No Record Found As A Residents!
					<button class='close' data-dismiss='alert'><span>&times;</span></button></div><script type='text/javascript'>
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'assets/music/success_message.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
		
    }
play_sound();
</script>";
				
	}
		
	}
	
	
	?>
	
	<!--	Update Edit Record-->
	<?php
	if(isset($_POST["btnUpdate"])){
				$vaccinationId = mysqli_real_escape_string($conn, $_POST["id"]);
				$patientName = mysqli_real_escape_string($conn, $_POST["patientName"]);
//				$vaccineName1 = mysqli_real_escape_string($conn, $_POST["vaccinename1"]);
				$age1 = mysqli_real_escape_string($conn, $_POST["age1"]);
				$gender1 = mysqli_real_escape_string($conn, $_POST["gender1"]);
				$day = mysqli_real_escape_string($conn,$_POST["day"]);
				$date = mysqli_real_escape_string($conn,$_POST["date"]);
//				$condition = mysqli_real_escape_string($conn,$_POST["condition"]);
				$comment = mysqli_real_escape_string($conn,$_POST["comment"]);
		
		$edit_query = mysqli_query($conn, "UPDATE tbl_vaccination SET patient_name='$patientName', age='$age1', gender='$gender1', day='$day', date='$date',  comment='$comment'  WHERE id='$vaccinationId'");
		
		if($edit_query){
			$error ="<div class='alert alert-success' role='alert'>Successfully Update!
					<button class='close' data-dismiss='alert'><span>&times;</span></button></div><script type='text/javascript'>
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'assets/music/success_message.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
		
    }
play_sound();
</script>";
		}
		else{
			echo "<script>alert('Data not Deleted')</script>";
			
		}
		

	}
	?>


	<div class="content">

		<!--Modal Add button vaccinations Upper Right-->
		<div class="modal fade" id="vaccinationsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-hand-holding-medical fa-lg" style="color:teal;"></i> <i class="fas fa-syringe  fa-lg" style="color:teal;"></i> </span> Add Record Vaccination</h5>
						<button class="btn btn-danger" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body text-left">
						<!--                                                    <p>Add User</p>-->
						<form method="POST" action="vaccinations.php" id="frmBox" onsubmit="return formSubmit();" accept-charset="utf-8">
							<div class="form-group">
								<label for="fields"><b>Required All Fields</b></label><span class="required">*</span>
								<br>
								<label for="patientname">Patient Name:</label><span class="required">*</span>
								<input type="text" name="patientName" placeholder="Enter FullName..." class="form-control" required>
							</div>
							
							   <div class="form-group">  
                                                           <label for="Age">Age: </label><span class="required">*</span>
                                                            	<input type="number" style="text-align: center; width:100px;" name="age" id="age" min="0" max="" value="1" >     
                                                            <label for="date">Gender:</label><span class="required">*</span>
															    <select name="gender" id="gender" required>
<!--                                                            	<option value="">---Select Gender---</option>-->
                                                            	<option value="Male">Male</option>
                                                            	<option value="Female">Female</option>
                                                            </select>
                                                        </div>

							<div class="form-group">
								<label for="vaccines">Vaccines:</label><span>*</span>
								<select name="vaccinename" id="vaccinename" required>
							<option value="select">---------Select Vaccine---------</option>
							<option value="N/A">N/A</option>
									<?php while($row=mysqli_fetch_array($query)):;?>
									
							<option value="<?php echo $row[2];?>"><?php echo $row[2];?></option>
							<?php endwhile?>
								</select>
							</div>

							<div class="form-group">
								<label for="date">Day:</label><span class="required">*</span>
								<input type="text" name="day" class="form-control" required>
							</div>

							<div class="form-group">
								<label for="date">Date:</label><span class="required">*</span>
								<input type="date" name="date" class="form-control" required>
							</div>

<!--
							<div class="form-group">
								<label for="date">Condition:</label><span class="required">*</span>
								<input type="text" name="condition" class="form-control" required>
							</div>
-->

							<div class="form-group">
								<label for="city">Comment:</label><span class="required">*</span>
								<textarea type="text" spellcheck="false" name="comment" placeholder="Enter Comment... " class="form-control" required></textarea>
							</div>

							<div class="form-group">
								<button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
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
	
		
		<!--                                    Pop Update/Edit Vaccination Record From DataTable Modal-->
           <div  class="modal fade" id="editvaccineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                      <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-hand-holding-medical fa-lg" style="color:teal;"></i> <i class="fas fa-syringe  fa-lg" style="color:teal;"></i></span><b> Edit Record Vaccination</b> </h5>
                                  <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                              </div>
                        <div class="modal-body text-left">
						<!-- <p>Add User</p>-->
						<form method="POST" action="vaccinations.php" id="frmBox" onsubmit="return formSubmit();" accept-charset="utf-8">
							<div class="form-group">
								<label for="fields"><b>Required All Fields</b></label><span class="required">*</span>
								<br>
								<label for="patientname">Patient Name:</label><span class="required">*</span>
								<input type="hidden" id="id" name="id"  class="form-control" required>
								<input type="text" name="patientName" id="patientName" placeholder="Enter FullName..." class="form-control" required>
							</div>

<!--
							<div class="form-group">
								<label for="vaccines">Vaccines:</label><span class="required">*</span>
								<select name="vaccinename1" id="vaccinename1" required>

									<?php while($row1=mysqli_fetch_array($query1)):;?>
									

							<option value="<?php echo $row1[2];?>"><?php echo $row1[2];?></option>
							<?php endwhile?>
								</select>
							</div>
-->
						   <div class="form-group">  
                                                           <label for="Age">Age: </label><span class="required">*</span>
                                                            	<input type="number" style="text-align: center; width:100px;" name="age1" id="age1" min="0" max="" value="1" >     
                                                            <label for="date">Gender:</label><span class="required">*</span>
															    <select name="gender1" id="gender1" required>
<!--                                                            	<option value="">---Select Gender---</option>-->
                                                            	<option value="Male">Male</option>
                                                            	<option value="Female">Female</option>
                                                            </select>
                                                        </div>

							<div class="form-group">
								<label for="date">Day:</label><span class="required">*</span>
								<input type="text" name="day" id="day" class="form-control" required>
							</div>

							<div class="form-group">
								<label for="date">Date:</label><span class="required">*</span>
								<input type="date" name="date" id="date" class="form-control" required>
							</div>

<!--
							<div class="form-group">
								<label for="date">Condition:</label><span class="required">*</span>
								<input type="text" name="condition" id="condition" class="form-control" required>
							</div>
-->

							<div class="form-group">
								<label for="city">Comment:</label><span class="required">*</span>
								<textarea type="text" spellcheck="false" name="comment" id="comment" placeholder="Enter Comment... " class="form-control" required></textarea>
							</div>

							<div class="form-group">
								<button type="submit" name="btnUpdate" class="btn btn-primary">Submit</button>
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
           
           
                                                           <!--Modal  Details Vaccination -->
                   <div class="modal fade" id="detailsVaccination" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-hand-holding-medical fa-lg" style="color:teal;"></i> <i class="fas fa-syringe  fa-lg" style="color:teal;"></i></span> Detail Record Vaccination</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left" >
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="vaccinations.php" accept-charset="utf-8">
                                                        <div class="form-group" name="view" id="frmBox1">
                                                          <input type="hidden" name="hid" id="hid">
                                                           
                                                          
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


		
		<div id="alert" role="alert"><?php echo $error;?></div>
		<div class="container-fluid">
			<div class="fix page-title">
				<h3><span><i class="fas fa-hand-holding-medical fa-lg" style="color:teal;"></i> <i class="fas fa-syringe  fa-lg" style="color:teal;"></i> </span> Vaccinations
					<!--                            <a href="#vaccinationsModal" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-syringe"></i> Add Vaccination</a>-->
					<button type="button" class="btn btn-sm btn-outline-primary float-right" data-toggle="modal" data-target="#vaccinationsModal"><i class="fas fa-syringe"></i> Add Vaccination</button>
					<input type="hidden" class="float-right">
<!--					<button type="button" class="btn btn-sm btn-outline-primary float-right" data-toggle="modal" data-target="#vaccineUse"><i class="fas fa-syringe"></i> Vaccines Stock Use</button>-->

				</h3>
			</div>

			<div class="box box-primary">
				<div class="box-body">
					<table cellspacing="0" width="100%" id="myTables" class=" table  table-hover table-bordered table-condensed display nowrap">
						<thead>
							<tr>
								<th>No.</th>
								<th>Patient Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Vaccine Name</th>
								<th>Day</th>
								<th>Date</th>
<!--								<th>Condition</th>-->
								<th>Comment</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$getAll_query =  "SELECT * FROM tbl_vaccination";
									$sql =  mysqli_query($conn, $getAll_query);
								while($vaccinations = mysqli_fetch_assoc($sql)){
									
								?>


								<td class="id"><?php echo $vaccinations["id"];?></td>
								<td class="patient_name"><?php echo $vaccinations["patient_name"];?></td>
								<td class="age1"><?php echo $vaccinations["age"];?></td>
								<td class="gender1"><?php echo $vaccinations["gender"];?></td>
								<td class="vaccinename1"><?php echo $vaccinations["vaccine_name"];?></td>
								<td class="day"><?php echo $vaccinations["day"];?></td>
								<td class="date"><?php echo $vaccinations["date"];?></td>
								<td class="comment"><?php echo $vaccinations["comment"];?></td>
								<td class="text-right">
									<a href="vaccinations.php?detail=<?php echo $vaccinations["id"]?>" id="<?php echo $vaccinations["id"]?>" class="detail btn btn-outline-primary btn-rounded" name="btnEditModal" data-toggle="modal"><i class="fas fa-eye" data-toggle="tooltip" title="Edit"></i> Detail</a>
									
									<a href="vaccinations.php?edit=<?php echo $vaccinations["id"]?>" class="edit btn btn-outline-info btn-rounded" name="btnEditModal" data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Edit"></i> Edit</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			        <?php 
//			count dattable row
			$sql_count =  "SELECT COUNT(*) FROM tbl_vaccination";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total." Vaccinations</h5> ";
								
			}
			?>
		</div>
	</div>



	<script src="assets/vendor/jquery3/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
	<script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
	<script src="assets/vendor/DataTables/datatables.min.js"></script>
	<script src="assets/js/initiate-datatables.js"></script>
	<script src="assets/js/script.js"></script>
	
		  <script type="text/javascript">
		  
		$(document).ready(function(){
        $('#myTables').DataTable({
			"scrollX": true,
//			responsive:true
           
        })
			
			
});   // Always need here because for functions the popup button datatable next page
			  
			  
			  //		Error alert show and time hide
    
		setTimeout(function(){
			document.getElementById("alert").style.display = "none";
					
					}, 4000);
   
    
    
//			   Functions button edit jquery
		 
				$(".edit").click(function(){
					let $row = $(this).closest('tr');
					let id = $row.find(".id").text();
					let patientname = $row.find(".patient_name").text();
//					let vaccinename1 = $row.find(".vaccinename1").text();
					let age1 = $row.find(".age1").text();
					let gender1 = $row.find(".gender1").text();
					let day = $row.find(".day").text();
					let date = $row.find(".date").text();
//					let status = $row.find(".status").text();
					let comment = $row.find(".comment").text();
					
					
					$("#id").val(id);
					$("#patientName").val(patientname);
//					$("#vaccinename1").val(vaccinename1);
					$("#age1").val(age1);
					$("#gender1").val(gender1);
					$("#day").val(day);
					$("#date").val(date);
//					$("#condition").val(status);
					$("#comment").val(comment);
					
					$("#editvaccineModal").modal("toggle");
					
					
			});
			  
			  //		       View Details Vaccination
			 $(".detail").on('click', function(){
					 let checkIDs2 =  $(this).attr("id");
 
					 
					 $.ajax({
						 url:"vaccinationView.php",
						 method:"post",
						 data:{checkIDs2:checkIDs2},
						 success:function(data){
							 $("#frmBox1").html(data);
							 $("#detailsVaccination").modal("toggle");
							 
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

</body>

</html>