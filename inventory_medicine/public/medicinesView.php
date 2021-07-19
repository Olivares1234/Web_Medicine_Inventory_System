
<?php
include("./private/database.php");

if(isset($_POST["checkID2"])){
	
	$output = "";
	$query = "SELECT * FROM tbl_medicines WHERE id = '".$_POST["checkID2"]."'";
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
	<td width="30%"><label>Medicine Name:</label></td>
	<td width="70%">'.$row['name'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Stocks:</label></td>
	<td width="70%">'.$row['stocks'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Supplier:</label></td>
	<td width="70%">'.$row['supplier'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Date Added:</label></td>
	<td width="70%">'.$row['date_added'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Expiration Date:</label></td>
	<td width="70%">'.$row['date_expire'].'</td>
	</tr>
			';
	}
	$output .= "</table></div>";
	echo $output;
	
	
}
?>


    
