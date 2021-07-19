<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HCBPCL - Checkups</title>
    <link rel="shortcut icon" type="image/png" href="./img/60a812843d3c929dce80a4b188beec51-injection-needle-by-vexels.png" sizes="1366x768">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<!--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css"/>-->
   
    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
      <style>
		body{
		font-family: 'IBM Plex Sans', sans-serif;
	}
		 th{
	 		 text-align: center;
			 background-color: #b4e8ff;	
		}
		td{
			text-align: center;
		}
		#foot{
		color: black;
		}
		  .required{
			color: brown;
			font-weight:bold;
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
	//insert Residents
	$error="";
	if(isset($_POST["btnSubmit"])){
			
				
				$patientName = mysqli_real_escape_string($conn,$_POST["patientName"]);
				$date = mysqli_real_escape_string($conn, $_POST["date"]);
				$age = mysqli_real_escape_string($conn,$_POST["age"]);
		 		$gender1 = mysqli_real_escape_string($conn,$_POST["gender1"]);
				$status = mysqli_real_escape_string($conn, $_POST["status"]);
				$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
		
		$checklistresident1= mysqli_query($conn, "SELECT * FROM tbl_residents WHERE name='$patientName' order by id"); 
		$num= mysqli_num_rows($checklistresident1); 
		
		
		if($num != 0){ 
		
		$insert_query = mysqli_query($conn, "INSERT INTO tbl_checkups (patient_name,age,gender,date,status,comment) VALUES ('$patientName','$age','$gender1','$date', '$status','$comment')");
			
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
				$checkupID = mysqli_real_escape_string($conn,$_POST["id"]);
				$patientName = mysqli_real_escape_string($conn,$_POST["patientName"]);
		        $age1 = mysqli_real_escape_string($conn,$_POST["age1"]);
		 		$gender = mysqli_real_escape_string($conn,$_POST["gender"]);
				$date = mysqli_real_escape_string($conn,$_POST["date"]);
				$status1 = mysqli_real_escape_string($conn,$_POST["status1"]);
				$comment = mysqli_real_escape_string($conn,$_POST["comment"]);
		
		$edit_query = mysqli_query($conn, "UPDATE tbl_checkups SET patient_name='$patientName', age='$age1', gender='$gender', date='$date', status='$status1', comment='$comment' WHERE id='$checkupID'");
		
		if($edit_query){
			$error ="<div class='alert alert-success' role='alert'>Successfully Updated!
					<button class='close' data-dismiss='alert'><span>&times;</span></button></div>";
		}
		else{
			echo "<script>alert('Data not Update')</script>";
		}

	}
	?>
	
	<?php 
	
	$query="SELECT * FROM tbl_checkups";
	$result = mysqli_query($conn, $query);
	
	?>
	
	<div class="content">
				<!--Modal Add button Residents Upper Right-->
                   <div class="modal fade" id="checkupsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-user-injured  fa-2x" style="color:teal;"></i> <i class="fas fa-notes-medical  fa-2x" style="color:teal;"></i></span> Add Record Checkups</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left">
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="checkups.php" id="frmBox" onsubmit="return formSubmit();"    accept-charset="utf-8">
                                                        <div class="form-group">
															<label for="supplier"><b>Required All Fields</b></label><span class="required">*</span>
                                                           <br>
                                                           <input type="hidden" name="resiID" id="resiID">
                                                            <label for="supplier">Patient:</label><span class="required">*</span>
                                                            <input type="text" name="patientName" placeholder="Enter FullName..." class="form-control" required>
                                                        </div>
                                                           <div class="row justify-content-md-center">
                                                          <div class="form-group col-sm">  
                                                           <label for="Age">Age: </label><span class="required">*</span>
                                                            	<input type="number" style="text-align: center; width:100px;" name="age" id="age" min="0" max="" value="1" >     
                                                            	</div>
                                                            	 <div class="form-group col-sm"> 
                                                            <label for="date">Gender:</label><span class="required">*</span>
															    <select name="gender1" id="gender1" required>
                                                            	<option value="">---Select Gender---</option>
                                                            	<option value="Male">Male</option>
                                                            	<option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="date">Date:</label><span class="required">*</span>
															  <input type="date" name="date" class="form-control" required>
                                                        </div>
<!--                                                         <div class="row">-->
<!--
                                                         <div class="form-group col-lg-6">
                                                            <label for="case">Case:</label><span class="required">*</span>
                                                            <input type="text" name="case" placeholder="Enter Cases..." class="form-control" required>
                                                        </div>
-->
                                                        <div class="form-group">       
                                                            <label for="status">Status:</label><span class="required">*</span>
                                                            <select name="status" id="status" required>
                                                            	<option value="">---Select Status---</option>
                                                            	<option value="Good Condition">Good Condition</option>
                                                            	<option value="Bad Condition">Bad Condition</option>
                                                            </select>
                                                        </div>
<!--														</div>-->
                                                        <div class="form-group">       
                                                            <label for="city">Comment:</label><span class="required">*</span>
															<textarea type="text" spellcheck="false" name="comment" placeholder="Enter Comment... " class="form-control" required></textarea>
                                                        </div>
                                                        <div class="form-group">       
                                                            <button type="submit" name="btnSubmit" class="btn btn-primary" >Submit</button>
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
                                    
                                    <!--Modal Add Update Checkups -->
                   <div class="modal fade" id="editcheckupsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-user-injured  fa-2x" style="color:teal;"></i> <i class="fas fa-notes-medical  fa-2x" style="color:teal;"></i></span> Update Record Checkups</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left">
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="checkups.php" id="frmBoxs" onsubmit="return formSubmit();"    accept-charset="utf-8">
                                                       <div class="form-group">
                                                            <label for="patient">PatientID:</label>
                                                            <input type="text" id="id" name="id" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="patient">Patient:</label>
<!--                                                            <input type="hidden" id="id" name="id">-->
                                                            <input type="text" name="patientName" id="patientName" placeholder="Enter FullName..." class="form-control" required>
                                                        </div>
                                                          <div class="form-group">  
                                                           <label for="Age">Age: </label><span class="required">*</span>
                                                            	<input type="number" style="text-align: center; width:100px;" name="age1" id="age1" min="0" max="" value="1" >     
                                                            <label for="date">Gender:</label><span class="required">*</span>
															    <select name="gender" id="gender" required>
<!--                                                            	<option value="">---Select Gender---</option>-->
                                                            	<option value="Male">Male</option>
                                                            	<option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="date">Date:</label>
															  <input type="date" name="date" id="date" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">       
                                                            <label for="status1">Status:</label>
                                                            <select name="status1" id="status1" required>
                                                            	<option value="">---Select Status---</option>
                                                            	<option value="Good Condition">Good Condition</option>
                                                            	<option value="Bad Condition">Bad Condition</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">       
                                                            <label for="city">Comment:</label>
															<textarea type="text" spellcheck="false" name="comment" id="comment" placeholder="Enter Comment... " class="form-control" required></textarea>
                                                        </div>
                                                        <div class="form-group">       
                                                            <button type="submit" name="btnUpdate" class="btn btn-primary" >Submit</button>
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
                                    
                                    
                                       
                                    <!--Modal  Details Checkups -->
                   <div class="modal fade" id="detailCheckups" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-user-injured  fa-2x" style="color:teal;"></i> <i class="fas fa-notes-medical  fa-2x" style="color:teal;"></i></span> Detail Record Checkups</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left" >
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="checkups.php" accept-charset="utf-8">
                                                        <div class="form-group" name="view" id="frmBox1">
                                                          <input type="hidden" id="cheksid" name="cheksid">
                                                           
                                                          
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
 
			<div id="alert"  role="alert"><?php echo $error;?></div>  
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title">
                        <h3><span><i class="fas fa-user-injured  fa-lg" style="color:teal;"></i> <i class="fas fa-notes-medical  fa-lg" style="color:teal;"></i></span> Checkups 
<!--                            <a href="roles.html" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Add Checkup</a>-->
                            <button type="button" class="btn btn-sm btn-outline-primary float-sm-right" data-toggle="modal" data-target="#checkupsModal"><i class="fas fa-user-injured"></i> Add Checkups</button>
                        </h3>
                    </div>
                    
                    <div class="box box-primary">
                        <div class="box-body">
                           <table cellspacing="0" width="100%"  class="myTables table  table-hover table-bordered table-condensed display nowrap">
                                <thead>
                                    <tr>
                                        <th>PatientID</th>
                                        <th>Patient Name</th>
                                        <th>Age</th>   
                                        <th>Gender</th> 
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th style="display:none">Status</th>
                                        <th>Comment</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                               <tbody > 
                                  <?php 
								$getAll_query =  "SELECT * FROM tbl_checkups";
									$sql =  mysqli_query($conn, $getAll_query);
								while($checkups = mysqli_fetch_assoc($sql)){
									
								?>
                                    <tr>
                                        <td class="id" ><?php echo $checkups["id"];?></td>
                                        <td class="patient_name"><?php echo $checkups["patient_name"];?></td>
                                        <td class="age1"><?php echo $checkups["age"];?></td>
                                        <td class="gender"><?php echo $checkups["gender"];?></td>
                                        <td class="date"><?php echo $checkups["date"];?></td>
                                        <td style="display:none" class="status1"><?php echo $checkups["status"];?></td>
                                         <td class=""><?php if ($checkups['status'] == 'Bad Condition') { ?>
										<span class="label label-danger"><?php echo $checkups['status']; ?></span>
										<?php } else { ?>
										<span class="label label-success"><?php echo $checkups['status']; ?></span>
										<?php } ?></td>
                                        <td class="comment"><?php echo $checkups["comment"];?></td>
                                        <td>
                                           <a href="checkups.php?detail=<?php echo $checkups["id"]?>" id="<?php echo $checkups["id"]?>"  class="detail btn btn-outline-primary btn-rounded" name="btnEditModal"  data-toggle="modal"><i class="fas fa-eye" data-toggle="tooltip" title="Edit"></i> Detail</a>
                                            <a href="checkups.php?edit=<?php echo $checkups["id"]?>"  class="edit btn btn-outline-info btn-rounded" name="btnEditModal"  data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Edit"></i> Edit</a>
<!--                                            <a href="#?delete=<?php ?>"  class="delete btn btn-outline-danger btn-rounded deletebtn" name="btnDeleteModal"><i class="fas fa-trash"></i> Delete</a> -->
<!--									 		<a href="residents.php?delete=<?php ?>"  class="delete btn btn-outline-danger btn-rounded deletebtn" name="btnDeleteModal" onClick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash"></i> Delete</a>-->
<!--									         <button type="submit" class="btn btn-danger deletebtn">DELETE</button>-->
										</td>
                                    </tr>
                                    <?php } ?>
                            

                                </tbody>
                            </table>
                        </div>
                    </div>
                       <?php 
//			count dattable row
			$sql_count =  "SELECT COUNT(*) FROM tbl_checkups";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total." Checkups</h5> ";
								
			}
			?>
                </div>
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
		 $(document).ready(function(){
        $('.myTables').DataTable({
			"scrollX": true,
//			responsive:true
           
        })
			
			
});   // Always need here because for functions the popup button datatable next page
			
			
  //		Error alert show and time hide
			setTimeout(function(){
			document.getElementById("alert").style.display = "none";
					
					}, 4000);

			 
			 
				 $(".edit").click(function(){
					let $row = $(this).closest('tr');
					let id = $row.find(".id").text();
					let patient_name = $row.find(".patient_name").text();
					let age = $row.find(".age1").text();
					let gender = $row.find(".gender").text();
					let date = $row.find(".date").text();
					let status = $row.find(".status1").text();
					let comment = $row.find(".comment").text();
//					
//					
					$("#id").val(id);
					$("#patientName").val(patient_name);
					$("#age1").val(age);
					$("#gender").val(gender);
					$("#date").val(date);
					$("#status1").val(status);
					$("#comment").val(comment);
					
					
				 $("#editcheckupsModal").modal("toggle");
				 
			 });
			
//				$(document).ready(function(){
			
				 $(".detail").click(function(){
					 let checkID =  $(this).attr("id");
					 
					 $.ajax({
						 url:"checkupView.php",
						 method:"post",
						 data:{checkID:checkID},
						 success:function(data){
							 $("#frmBox1").html(data);
							 $("#detailCheckups").modal("toggle");
							 
						 }
					 });
				 
//			 	});
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