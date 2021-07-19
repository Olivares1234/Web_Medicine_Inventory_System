
<?php
include("./private/database.php");

if(isset($_POST["checkIDs2"])){
	
	$output = "";
	$query = "SELECT * FROM tbl_vaccination WHERE id = '".$_POST["checkIDs2"]."'";
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
	<td width="30%"><label>Patient Name:</label></td>
	<td width="70%">'.$row['patient_name'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Age:</label></td>
	<td width="70%">'.$row['age'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Gender:</label></td>
	<td width="70%">'.$row['gender'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Vaccine Name:</label></td>
	<td width="70%">'.$row['vaccine_name'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Day:</label></td>
	<td width="70%">'.$row['day'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Date:</label></td>
	<td width="70%">'.$row['date'].'</td>
	</tr>
	<tr>
	<td width="30%"><label>Comment:</label></td>
	<td width="70%">'.$row['comment'].'</td>
	</tr>
			';
	}
	$output .= "</table></div>";
	echo $output;
	
	
}
?>


    
