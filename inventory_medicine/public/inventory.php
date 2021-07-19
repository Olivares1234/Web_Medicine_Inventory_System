<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 , shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HCBPCL - Vaccines</title>
    <link rel="shortcut icon" type="image/png" href="./img/60a812843d3c929dce80a4b188beec51-injection-needle-by-vexels.png" sizes="1366x768">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <style>
    /*@viewport{*/
    /*    zoom:1.0;*/
    /*    width:extend-to-zoom;*/
    /*}*/
    /*@-ms-viewport{*/
        
    /*    width:extend-to-zoom;*/
    /*    zoom:1.0;*/
    /*}*/
		body{

		font-family: 'IBM Plex Sans', sans-serif;
			
	}
	input[type=file] {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 200px;
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
		th{
		   text-align: center;
		   background-color: #b4e8ff;
	   }
	   td{
		   text-align: center;
	   }
	   .required{
			color: brown;
			font-weight:bold;
		}
			#foot{
		color: black;
		}
		  .required{
			color: brown;
			font-weight:bold;
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
    <?php include("private/database.php"); ?>
     <?php include("includes/sidebar.php") ?>
     <?php include("includes/navbar.php") ?>
     
     <?php
     
     $error="";
	if(isset($_POST["btnSubmit"])){
				$vaccineName = mysqli_real_escape_string($conn,$_POST["name"]);
				$stocks = mysqli_real_escape_string($conn, $_POST["stocks"]);
				$supplier = mysqli_real_escape_string($conn, $_POST["supplier"]);
				$dateAdded = mysqli_real_escape_string($conn, $_POST["dateAdded"]);
				$dateExpired = mysqli_real_escape_string($conn, $_POST["dateExpired"]);
		        $files = $_FILES["file"];
				
					$filename = $files["name"];
					$fileerror = $files["error"];
					$filetmp = $files["tmp_name"];
					
					$fileext = explode(".",$filename);
					$filecheck = strtolower(end($fileext));
					
					$fileextstored = array("png","jpg","jpeg");
					
					if(in_array($filecheck,$fileextstored)){
						$destinationfile = "upload/".$filename;
						move_uploaded_file($filetmp,$destinationfile);
				
		
		$insert_query = mysqli_query($conn, "INSERT INTO tbl_vaccines(name,image,stocks,supplier,date_added,date_expire) VALUES ('$vaccineName','$destinationfile','$stocks','$supplier','$dateAdded','$dateExpired')");
			
			if($insert_query){
				$error ="<div class='alert alert-success' role='alert'>Successfully Added!<button class='close' data-dismiss='alert'><span>&times;</span></button></div>";
			}
		else{
			$error ="<div class='alert alert-success' role='alert'>Error Added!<button class='close' data-dismiss='alert'><span>&times;</span></button></div>";
			
			}
		}
	}
	
	?>
	
	
	
		<?php
	if(isset($_POST["btnImg"])){
				$vaccineIDs = mysqli_real_escape_string($conn, $_POST["vaccineIDs"]);
//				$name = mysqli_real_escape_string($conn,$_POST["name"]);
//				$stocks = mysqli_real_escape_string($conn, $_POST["stocks"]);
//				$supplier = mysqli_real_escape_string($conn, $_POST["supplier"]);
//				$dateAdded = mysqli_real_escape_string($conn, $_POST["dateAdded"]);
//				$dateExpired = mysqli_real_escape_string($conn, $_POST["dateExpired"]);
				$files1 = $_FILES["file2"];
			
				$filename1 = $files1["name"];
				$fileerror1 = $files1["error"];
				$filetmp1 = $files1["tmp_name"];
					
				$fileext1 = explode(".",$filename1);
				$filecheck1 = strtolower(end($fileext1));
					
				$fileextstored1 = array("png","jpg","jpeg");
			
				
		
				 
		if(in_array($filecheck1,$fileextstored1)){
						$destinationfile1 = "upload/".$filename1;
						move_uploaded_file($filetmp1,$destinationfile1);
			
				
		
		$edit_query1 = mysqli_query($conn, "UPDATE tbl_vaccines SET image='$destinationfile1' WHERE id='$vaccineIDs'");
	
		
		if($edit_query1){
			$error ="<div class='alert alert-success' role='alert'>Successfully Updated!
					<button class='close' data-dismiss='alert'><span>&times;</span></button></div>";
		}
		else{
			echo "<script>alert('Data not Update')</script>";
		}

    }
}
	
		
	?>
	
	
	
	
	
	  <!--	Update Edit Record-->
	<?php
	if(isset($_POST["btnUpdate"])){
				$vaccineID = mysqli_real_escape_string($conn, $_POST["vaccineID"]);
				$name = mysqli_real_escape_string($conn,$_POST["name"]);
				$stocks = mysqli_real_escape_string($conn, $_POST["stocks"]);
				$supplier = mysqli_real_escape_string($conn, $_POST["supplier"]);
				$dateAdded = mysqli_real_escape_string($conn, $_POST["dateAdded"]);
				$dateExpired = mysqli_real_escape_string($conn, $_POST["dateExpired"]);
//				$files = $_FILES["file1"];
//			
//				$filename = $files["name"];
//				$fileerror = $files["error"];
//				$filetmp = $files["tmp_name"];
//					
//				$fileext = explode(".",$filename);
//				$filecheck = strtolower(end($fileext));
//					
//				$fileextstored = array("png","jpg","jpeg");
			
				
		
				 
//		if(in_array($filecheck,$fileextstored)){
//						$destinationfile = "upload/".$filename;
//						move_uploaded_file($filetmp,$destinationfile);
			
				
		
		$edit_query = mysqli_query($conn, "UPDATE tbl_vaccines SET  name='$name', stocks='$stocks', supplier='$supplier', date_added='$dateAdded', date_expire='$dateExpired' WHERE id='$vaccineID'");
	
		
		if($edit_query){
			$error ="<div class='alert alert-success' role='alert'>Successfully Updated!
					<button class='close' data-dismiss='alert'><span>&times;</span></button></div>";
		}
		else{
			echo "<script>alert('Data not Update')</script>";
		}

//    }
}
	

		
	?>
	
	<?php 
	// Details Record View  Residents 
	if(isset($_POST["hid"])){
	$hid = $_POST(["hid"]);
	$query="SELECT * FROM tbl_vaccines WHERE id='$hid'";
	$result = mysqli_query($conn, $query);
	}
	?>

	

               <div class="content">
				<!--Modal Add button Vaccines Upper Right-->
                   <div class="modal fade" id="vaccineModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-vial  fa-2x" style="color:teal;"></i> <i class="fas fa-syringe  fa-2x" style="color:teal;"></i></span> Add New Record Vaccines</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left">
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="inventory.php" accept-charset="utf-8" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                           <label for="supplier"><b>Required All Fields</b><span class="required">*</span></label>
                                                            <br>
                                                            <label for="vaccineName">Vaccine Name:</label><span class="required">*</span>
                                                            <input type="text" spellcheck="false" name="name" placeholder="Enter Vaccine Name..." class="form-control" required>
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="stocks">Stocks:</label><span class="required">*</span>
															 <input type="number" name="stocks" min="0" max="" value="1" class="form-control">
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="date">Supplier:</label><span class="required">*</span>
															  <input type="text" name="supplier" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">       
                                                            <label for="dateAdded">Date Added:</label><span class="required">*</span>
															<input type="date" name="dateAdded" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">       
                                                            <label for="dateExpired">Date Expired:</label><span class="required">*</span>
															<input type="date" name="dateExpired" class="form-control" required>
                                                        </div>
                                                         <div class="form-group">       
                                                            <label for="stocks">Images:</label><span class="required">*</span>
															 <input type="file" name="file" class="form-control-sm" onChange="img_pathUrl(this);">
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
                                    
                                    
                                    									<!--Modal Update PopUp Details Vaccine Medicine -->
                                     <div class="modal fade" id="vaccineModalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-vial  fa-2x" style="color:teal;"></i> <i class="fas fa-syringe  fa-2x" style="color:teal;"></i></span> Edit Record Vaccines</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left">
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="inventory.php" id="frmBox" accept-charset="utf-8" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                          <input type="hidden" name="vaccineID" id="vaccineID">
                                                           <label for="supplier"><b>Required All Fields</b><span class="required">*</span></label>
                                                            <br>
                                                            <label for="vaccineName">Vaccine Name:</label><span class="required">*</span>
                                                            <input type="text" spellcheck="false" name="name" id="name" placeholder="Enter Vaccine Name..." class="form-control" required>
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="stocks">Stocks:</label><span class="required">*</span>
															 <input type="number" name="stocks" id="stocks" min="0" max="" value="1" class="form-control">
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="date">Supplier:</label><span class="required">*</span>
															  <input type="text" name="supplier" id="supplier" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">       
                                                            <label for="dateAdded">Date Added:</label><span class="required">*</span>
															<input type="date" name="dateAdded" id="dateAdded" class="form-control" required>
                                                        </div>
                                                        <div class="form-group">       
                                                            <label for="dateExpired">Date Expired:</label><span class="required">*</span>
															<input type="date" name="dateExpired" id="dateExpired" class="form-control" required>
                                                        </div>
<!--
                                                           <div class="form-group">       
                                                            <label for="stocks">Images:</label><span class="required">*</span>
															 <input type="file" name="file1" id="file1" class="form-control-sm" onChange="img_pathUrl(this);">
                                                        </div>
-->
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
                                    
                                    
                                                                     <!--Modal PopUp Details Vaccine Medicine -->
                   <div class="modal fade" id="detailInventory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-vial  fa-2x" style="color:teal;"></i> <i class="fas fa-syringe  fa-2x" style="color:teal;"></i></span>   Detail Record Vaccines</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left" >
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="supplier.php" accept-charset="utf-8">
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
                                    
                                    
															<!--Modal PopUp Change Images Vaccine Medicine -->
                   <div class="modal fade" id="changeImg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-vial  fa-2x" style="color:teal;"></i> <i class="fas fa-syringe  fa-2x" style="color:teal;"></i></span>   Do you want to change Image?</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                               
                                                <div class="modal-body text-left" >
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="inventory.php" accept-charset="utf-8" enctype="multipart/form-data">
                                                          <div class="form-group">  
                                                           <label for="supplier"><b>Required All Fields</b><span class="required">*</span></label>
                                                            <br>     
                                                            <label for="Image">Image:</label><span class="required">*</span>
                                                              <div class="form-group"> 
                                                              <input type="hidden" name="vaccineIDs" id="vaccineIDs">
                                                            	<img src="" name="file1" id="img_url" class="img-thumbnail" alt="No Images Found" onclick="image(this)">
															</div>
															 <input type="file" name="file2" id="file2" class="form-control-sm" onChange="img_pathUrl(this);" required>
                                                        </div>

                                                        <div class="text-left">       
<!--                                                            <button type="submit" name="btnUpdate" class="btn btn-primary" >Print</button>-->
<!--                                                            <a href="checkupView.php" class="btn btn-primary"><span>Print</span></a>-->
<!--                                                            <button type="button" id="Print" class="btn btn-primary">Print</button>-->
                                                        <div class="form-group">       
                                                            <button type="submit" name="btnImg" class="btn btn-primary" >Submit</button>
                                                        </div>
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
                        <h2><span><i class="fas fa-vial  fa-lg" style="color:teal;"></i> <i class="fas fa-syringe  fa-lg" style="color:teal;"></i></span> Vaccines 
<!--                            <a href="roles.html" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-prescription-bottle-alt"></i> Add Vaccine</a>-->
 <button type="button" class="btn btn-sm btn-outline-primary float-sm-right" data-toggle="modal" data-target="#vaccineModal"><i class="fas fa-prescription-bottle-alt"></i> Add Vaccines</button>
                           
                        </h2>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%"  id="myTables"  class="table  table-hover table-bordered table-condensed display nowrap"  id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>   
                                        <th>Vaccine Name</th>    
                                        <th style="display:none">Stocks</th>
                                        <th>Stocks</th>
                                        <th>Supplier</th>
                                        <th>Date Added</th>
                                        <th>Expiration Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
								$getAll_query =  "SELECT * FROM tbl_vaccines";
									$sql =  mysqli_query($conn, $getAll_query);
								while($inventory = mysqli_fetch_assoc($sql)){
									
								?>
                                    <tr>
                                    
                                    	<td class="id" ><?php echo $inventory["id"];?></td>
                                       	<td class="image"><img src="<?php echo $inventory["image"];?>" height="100px" width="100px" onclick="image(this)" class="rounded-circle" alt="No Images Found"></td>
                                        <td class="name"><?php echo $inventory["name"];?></td>
                                        <td style="display:none" class="stocks"><?php echo $inventory["stocks"];?></td>
                                        <td class=""><?php if ($inventory['stocks'] <= 0) { ?>
										<span class="label label-danger"><?php echo $inventory['stocks']; ?></span>
										<?php } elseif ($inventory['stocks'] <= 15) { ?>
										<span class="label label-warning"><?php echo $inventory['stocks']; ?></span>
										<?php } else { ?>
										<span class="label label-success"><?php echo $inventory['stocks']; ?></span>
										<?php } ?></td>
                                        <td class="supplier"><?php echo $inventory["supplier"];?></td>
                                        <td class="date_added"><?php echo $inventory["date_added"];?></td>
                                         <td class="date_expire"><?php echo $inventory["date_expire"];?></td>
           
                                        <td>
                                           <a href="inventory.php?detail=<?php echo $inventory["id"]?>" id="<?php echo $inventory["id"]?>"  class="detail btn btn-outline-primary btn-rounded" name="btnEditModal"  data-toggle="modal"><i class="fas fa-eye" data-toggle="tooltip" title="Detail"></i> Detail</a>
                                            <a href="inventory.php?edit=<?php echo $inventory["id"]?>"  class="edit btn btn-outline-info btn-rounded" name="btnEditModal"  data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Edit"></i> Edit</a>
                                             <a href="inventory.php?Img=<?php echo $inventory["id"]?>" id="<?php echo $inventory["id"]?>"  class=" img btn btn-outline-secondary btn-rounded" name="btnEditModal" data-toggle="modal"><i class="fas fa-image" data-toggle="tooltip" title="Edit"></i> change</a>
<!--                                            <a href="#?delete=<?php ?>"  class="delete btn btn-outline-danger btn-rounded deletebtn" name="btnDeleteModal"><i class="fas fa-trash"></i> Delete</a> -->
										</td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
			<?php 
//			count dataTable row
			$sql_count =  "SELECT COUNT(*) FROM tbl_vaccines";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total." Vaccines</h5> ";
								
			}
			?>
                </div>
            </div>
<!--

  
-->
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
			 
        });
 });  // Always need here because for functions the popup button datatable next page
			 
			 
			 //		Error alert show and time hide
    
		setTimeout(function(){
			document.getElementById("alert").style.display = "none";
					
					}, 3000);
			 
			 
			 
			 // Functions button edit jquery
		 
				$(".edit").click(function(){
					let $row = $(this).closest('tr');
					let id = $row.find(".id").text();
					let image = $row.find(".image").text();
					let name = $row.find(".name").text();
					let stocks = $row.find(".stocks").text();
                    let supplier = $row.find(".supplier").text();
					let date_added = $row.find(".date_added").text();
					let date_expire = $row.find(".date_expire").text();
					
					
					$("#vaccineID").val(id);
					$("#name").val(name);
					$("#file1").val(image);
					$("#stocks").val(stocks);
					$("#supplier").val(supplier);
					$("#dateAdded").val(date_added);
					$("#dateExpired").val(date_expire);
					$("#vaccineModalUpdate").modal("toggle");
					
					
			});
		
		 // Functions button edit jquery
		 
				$(".img").click(function(){
					
				    let $row = $(this).closest('tr');
					let id = $row.find(".id").text();
					let image = $row.find(".image").text();
					
				
					
				
					
					
					$("#vaccineIDs").val(id);
					
					$("#file2").val(image);
					
					
					$("#changeImg").modal("toggle");
					
					
			});
		
		
		 
			
		
			 
			 
			 
			 // View Details Vacccine Inventory
			 
			  $(".detail").on('click', function(){
					 let checkID1 =  $(this).attr("id");
 
					 
					 $.ajax({
						 url:"inventoryView.php",
						 method:"post",
						 data:{checkID1:checkID1},
						 success:function(data){
							 $("#frmBox1").html(data);
							 $("#detailInventory").modal("toggle");
							 
						 }
					 });
				 
			 	});
		
		
		 function img_pathUrl(input){
			 $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    	}
		
		function image(img){
			var src = img.src;
			window.open(src);
			
		}
	
		
		
		
		
		
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