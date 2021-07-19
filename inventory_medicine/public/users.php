<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HCBPCL - Users</title>
     <!--  extension GoogleFonts  -->
    <link rel="shortcut icon" type="image/png" href="./img/60a812843d3c929dce80a4b188beec51-injection-needle-by-vexels.png" sizes="1366x768">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
    <!--  extension responsive  -->
<!--    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css"/>
   
    <link rel="stylesheet" href="assets/css/styles.css">
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

		.label-default {
			color: #5e5e5e;
		}
		}

		.label-default[href]:hover,
		.label-default[href]:focus {
			color: #5e5e5e;
		}

		.label-primary {
			color: #1872a2;
		}

		.label-primary[href]:hover,
		.label-primary[href]:focus {
			color: #1872a2;
		}

		.label-success {
			color: #75a74d;
		}

		.label-success[href]:hover,
		.label-success[href]:focus {
			color: #75a74d;
		}

		.label-info {
			color: #31b0d5;
		}

		.label-info[href]:hover,
		.label-info[href]:focus {
			color: #31b0d5;
		}

		.label-warning {
			color: #e66c0e;
		}

		.label-warning[href]:hover,
		.label-warning[href]:focus {
			color: #e66c0e;
		}

		.label-danger {
			color: #f23b3b;
		}

		.label-danger[href]:hover,
		.label-danger[href]:focus {
			color: #f23b3b;
		}
		
		img[alt="www.000webhost.com"]{
		    display:none;
		    
		}
		
		 #loading {
        top: 50%; /* IMPORTANT */
        left: 50%; /* IMPORTANT */
         display: block;
  		opacity: 0.6;
        position: absolute;
        background: url('assets/img/preloader.gif') no-repeat;
		 z-index: 99999;
        width: 1366px;
        height: 768px;

        margin-top: -225.5px; /* HALF OF THE HEIGHT */
        margin-left: -375px; /* HALF OF THE WIDTH */
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
	
	
	  <?php 
	//insert Users
	$error="";
	
	if(isset($_POST["btnSubmit"])){
		   
				$firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
				$middlename = mysqli_real_escape_string($conn,$_POST["middlename"]);
				$lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
				$birthdate = mysqli_real_escape_string($conn,$_POST["birthdate"]);
				$gender = mysqli_real_escape_string($conn,$_POST["gender"]);
				$address = mysqli_real_escape_string($conn,$_POST["address"]);
				$contactno = mysqli_real_escape_string($conn,$_POST["contactno"]);
				$email = mysqli_real_escape_string($conn,$_POST["email"]);
				$usertype = mysqli_real_escape_string($conn,$_POST["usertype"]);
		        $username = mysqli_real_escape_string($conn,$_POST["username"]);
				$password = mysqli_real_escape_string($conn,$_POST["password"]);
				$cpassword = mysqli_real_escape_string($conn,$_POST["cpassword"]);
		        $status = mysqli_real_escape_string($conn,$_POST["status"]);
		

			
 $insert_query = mysqli_query($conn, "INSERT INTO tbl_users (username,firstname,middlename,lastname,birthdate,gender,address,contact_no,email,usertype,password,status) VALUES ('$username','$firstname','$middlename','$lastname','$birthdate','$gender','$address','$contactno','$email','$usertype','$password','$status')");
		
				if($insert_query){
				$error ="<div class='alert alert-success' role='alert'>Successfully Added!<button class='close' data-dismiss='alert'><span>&times;</span></button></div>";
				}

		
	}
	
	?>
	
	<!--	Update Edit Record-->
	<?php
	if(isset($_POST["btnUpdate"])){
				$userid = mysqli_real_escape_string($conn,$_POST["userid"]);
				$firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
				$middlename = mysqli_real_escape_string($conn,$_POST["middlename"]);
				$lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
				$birthdate1 = mysqli_real_escape_string($conn,$_POST["birthdate1"]);
				$gender = mysqli_real_escape_string($conn,$_POST["gender"]);
				$address = mysqli_real_escape_string($conn,$_POST["address"]);
				$contactno = mysqli_real_escape_string($conn,$_POST["contactno"]);
				$email = mysqli_real_escape_string($conn,$_POST["email"]);
				$usertype = mysqli_real_escape_string($conn,$_POST["usertype"]);
//		        $username = mysqli_real_escape_string($conn,$_POST["username"]);
//				$password = mysqli_real_escape_string($conn,$_POST["password"]);
				$status1 = mysqli_real_escape_string($conn,$_POST["status1"]);
		
		$edit_query = mysqli_query($conn, "UPDATE tbl_users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', birthdate='$birthdate1',gender='$gender',address='$address',contact_no='$contactno',email='$email',usertype='$usertype',status='$status1' WHERE id='$userid'");
		
		if($edit_query){
			$error ="<div class='alert alert-success' role='alert1'>Successfully Updated!
					<button class='close' data-dismiss='alert'><span>&times;</span></button><script type='text/javascript'>
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
<!--						Add User Modal-->
		<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><span><i class="teal fas fa-users fa-2x" style="color:teal;"></i></span> Add User</h5>
						<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body text-left">
						<!--                                                    <p>Add User</p>-->
						<form action="users.php" method="post" accept-charset="utf-8">
							<div id="alert" role="alert"><?php echo $error;?></div>
							<label for="supplier"><b>Required All Fields</b><span class="required">*</span></label>
							<br>
							<div class="row">
								<div class="form-group col-lg-6">
									<label for="firstname">FirstName:</label><span class="required">*</span>
									<input type="text" name="firstname" placeholder="First Name..." class="form-control" spellcheck="false" required>
								</div>

								<div class="form-group col-lg-6">
									<label for="middlename">MiddleName:</label><span class="required">*</span>
									<input type="text" name="middlename" placeholder="Middle Name.." class="form-control" spellcheck="false" required>
								</div>

								<div class="form-group col-lg-6">
									<label for="lastname">LastName:</label><span class="required">*</span>
									<input type="text" name="lastname" placeholder="last Name..." class="form-control" spellcheck="false" required>
								</div>

								<div class="form-group col-lg-6">
									<label for="birthdate">BirthDate:</label><span class="required">*</span>
									<input type="date" name="birthdate" placeholder="last Name..." class="form-control" spellcheck="false" required>
								</div>

								<div class="form-group col-lg-6">
									<label for="gender">Gender: </label><span class="required">*</span><br>
									<select name="gender" required>
										<option value="">---Select Gender---</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>

								<div class="form-group col-lg-6">
									<label for="address">Address:</label><span class="required">*</span>
									<textarea type="text" name="address" placeholder="Address..." class="form-control" spellcheck="false" required></textarea>
								</div>

								<div class="form-group col-lg-6">
									<label for="contactno.">Contact No.</label><span class="required">*</span>
									<input type="text" name="contactno" placeholder="Contact No..." class="form-control" spellcheck="false" required>
								</div>


								<div class="form-group col-lg-6">
									<label for="email">Email</label><span class="required">*</span>
									<input type="email" name="email" placeholder="Email..." class="form-control" spellcheck="false" required>
								</div>
							</div>
							<br>
							<hr>

							<div class="row">
								<div class="form-group col-lg-6">
									<label for="usertype">UserType:</label>
									<select name="usertype" required>
										<option value="">---Select Type---</option>
										<option value="Administrator">Administrator</option>
										<option value="Nurse">Nurse</option>
										<option value="HealthWorker">HealthWorker</option>
									</select>
								</div>

								<div class="form-group col-lg-6">
									<label for="username">Username:</label>
									<input type="text" name="username" placeholder="" class="form-control" spellcheck="false" required>
								</div>

								<div class="form-group col-lg-6">
									<label for="password">Password:</label>
									<input type="password" name="password" placeholder="" class="form-control" required>
								</div>
								
								<div class="form-group col-lg-6">
									<label for="cpassword">ConfirmPassword:</label>
									<input type="password" name="cpassword" placeholder="" class="form-control" required>
								</div>
								
									<div class="form-group col-lg-6">
									<label for="usertype">Status:</label>
									<select name="status" id="status" required>
										<option value="">---Select Status---</option>
										<option value="Active">Active</option>
										<option value="DeActivate">DeActivate</option>
									</select>
								</div>
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
		
		
<!--		   Update Modal PopUp-->

<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><span><i class="teal fas fa-users fa-2x" style="color:teal;"></i></span> Edit User</h5>
						<button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body text-left">
						<!--                                                    <p>Add User</p>-->
						<form action="users.php" method="post" accept-charset="utf-8">
<!--							<div id="alert" role="alert"><?php echo $error;?></div>-->
							<label for="supplier"><b>Required All Fields</b><span class="required">*</span></label>
							<br>
							<div class="row">
								<div class="form-group col-lg-6">
									<label for="firstname">UserID:</label><span class="required">*</span>
									<input type="text" name="userid" id="userid" placeholder="First Name..." class="form-control" spellcheck="false" readonly required>
									<label for="firstname">FirstName:</label><span class="required">*</span>
									<input type="text" name="firstname" id="firstname" placeholder="First Name..." class="form-control" spellcheck="false" required>
								</div>
								
								
								<div class="form-group col-lg-6">
									<label for="middlename">MiddleName:</label><span class="required">*</span>
									<input type="text" name="middlename" id="middlename"  placeholder="Middle Name.." class="form-control" spellcheck="false" required>
									<label for="lastname">LastName:</label><span class="required">*</span>
									<input type="text" name="lastname" id="lastname" placeholder="last Name..." class="form-control" spellcheck="false" required>
								</div>

							
								

								<div class="form-group col-lg-6">
									<label for="birthdate">BirthDate:</label><span class="required">*</span>
									<input type="date" name="birthdate1" id="birthdate1" placeholder="last Name..." class="form-control" spellcheck="false" required>
								</div>

								<div class="form-group col-lg-6">
									<label for="gender">Gender: </label><span class="required">*</span><br>
									<select name="gender" id="gender" required>
										<option value="">---Select Gender---</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
								</div>

								<div class="form-group col-lg-6">
									<label for="address">Address:</label><span class="required">*</span>
									<textarea type="text" name="address" id="address" placeholder="Address..." class="form-control" spellcheck="false" required></textarea>
								</div>

								<div class="form-group col-lg-6">
									<label for="contactno.">Contact No.</label><span class="required">*</span>
									<input type="text" name="contactno" id="contactno" placeholder="Contact No..." class="form-control" spellcheck="false" required>
								</div>
								
								<div class="form-group col-lg-6">
								<hr>
								<label for="username">Username:</label>
									<input type="text" name="username" id="username" placeholder="" class="form-control" spellcheck="false" disabled required>
								</div>
								
								<div class="form-group col-lg-6">
								<hr>
									<label for="email">Email</label><span class="required">*</span>
									<input type="email" name="email" id="email" placeholder="Email..." class="form-control" spellcheck="false" required>
								</div>
							</div>
							
						
								<div class="row">
								<div class="form-group col-lg-6">
									<label for="usertype">UserType:</label>
									<select name="usertype" id="usertype" required>
										<option value="">---Select Type---</option>
										<option value="Administrator">Administrator</option>
										<option value="Nurse">Nurse</option>
										<option value="HealthWorker">HealthWorker</option>
									</select>
								</div>
							
								</div>
								<div class="row">
								    <div class="form-group col-lg-6">
									<label for="usertype">Status:</label>
									<select name="status1" id="status1" required>
										<option value="">---Select Status---</option>
										<option value="Active">Active</option>
										<option value="DeActivate">DeActivate</option>
									</select>
								</div>
								</div>
								
								
								
							
<!--							</div>-->

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


	
		
      
       <!--			    button modal upper-->
               
        <div id="alert1" role="alert1"><?php echo $error;?></div>
		<div class="container-fluid">
			<div class="page-title">
				<h3><span><i class="teal fas fa-users fa-lg" style="color:teal;"></i></span> Users
					<button type="button" class="btn btn-sm btn-outline-primary float-sm-right" data-toggle="modal" data-target="#userModal"><i class="fas fa-fas fa-users"></i> Add User</button>
				</h3>
			</div>
			
			<div class="box box-primary">
				<div class="box-body">
					  <table  style="cellspacing:0; width:100%;"  id="myTables" class="table  table-hover table-bordered table-condensed display nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<!--to show column 4 display none this need datatable-->
								<th style="display:none"></th>
								<th style="display:none"></th>
								<th style="display:none"></th>
								<th style="display:none"></th>
								<th style="display:none"></th>
								<th style="display:none"></th>
								<th style="display:none"></th>
								<th style="display:none">
								<th>UserName</th>
								<th>Email</th>
								<th>UserType</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$getAll_query =  "SELECT * FROM tbl_users";
									$sql =  mysqli_query($conn, $getAll_query);
								while($users = mysqli_fetch_array($sql)){
									
								?>
							<tr>
								<td class="id"><?php echo $users["id"];?></td>
								<!--same here to row display:none show this need datatable-->
								<td style="display:none" class="firstname"><?php echo $users["firstname"];?></td>
								<td style="display:none" class="middlename"><?php echo $users["middlename"];?></td>
								<td style="display:none" class="lastname"><?php echo $users["lastname"];?></td>
								<td style="display:none" class="birthdate1"><?php echo $users["birthdate"];?></td>
								<td style="display:none" class="address"><?php echo $users["address"];?></td>
								<td style="display:none" class="contactno"><?php echo $users["contact_no"];?></td>
								<td class="username"><?php echo $users["username"];?></td>
								<td class="email"><?php echo $users["email"];?></td>
								<td class="usertype"><?php echo $users["usertype"];?></td>
								<td style="display:none" class="gender"><?php echo $users["gender"];?></td>
								<td style="display:none" class="status1"><?php echo $users["status"];?></td>
								<td class="status"><?php if($users["status"]=='Active'){
												   echo "<p style='color:#75a74d;'>Active</p>";
											       }
											       else{
												   echo "<p style='color:#f23b3b;'>DeActivate</p>";
											       }
									               ?>
								</td>
								<td class="">
<!--									<a href="users.php?detail=<?php echo $users["id"]?>" id="<?php echo $users["id"]?>" class="detail btn btn-outline-primary btn-rounded" name="btnEditModal" data-toggle="modal"><i class="fas fa-eye" data-toggle="tooltip" title="Edit"></i> Detail</a>-->
									<a href="users.php?edit=<?php echo $users["id"]?>" class="edit btn btn-outline-info btn-rounded" name="btnEditModal" data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Edit"></i> Edit</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<?php 
//			count dattable row
			$sql_count =  "SELECT COUNT(*) FROM tbl_users";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total." Users</h5> ";
								
			}
			?>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- extension responsive -->
<!--    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>


    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
<!--
    
    <script src="assets/js/initiate-datatables.js"></script>
    
-->
   <script src="assets/vendor/DataTables/datatables.min.js"></script>
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
			document.getElementById("alert1").style.display = "none";
					}, 3000);
			
		  
		  
		  
		  //			   Functions button edit jquery
		 
				$(".edit").click(function(){
					let $row = $(this).closest('tr');
					let id = $row.find(".id").text();
					let firstname = $row.find(".firstname").text();
					let middlename = $row.find(".middlename").text();
					let lastname = $row.find(".lastname").text();
					let birthdate1 = $row.find(".birthdate1").text();
					let username = $row.find(".username").text();
					let email = $row.find(".email").text();
					let address = $row.find(".address").text();
					let contactno = $row.find(".contactno").text();
					let gender = $row.find(".gender").text();
					let status1 = $row.find(".status1").text();
					let usertype = $row.find(".usertype").text();
//					
//					
					$("#userid").val(id);
					$("#firstname").val(firstname);
					$("#middlename").val(middlename);
					$("#lastname").val(lastname);
					$("#birthdate1").val(birthdate1);
					$("#address").val(address);
					$("#username").val(username);
					$("#email").val(email);
					$("#contactno").val(contactno);
					$("#gender").val(gender);
					$("#status1").val(status1);
					$("#usertype").val(usertype);
					
					$("#editUser").modal("toggle");
					
					
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