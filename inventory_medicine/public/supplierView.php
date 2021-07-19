
<?php
include("./private/database.php");

if(isset($_POST["checkIDs"])){
	
	$output = "";
	$query = "SELECT * FROM tbl_suppliers WHERE id = '".$_POST["checkIDs"]."'";
	$result = mysqli_query($conn, $query);
	$output .= "
	<div class='table-responsive'>
	<table class='table table-bothered'>";
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
		
    <tr>
	<td width="30%"><label>ID:</label></td>
	<td width="70%">'.$row['id'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Supplier Name:</label></td>
	<td width="70%">'.$row['name'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Address:</label></td>
	<td width="70%">'.$row['address'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Contact No.:</label></td>
	<td width="70%">'.$row['contact_no'].'</td>
	</tr>
			';
	}
	$output .= "</table></div>";
	echo $output;
	
	
}
?>


    
