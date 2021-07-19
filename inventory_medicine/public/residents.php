<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HCBPCL - Residents</title>
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
		div.dataTables_wrapper {
			width: 800 auto;
			margin: 0 auto;
		}
		.required{
			color: brown;
			font-weight:bold;
		}
		div.container {
        width: 80%;
    }
		  .table{
			    width:100%; 
    			margin-left:auto; 
    			margin-right:auto;
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
<?php session_start();?>
    <?php if(isset($_SESSION["username"])){
		$_SESSION["username"];
	}
	else{
		header("location:index.php");
	}
	?>
   <?php include("private/database.php"); ?>
    <?php include("includes/sidebar.php") ?>
     <?php include("includes/navbar.php") ?>
     
      
     <?php 
	//insert Residents
	$error="";
	if(isset($_POST["btnSubmit"])){
				$residentName = mysqli_real_escape_string($conn, $_POST["residentName"]);
				$gender1= mysqli_real_escape_string($conn, $_POST["gender1"]);
				$age = mysqli_real_escape_string($conn, $_POST["age"]);
				$address = mysqli_real_escape_string($conn, $_POST["address"]);
				$civilstatus = mysqli_real_escape_string($conn, $_POST["civilstatus"]);
				$citizenship = mysqli_real_escape_string($conn, $_POST["citizenship"]);
		        $contactNumber = mysqli_real_escape_string($conn, $_POST["contactNumber"]);
				$date = mysqli_real_escape_string($conn, $_POST["date"]);
				$vaccine1 = mysqli_real_escape_string($conn, $_POST["vaccine1"]);
				$vaccinated1 = mysqli_real_escape_string($conn, $_POST["vaccinated1"]);
		
		$insert_query = mysqli_query($conn, "INSERT INTO tbl_residents (name,gender,age,address,civilstatus,citizenship,contact_no,date,vaccine,vaccinated) VALUES ('$residentName','$gender1', '$age', '$address','$civilstatus','$citizenship','$contactNumber','$date','$vaccine1','$vaccinated1')");
					
	
			
			if($insert_query){
				$error ="<div class='alert alert-success' role='alert'>Successfully Updated!
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
				$residentsID = mysqli_real_escape_string($conn, $_POST["sub_id"]);
				$residentName = mysqli_real_escape_string($conn, $_POST["residentName"]);
				$gender = mysqli_real_escape_string($conn,  $_POST["gender"]);
				$age_res = mysqli_real_escape_string($conn, $_POST["age_res"]);
				$address = mysqli_real_escape_string($conn, $_POST["address"]);
				$civilstatus = mysqli_real_escape_string($conn, $_POST["civilstatus"]);
				$citizenship = mysqli_real_escape_string($conn, $_POST["citizenship"]);
		        $contactNumber = mysqli_real_escape_string($conn, $_POST["contactNumber"]);
				$date = mysqli_real_escape_string($conn, $_POST["date"]);
				$vaccine = mysqli_real_escape_string($conn, $_POST["vaccine"]);
				$vaccinated = mysqli_real_escape_string($conn, $_POST["vaccinated"]);
		
		$edit_query = mysqli_query($conn, "UPDATE tbl_residents SET name='$residentName', gender='$gender', age='$age_res', address='$address', civilstatus='$civilstatus', citizenship='$citizenship', contact_no='$contactNumber', date='$date', vaccine='$vaccine', vaccinated='$vaccinated' WHERE id='$residentsID'");
		
		
		if($edit_query){
			$error ="<div class='alert alert-success' role='alert'>Successfully Updated!
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
			echo "<script>alert('Data not Update')</script>";
		}
		

	}
		
	?>
	
	
	
	
           <!--	Delete Record-->
	<?php
//		if(isset($_GET["delete"])){
//		$residentsID = $_GET["delete"];
//		$delete_query = mysqli_query($conn, "DELETE FROM tbl_residents WHERE id=$residentsID");
//		if($delete_query){
//				$error ="<div class='alert alert-danger' role='alert'>Deleted Successfully!
//					<button class='close' data-dismiss='alert'><span>&times;</span></button></div>";
//		}
//		}
	if(isset($_POST["deletedata"])){
		
		$residentsID = $_POST["del_id"];
		$deletequery = mysqli_query($conn, "DELETE FROM tbl_residents WHERE id='$residentsID'");
//		$query_num = mysqli_query($conn, $query);
		
		if($deletequery){
			
			$error ="<div class='alert alert-danger' role='alert'>Deleted Successfully!
					<button class='close' data-dismiss='alert'><span>&times;</span></button></div>";
			
//			echo "<script> alert('Data  Deleted'); </script>";
			
			
		}
		else{
			echo "<script> alert('Data Not Deleted'); </script>";
		}
	}
			
	
	?>
	
	<?php 
	// Details Record View  Residents 
	if(isset($_POST["hid"])){
	$hid = $_POST(["hid"]);
	$query="SELECT * FROM tbl_checkups WHERE id='$hid'";
	$result = mysqli_query($conn, $query);
	}
	?>
	
	<!--	combobox selection vaccine inventory-->
	<?php
	$queryvaccines = mysqli_query($conn,"SELECT * FROM tbl_vaccines");
	?>
		<?php
	$queryvaccines1 = mysqli_query($conn,"SELECT * FROM tbl_vaccines");
	?>
	
	
	<div id="loading"></div>
            <div class="content">
				<!--Modal Add button Residents Upper Right-->
                   <div class="modal fade" id="residentsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-house-user  fa-2x" style="color:teal;"></i> <i class="fas fa-syringe  fa-2x" style="color:teal;"></i></span> <b>Add Record Residents</b></h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left">
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="residents.php" accept-charset="utf-8" autocomplete="off">
                                                        <div class="form-group">
                                                            <label for="supplier"><b>Required All Fields</b><span class="required">*</span></label>
                                                            <br>
                                                            <label for="Resident">Resident Name:</label><span class="required">*</span>
                                                            <input type="text" spellcheck="false" name="residentName" placeholder="Enter FullName..." class="form-control" required >
                                                        </div>
                                                          <div class="form-group" >
                                                            <label for="gender">Gender: </label><span class="required">*</span>
                                                            <select name="gender1" id="gender1" required >
                                                            <option value="">---Select Gender---</option><span class="required">*</span>
                                                            	<option value="Male">Male</option>
                                                            	<option value="Female">Female</option>
                                                            </select>
                                                            	<label for="Age">Age: </label><span class="required">*</span>
                                                            	<input type="number" style="text-align: center; width:100px;" name="age" id="age" min="0" max="" value="1" >
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="address">Address:</label><span class="required">*</span>
															  <textarea type="text" spellcheck="false" name="address" placeholder="Enter Address..." class="form-control" required></textarea>
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="brgy">Civil Status:</label><span class="required">*</span>
                                                            <input type="text" name="civilstatus" placeholder="Enter Civil Status..." class="form-control">
                                                        </div>
                                                         <div class="form-group">       
                                                            <label for="brgy">Citizenship:</label><span class="required">*</span>
                                                            <input type="text" spellcheck="false" name="citizenship" placeholder="Enter Citizenship..." class="form-control">
                                                        </div>
                                                        <div class="form-group">       
                                                            <label for="contact">Contact no.</label><span class="required">*</span>
                                                            <input type="text" spellcheck="false" name="contactNumber" placeholder="Enter Contact No..." class="form-control" required>
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="address">Date:</label><span class="required">*</span>
															  <input type="date" name="date" class="form-control" required>
                                                        </div>
                                                        	<div class="form-group">
																<label for="vaccines">Vaccines:</label><span>*</span>
																	<select name="vaccine1" name="vaccine1"  required>
																		<option value="select">---------Select Vaccine---------</option>
																		<option value="N/A">N/A</option>
																		<?php while($row=mysqli_fetch_array($queryvaccines)):;?>
									
																		<option value="<?php echo $row[2];?>"><?php echo $row[2];?></option>
																		<?php endwhile?>
																</select>
															</div>
                                                       
                                                        <div class="form-group">       
                                                            <label for="vaccinated1">Vaccinated:</label><span class="required">*</span>
                                                            <select name="vaccinated1" id="vaccinated1" required>
                                                            	<option value="">---Select---</option>
                                                            	<option value="Yes">Yes</option>
                                                            	<option value="No">No</option>
                                                            </select>
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
                                             
                                             <!--Pop Update/Edit Residents Record From DataTable Modal-->
                                      <div  class="modal fade" id="editsuppliersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-house-user fa-2x" style="color:teal;"></i></span> Edit Record Residents</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left">
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="residents.php" id="frmBox"  accept-charset="utf-8">
                                                        <div class="form-group">
                                                            <label for="supplier">ResidentID:<span class="required">*</span></label>
                                                            	<input type="text"  id="sub_id" name="sub_id" readonly="" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="supplier">Resident Name:<span class="required">*</span></label>
<!--                                                            	<input type="hidden"  id="sub_id" name="sub_id">-->
                                                            <input type="text" id="residentName" name="residentName" placeholder="Enter Residents Name..." class="form-control" required>
                                                        </div>
                                                          <div class="form-group" >
                                                            <label for="gender">Gender:<span class="required">*</span></label>
                                                            <select id="gender" name="gender" >
<!--                                                            	<option value="">---Select Gender---</option>-->
                                                            	<option value="Male">Male</option>
                                                            	<option value="Female">Female</option>
                                                            </select>
                                                             <label for="Age">Age:<span class="required">*</span></label>
                                                            <input type="number" style="text-align: center; width:100px;" name="age_res" id="age_res" min="0" max="" value="1">
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="address">Address:<span class="required">*</span></label>
															  <textarea type="text" spellcheck="false" id="address" name="address" placeholder="Enter Address..." class="form-control" required></textarea>
                                                        </div>
                                                         <div class="form-group">       
                                                            <label for="brgy">Civil Status:<span class="required">*</span></label>
                                                            <input type="text" spellcheck="false" name="civilstatus" id="civilstatus" placeholder="Enter Civil Status..." class="form-control">
                                                        </div>
                                                         <div class="form-group">       
                                                            <label for="brgy">Citizenship:<span class="required">*</span></label>
                                                            <input type="text" spellcheck="false" name="citizenship" id="citizenship" placeholder="Enter Citizenship..." class="form-control">
                                                        </div>
                                                        <div class="form-group">       
                                                            <label for="contact">Contact no.<span class="required">*</span></label>
                                                            <input type="text" id="contactNumber" name="contactNumber" placeholder="Enter Contact No..." class="form-control" required>
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="address">Date:<span class="required">*</span></label>
															  <input type="date" id="date" name="date" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">
																<label for="vaccines">Vaccines:</label><span class="required">*</span>
																	<select name="vaccine" id="vaccine" required>
																		<option value="select">---------Select Vaccine---------</option>
																		<option value="N/A">N/A</option>
																		<?php while($row1=mysqli_fetch_array($queryvaccines1)):;?>
																		
																		<option value="<?php echo $row1[2];?>"><?php echo $row1[2];?></option>
																		<?php endwhile?>
																		
																</select>
															</div>
                                                        <div class="form-group">       
                                                            <label for="vaccinated">Vaccinated:<span class="required">*</span></label>
                                                            <select id="vaccinated" name="vaccinated">
<!--                                                            	<option value="">---Select---</option>-->
                                                            	<option value="Yes">Yes</option>
                                                            	<option value="No">No</option>
                                                            </select>
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
                                              
                                               <!--Pop Warning Delete Record From DataTable modal--> 
                                     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-house-user fa-2x" style="color:teal;"></i></span> Delete Residents Data</h6>
                                                     <button class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                    <form method="post" action="residents.php" role="form">
                                                       <div class="modal-body">
                                                       	<input type="hidden"  id="del_id" name="del_id">
                                                       	<h6>Do you want to Delete this Data ??</h6>
                                                       </div>
                                                        <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
    												<button type="submit" name="deletedata" class="btn btn-warning">Yes !! Delete it.</button>
                                                          </div>
                                                   </form>
                                            	</div>
                                        	</div>
                                    	</div>
                                               
                                                    <!--Modal  Details Residents -->
                   <div class="modal fade" id="detailResidents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-house-user fa-2x" style="color:teal;"></i></span> Detail Record Residents</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left" >
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="residents.php" accept-charset="utf-8">
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
                                                
                                                
                                                
			    <div id="alert"  role="alert"><?php echo $error;?></div>            
                <div class="container-fluid">
                    <div class="page-title">
                        <h3><span><i class="fas fa-house-user  fa-lg" style="color:teal;"></i> <i class="fas fa-syringe  fa-lg" style="color:teal;"></i> Residents
                        <button type="button" class="btn btn-sm btn-outline-primary float-right" data-toggle="modal" data-target="#residentsModal"><i class="fas fa-house-user"></i> Add Residets</button>
                        </span>
                        </h3>
                    </div>
                    
                       <div class="box box-primary">
                        <div class="box-body">
                            <table style="cellspacing:0;" id="myTables" class=" table  table-hover table-bordered table-condensed display nowrap">
                                <thead >
                                    <tr>
                                        <th>ResidentID</th>
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody > 
                                  <?php 
								$getAll_query =  "SELECT * FROM tbl_residents";
									$sql =  mysqli_query($conn, $getAll_query);
								while($residents = mysqli_fetch_assoc($sql)){
									
								?>
                                    <tr>
                                        <td style="display:" class="id" ><?php echo $residents["id"];?></td>
                                        <td class="name"><?php echo $residents["name"];?></td>
                                        <td class="gender"><?php echo $residents["gender"];?></td>
                                        <td class="age"><?php echo $residents["age"];?></td>
                                        <td class="address"><?php echo $residents["address"];?></td>
                                        <td class="civilstatus"><?php echo $residents["civilstatus"];?></td>
                                        <td class="citizenship"><?php echo $residents["citizenship"];?></td>
	                       				<td class="contact_no"><?php echo $residents["contact_no"];?></td>
                         	            <td class="date"><?php echo $residents["date"];?></td>
                         	            <td class="vaccine"><?php echo $residents["vaccine"];?></td>
                          	            <td class="vaccinated"><?php echo $residents["vaccinated"];?></td>
                                        <td>
                                           <a href="residents.php?detail=<?php echo $residents["id"]?>" id="<?php echo $residents["id"]?>"  class="detail btn btn-outline-primary btn-rounded" name="btnEditModal"  data-toggle="modal"><i class="fas fa-eye" data-toggle="tooltip" title="Edit"></i> Detail</a>
                                            <a href="residents.php?edit=<?php echo $residents["id"]?>"  class="edit btn btn-outline-info btn-rounded" name="btnEditModal"  data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Edit"></i> Edit</a>
<!--                                            <a href="#?delete=<?php echo $residents["id"]?>"  class="delete btn btn-outline-danger btn-rounded deletebtn" name="btnDeleteModal"><i class="fas fa-trash"></i> Delete</a> -->
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
			$sql_count =  "SELECT COUNT(*) FROM tbl_residents";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total." Residents</h5> ";
								
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
		 $(document).ready(function() {
        $('#myTables').DataTable({
			"scrollX": true,
			
           
        })
}); // Always need here because for functions the popup button datatable next page
		
		  setTimeout(function(){
			$("#loading").fadeToggle();
					
					}, 1000);
    
		 
		 $('.deletebtn').on('click', function(){
			 $('#deleteModal').modal('show');
			 
			 $tr = $(this).closest('tr');
			 
			 var data = $tr.children('td').map(function(){
				 return $(this).text();
				 }).get();
			 console.log(data);
			  $('#del_id').val(data[0]);
			 
		 });
//				 
				
//				 
//			 });
//			 
		 
		
		//		Error alert show and time hide
		
		setTimeout(function(){
			document.getElementById("alert").style.display = "none";
					
					}, 3000);
		
		//			   Functions button edit jquery
		 
				$(".edit").click(function(){
					let $row = $(this).closest('tr');
					let id = $row.find(".id").text();
					let name = $row.find(".name").text();
					let gender = $row.find(".gender").text();
					let age = $row.find(".age").text();
					let address = $row.find(".address").text();
					let brgy = $row.find(".civilstatus").text();
					let citizenship = $row.find(".citizenship").text();
					let contact_no = $row.find(".contact_no").text();
					let date = $row.find(".date").text();
					let vaccine = $row.find(".vaccine").text();
					let vaccinated = $row.find(".vaccinated").text();
					
					
					$("#sub_id").val(id);
					$("#residentName").val(name);
					$("#gender").val(gender);
					$("#age_res").val(age);
					$("#address").val(address);
					$("#civilstatus").val(brgy);
					$("#citizenship").val(citizenship);
					$("#contactNumber").val(contact_no);
					$("#date").val(date);
					$("#vaccine").val(vaccine);
					$("#vaccinated").val(vaccinated);
					$("#editsuppliersModal").modal("toggle");
					
					
		
		 });  
		
		
//			$(document).ready(function(){ only one use fix pagination popupcommand
			
				 $(".detail").on('click', function(){
//					  $("#detailResidents").modal("toggle");
					 let checkID =  $(this).attr("id");
//					  $tr = $(this).closest('tr');
//			     let data = $tr.children('td').map(function(){
//				 return $(this).text();
//				 }).get();
//			 console.log(data);
//			  $('#hid').val(data[0]);
					 
					 
					 $.ajax({
						 url:"residentsView.php",
						 method:"post",
						 data:{checkID:checkID},
						 success:function(data){
							 $("#frmBox1").html(data);
							 $("#detailResidents").modal("toggle");
							 
						 }
					 });
				 
			 	});
//			});

		

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