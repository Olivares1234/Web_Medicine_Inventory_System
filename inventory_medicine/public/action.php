
<?php
// include database connection file
 include("private/database.php");
 
if(isset($_POST["from_date"], $_POST["to_date"])) {
    $orderData = "";
    $query = "SELECT * FROM tbl_checkups WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'";
    $result = mysqli_query($conn, $query);
 
    $orderData .='
    <table class="table  table-hover table-bordered table-condensed display nowrap">
    <tr>
   	<th>ID</th>
   	<th>Patient Name</th>
   	<th>Age</th>
   	<th>Date</th>
   	<th>Status</th>
   	<th>Comment</th>
    </tr>';
	
 
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $orderData .='
            <tr>
			<td>'.$row["id"].'</td>
            <td>'.$row["patient_name"].'</td>
            <td>'.$row["age"].'</td>
			<td>'.$row["date"].'</td>
            <td>'.$row["status"].'</td>
            <td>'.$row["comment"].'</td>
            </tr>';
        }
    }
    else
    {
        $orderData .= '
        <tr>
        <td colspan="5">No Order Found</td>
        </tr>';
    }
    $orderData .= '</table>';
    echo $orderData;
}
?>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
							
							<!-- extension responsive -->
							<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
							<!--    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>-->

<!--							<script src="assets/vendor/jquery3/jquery.min.js"></script>-->
							<script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
							<script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
							<script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
							<script src="assets/vendor/DataTables/datatables.min.js"></script>
							<script src="assets/js/initiate-datatables.js"></script>
							<script src="assets/js/script.js"></script>

							<script type="text/javascript">
									$(document).ready(function() {
									$('#myTables').DataTable({
										"scrollX": true,
										 
											

									})
								});
								//		Error alert show and time hide

</script>