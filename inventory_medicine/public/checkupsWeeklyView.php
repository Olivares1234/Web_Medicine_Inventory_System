<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css"/>
	<style>
	@media screen {
    #printSection {
        display: none;
    }
}
@media print {
    body * {
        visibility:hidden;
    }
    #printSection, #printSection * {
        visibility:visible;
    }
    #printSection {
        position:absolute;
        left:0;
        top:0;
    }
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
		 
}
	</style>
</head>
<body onload="print()">
<div class="container" id="printThis">
<center>
	<h3 style="margin-top: 30px"><span><i class="fas fa-clipboard-list fa-lg" style="color:teal;"></i></span> Total Checkups Daily Reports</h3>
<hr>
</center>
<table id="ready" cellspacing="0" width="100%"  class="myTables table  table-hover table-bordered table-condensed display nowrap table-responsive">
	<thead>
		<tr>
		    <th>ID</th>
			<th>Patient Name</th>
			<th>Age</th>
			<th>Date</th>
			<th>Status</th>
			<th>Comment</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		include("private/database.php");
		// no need if (isset) 
		$get_master_list = mysqli_query($conn, "SELECT id,patient_name,age,status,comment, DATE_FORMAT(date,'%a - %M. %d. %y') as date FROM tbl_checkups");
		while($row = mysqli_fetch_array($get_master_list)){
			
		?>
		<tr>
		<td><?php echo $row["id"];?></td>
		<td><?php echo $row["patient_name"];?></td>
		<td><?php echo $row["age"];?></td>
		<td><?php echo $row["date"];?></td>
		<td class="status1"><?php if ($row['status'] == 'Bad Condition') { ?>
		<span class="label label-danger"><?php echo $row['status']; ?></span>
		<?php } else { ?>
		<span class="label label-success"><?php echo $row['status']; ?></span>
		<?php } ?></td>
		<td><?php echo $row["comment"];?></td>
		</tr>
	</tbody>
	<?php } ?>
	
</table>
          <?php 
//			count dattable row
			$sql_count =  "SELECT COUNT(*) FROM tbl_checkups";
			$result =  mysqli_query($conn, $sql_count);
//			$row = mysql_fetch_array($result);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			echo "<h5>Showing ".$total." of ".$total."Total Daily Checkups</h5> ";
								
			}
			?>
</div>
<div class="container">
	 <button type="button" id="Print" class="btn btn-sm btn-primary float-left" data-toggle="modal" data-target="#"><i class="fas fa-print"></i> Print</button>
</div>
<script>
	
	document.getElementById("Print").onclick = function () {
    printElement(document.getElementById("printThis"));
};

function printElement(elem) {
    var domClone = elem.cloneNode(true);

    var $printSection = document.getElementById("printSection");

    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }

    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}
	</script>
</body>
</html>