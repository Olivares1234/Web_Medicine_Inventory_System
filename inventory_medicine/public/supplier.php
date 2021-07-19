<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HCBPCL - Suppliers</title>
     <!--  extension GoogleFonts  -->
     <link rel="shortcut icon" type="image/png" href="./img/60a812843d3c929dce80a4b188beec51-injection-needle-by-vexels.png" sizes="1366x768">
      <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
       <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<!--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css"/>-->
    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
<!--   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">-->

 
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
	   div.dataTables_wrapper {
			width: 800 auto;
			margin: 0 auto;
		}
	   .required{
			color: brown;
			font-weight:bold;
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
     <?php include("includes/sidebar.php"); ?>
     <?php include("includes/navbar.php"); ?>
     
     
     <?php 
	//insert Supplier
	$error="";
	if(isset($_POST["btnSubmit"])){
				$supplierName = mysqli_real_escape_string($conn, $_POST["supplierName"]);
				$address = mysqli_real_escape_string($conn,$_POST["address"]);
				$contactNumber = mysqli_real_escape_string($conn,$_POST["contactNumber"]);
		
		$insert_query = mysqli_query($conn, "INSERT INTO tbl_suppliers (name,address,contact_no) VALUES ('$supplierName','$address', '$contactNumber')");
					
	
			
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
		$supplierID = mysqli_real_escape_string($conn, $_POST["id"]);
		$supplierName = mysqli_real_escape_string($conn, $_POST["supplierName"]);
		$address = mysqli_real_escape_string($conn, $_POST["address"]);
		$contactNumber = mysqli_real_escape_string($conn, $_POST["contactNumber"]);
		
		$edit_query = mysqli_query($conn, "UPDATE tbl_suppliers SET name='$supplierName', address='$address', contact_no='$contactNumber' WHERE id='$supplierID'");
		
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
			echo "<script>alert('Data not Deleted')</script>";
		}

	}
	?>
<!--	Delete Record-->
	<?php
