
<?php
include("./private/database.php");

if(isset($_POST["checkID"])){
	
	$output = "";
	$query = "SELECT * FROM tbl_residents WHERE id = '".$_POST["checkID"]."'";
	$result = mysqli_query($conn, $query);
	$output .= "
	<div class='table-responsive'>
	<table class='table table-bothered'>";
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
	
	<tr>
	<td width="30%"><label>ResidentID:</label></td>
	<td width="70%">'.$row['id'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Resident Name:</label></td>
	<td width="70%">'.$row['name'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Gender:</label></td>
	<td width="70%">'.$row['gender'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Age:</label></td>
	<td width="70%">'.$row['age'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Address:</label></td>
	<td width="70%">'.$row['address'].'</td>
	</tr>
    <tr>
	<td width="30%"><label>Civilstatus:</label></td>
	<td width="70%">'.$row['civilstatus'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Citizenship:</label></td>
	<td width="70%">'.$row['citizenship'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Contact No.:</label></td>
	<td width="70%">'.$row['contact_no'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Date:</label></td>
	<td width="70%">'.$row['date'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Vaccine:</label></td>
	<td width="70%">'.$row['vaccine'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Vaccinated:</label></td>
	<td width="70%">'.$row['vaccinated'].'</td>
	</tr>
			';
	}
	$output .= "</table></div>";
	echo $output;
	
	
}
?>


    
