<?php include( "./private/database.php"); 
if(isset($_POST[ "checkID"])){ $output="" ;
	$query="SELECT * FROM tbl_checkups WHERE id = '" .$_POST[ "checkID"]. "'"; 
	$result=mysqli_query($conn, $query); 
	$output .="
	<div class='table-responsive'>
	<table class='table table-bothered'>" ; 
	while($row=mysqli_fetch_array($result)) {
	$output .='
	<tr>
	<td width="30%"><label>PatientID:</label></td>
	<td width="70%">' .$row[ 'id']. '</td>
	</tr>
	<tr>
	<td width="30%"><label>Patient Name:</label></td>
	<td width="70%">'.$row[ 'patient_name']. '</td>
	</tr>
	<tr>
	<td width="30%"><label>Age:</label></td>
	<td width="70%">'.$row[ 'age']. '</td>
	</tr>
	<tr>
	<td width="30%"><label>Age:</label></td>
	<td width="70%">'.$row[ 'gender']. '</td>
	</tr>
	<tr>
	<td width="30%"><label>date:</label></td>
	<td width="70%">'.$row[ 'date']. '</td>
	</tr>
	<tr>
	<td width="30%"><label>Status:</label></td>
	<td width="70%">'.$row[ 'status']. '</td>
	</tr>
	<tr>
	<td width="30%"><label>Comment:</label></td>
	<td width="70%">'.$row[ 'comment']. '</td>
	</tr>
	'; 
	} 
		$output .="</table></div><hr>" ;
		echo $output; } ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Print</title>
    <!--	<link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">-->
    <style>
    @media screen {
            #printSection {
                display: none;
            }
        }
        
        @media print {
            body * {
                visibility: hidden;
            }
            #printSection,
            #printSection * {
                visibility: visible;
            }
            #printSection {
                position: absolute;
                left: 0;
                top: 0;
            }
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
    .table {
        overflow-x: auto;
    }
    .container {
        overflow-x: auto
    }
    </style>
</head>

<body onload="print()">
    <div class="container" id="printThis">
        <center>
            <h3 style="margin-top: 30px"><span><i class="fas fa-notes-medical fa-lg" style="color:teal;"></i></span> Details Checkups</h3>
            <hr>
        </center>
      <table id="ready" cellspacing="0" width="100%"  class="myTables table  table-hover table-bordered table-condensed display nowrap table-responsive">
            <thead>
                <tr>
                    <th>PatientID</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <?php include( "private/database.php"); 
				if(isset($_POST[ "checkID"])){ 
					$get_master_list=mysqli_query($conn, "SELECT * FROM tbl_checkups WHERE id = '".$_POST[ "checkID"]. "'"); 
					while($row=mysqli_fetch_array($get_master_list)){ 
				?>
                <tr>
                    <td>
                        <?php echo $row[ "id"];?>
                    </td>
                    <td>
                        <?php echo $row[ "patient_name"];?>
                    </td>
                    <td>
                        <?php echo $row[ "age"];?>
                    </td>
                                        <td>
                        <?php echo $row[ "gender"];?>
                    </td>
                    <td>
                        <?php echo $row[ "date"];?>
                    </td>
                    <td class="">
                        <?php if ($row[ 'status']=='Bad Condition' ) { ?>
                        <span class="label label-danger"><?php echo $row['status']; ?></span>
                        <?php } else { ?>
                        <span class="label label-success"><?php echo $row['status']; ?></span>
                        <?php } ?>
                    </td>
                    <td>
                        <?php echo $row[ "comment"];?>
                    </td>
            </tbody>
            <?php } ?>
            <?php } ?>
        </table>
    </div>
    <div class="container">
        <button type="button" id="Print" class="btn btn-sm btn-primary float-left" data-toggle="modal" data-target="#"><i class="fas fa-print"></i> Print</button>
    </div>
    <script>
        document.getElementById("Print").onclick = function() {
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