//	if(isset($_GET["delete"])){
//		$supplierID = $_GET["delete"];
//		$delete_query = mysqli_query($conn, "DELETE FROM tbl_suppliers WHERE id=$supplierID");
//		if($delete_query){
//				$error ="<div class='alert alert-danger' role='alert'>Deleted Successfully!
//					<button class='close' data-dismiss='alert'><span>&times;</span></button></div>";
//			
//		}
//		
//	}
	if(isset($_POST["deletedata"])){
		
		$supplierID = $_POST["sup_id"];
		$deletequery = ("DELETE FROM tbl_suppliers WHERE id='$supplierID'");
		$deleteRecord = mysqli_query($conn, $deletequery);
		
		if($deleteRecord){
			
			$error ="<div class='alert alert-danger' role='alert'>Deleted Successfully!
					<button class='close' data-dismiss='alert'><span>&times;</span></button></div><audio id='soundHandle' style='display: none;'></audio>";
			
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
	$query="SELECT * FROM tbl_suppliers WHERE id='$hid'";
	$result = mysqli_query($conn, $query);
	}
	?>
                 <div id="loading"></div>
                <div class="content">
                <div class="modal fade" id="suppliersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-ambulance fa-2x" style="color:teal;"></i></span> Add Supplier</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left">
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="supplier.php" accept-charset="utf-8">
                                                        <div class="form-group">
                                                            <label for="supplier"><b>Required All Fields</b><span class="required">*</span></label>
                                                            <br>
                                                            <label for="supplier">Supplier Name:</label><span class="required">*</span>
                                                            <input type="text" name="supplierName" placeholder="Supplier Name" spellcheck="false" class="form-control" required>
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="address">Address:</label><span class="required">*</span>
															  <textarea type="text" name="address" placeholder="Address" spellcheck="false" class="form-control" required></textarea>
                                                        </div>
<!--
                                                          <div class="form-group">       
                                                            <label for="password">LastName:</label>
                                                            <input type="text" name="password" placeholder="LastName" class="form-control">
                                                        </div>
-->
                                                        <div class="form-group">       
                                                            <label for="contact">Contact No.</label><span class="required">*</span>
                                                            <input type="text" name="contactNumber" placeholder="Contact No." spellcheck="false" class="form-control" required>
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
                                    
<!--                                    Pop Update/Edit supplier Record From DataTable Modal-->
                                      <div  class="modal fade" id="editsuppliersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-ambulance fa-2x" style="color:teal;"></i></span> Edit Supplier</h5>
                                                        <button  class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body text-left">
<!--                                                    <p>Add User</p>-->
                                                    <form method="POST" action="supplier.php" accept-charset="utf-8">
                                                        <div class="form-group">
                                                            <label for="supplier">Supplier Name:</label>
                                                             <input type="hidden" id="id" name="id"  class="form-control" required>
                                                            <input type="text" id="supplierName" name="supplierName" placeholder="Supplier Name" class="form-control" required>
                                                        </div>
                                                          <div class="form-group">       
                                                            <label for="address">Address:</label>
															  <textarea type="text" id="address" name="address" placeholder="Address" class="form-control" required spellcheck="false"></textarea>
                                                        </div>
                                              <div class="form-group">       
                                                            <label for="contact">Contact No.</label>
                                                            <input type="text" id="contactNumber" name="contactNumber" placeholder="Contact No." class="form-control" required>
                                                        </div>
                                                        <div class="form-group">       
                                                            <button type="submit" name="btnUpdate" class="btn btn-primary" >Update</button>
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
                                                    <h6 class="modal-title" id="exampleModalLabel">Delete Supplier Data</h6>
                                                     <button class="btn btn-danger" data-dismiss="modal">&times;</button>
                                                </div>
                                                    <form method="post" action="supplier.php" role="form">
                                                       <div class="modal-body">
                                                       	<input type="hidden"  id="sup_id" name="sup_id">
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
                                   
                                   
                                   
                                                                    <!--Modal  Details Suppliers -->
                   <div class="modal fade" id="detailsSupplier" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span><i class="fas fa-ambulance fa-2x" style="color:teal;"></i></span> Detail Record Supplier</h5>
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
                                    
<!--			    button modal upper-->
            
               <div id="alert" role="alert"><?php echo $error;?></div>
                <div class="container-fluid">
                    <div class="page-title">
						<h3><span><i class="fas fa-ambulance fa-lg" style="color:teal;"></i></span> <b>Suppliers</b> 
                           <button type="button" class="btn btn-sm btn-outline-primary float-sm-right" data-toggle="modal" data-target="#suppliersModal"><i class="fas fa-ambulance"></i> Add Supplier</button>
                        </h3>
                    </div>
<!--                    table content-->
                    <div class="box box-primary">
                        <div class="box-body">
                            <table  style="cellspacing:0; width:100%;"  id="myTables" class="table  table-hover table-bordered table-condensed display nowrap" >
                                <thead >
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact No</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody > 
                                  <?php 
								$getAll_query =  "SELECT * FROM tbl_suppliers";
									$sql =  mysqli_query($conn, $getAll_query);
								while($supplier = mysqli_fetch_array($sql)){
									
								?>
                                    <tr>
<!--
                                        <td>1</td>
                                        <td>Phzer</td>
                                        <td>1233 Building 1, Sta.Rosa, Laguna</td>
                                        <td>1123-1123-2</td> -->
                                        
                                        <td class="id"><?php echo $supplier["id"];?></td>
                                        <td class="name"><?php echo $supplier["name"];?></td>
                                        <td class="address"><?php echo $supplier["address"];?></td>
                                        <td class="contact_no"><?php echo $supplier["contact_no"];?></td>
                                        <td>
                                            <a href="supplier.php?detail=<?php echo $supplier["id"]?>" id="<?php echo $supplier["id"]?>"  class="detail btn btn-outline-primary btn-rounded" name="btnEditModal"  data-toggle="modal"><i class="fas fa-eye" data-toggle="tooltip" title="Edit"></i> Detail</a>
                                            <a href="supplier.php?edit=<?php echo $supplier["id"]?>"  class="edit btn btn-outline-info btn-rounded" name="btnEditModal"  data-toggle="modal"><i class="fas fa-pen" data-toggle="tooltip" title="Edit"></i> Edit</a>
<!--                                            <a href="#?delete=<?php ?>"  class="delete btn btn-outline-danger btn-rounded deletebtn" name="btnDeleteModal"><i class="fas fa-trash"></i> Delete</a> -->
<!--                                            <a href="supplier.php?delete=<?php ?>"  class="delete btn btn-outline-danger btn-rounded" name="btnDeleteModal" onClick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash"></i></a>-->
									
										</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
             <?php 
//			count dattable row
			$sql_count =  "SELECT COUNT(*) FROM tbl_suppliers";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total." Suppliers</h5> ";
								
			}
			?>
  		</div>
  </div>
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    
<!--    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>-->
          
<!--
       <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
       <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>     
-->
    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
    <script src="assets/vendor/DataTables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>
          <script>

			
</script>
 
<!--    For Datatable load-->
    <script type="text/javascript">
//	 $(document).ready(function(){
//			 $("#myTables").dataTable()
//				 "scrollX": true;
//			 
//		 	  
//			 
//		 });
		$(document).ready(function() {
        $('#myTables').DataTable({
			"scrollX": true
//			responsive:true;
           
        });
			
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
			  $('#sup_id').val(data[0]);
			 
			 
		 });
   
   
//		Error alert show and time hide
    
		setTimeout(function(){
			document.getElementById("alert").style.display = "none";
					
					}, 3000);
   
    
    
//			   Functions button edit jquery
		 
				$(".edit").click(function(){
					let $row = $(this).closest('tr');
					let id = $row.find(".id").text();
					let name = $row.find(".name").text();
					let address = $row.find(".address").text();
					let contact_no = $row.find(".contact_no").text();
					
					
					$("#id").val(id);
					$("#supplierName").val(name);
					$("#address").val(address);
					$("#contactNumber").val(contact_no);
					
					$("#editsuppliersModal").modal("toggle");
					
					
			});
		
		
//		       View Details Supplier
			 $(".detail").on('click', function(){
					 let checkIDs =  $(this).attr("id");
 
					 
					 $.ajax({
						 url:"supplierView.php",
						 method:"post",
						 data:{checkIDs:checkIDs},
						 success:function(data){
							 $("#frmBox1").html(data);
							 $("#detailsSupplier").modal("toggle");
							 
						 }
					 });
				 
			 	});
		
//		  function play_sound() {
//        var audioElement = document.createElement('audio');
//        audioElement.setAttribute('src', '../assets/music/success_message.mp3');
//        audioElement.setAttribute('autoplay', 'autoplay');
//        audioElement.load();
//        audioElement.play();
//    }
			
			
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