<!-- header -->
<?php 
session_start();
include("includes/header.php");
include("private/database.php"); 
include("private/functions.php"); 

 if(isset($_SESSION["username"])){
	$_SESSION["username"];
}
else{
	header("location:index.php");
	die();
}




// header 
include("includes/header.php"); 
//END header 
//sidebar
include("includes/sidebar.php"); 
// END sidebar 
// navbar 
 include("includes/navbar.php"); 
// END navbar
	?>


			<?php 
//			Count Show widget Residents
			$sql_count =  "SELECT COUNT(*) FROM tbl_residents";
			$result =  mysqli_query($conn, $sql_count);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			$totalResidents = $total;					
			}
			?>

 			<?php 
//			Count Show widget Suppliers
			$sql_count =  "SELECT COUNT(*) FROM tbl_suppliers";
			$result =  mysqli_query($conn, $sql_count);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			$totalSupplier = $total;					
			}
			?>
			
			<?php 
//			Count Show widget Total Residents Vaccinated Today
			$sql_count =  "SELECT COUNT(*) FROM tbl_residents WHERE vaccinated='Yes' AND DATE(`date`) = CURDATE()";
			$result =  mysqli_query($conn, $sql_count);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			$totalResidents1 = $total ;					
			}
			?>
			
			<?php 
//			Count Show widget Total Residents Vaccinated Today
			$sql_count =  "SELECT COUNT(*) FROM tbl_checkups WHERE DATE(`date`) = CURDATE()";
			$result =  mysqli_query($conn, $sql_count);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			$totalCheckups = $total;					
			}
			?>

			
			<?php 
//			Count Show widget Total Negative Vaccinated Today
			$sql_count =  "SELECT COUNT(*) FROM tbl_checkups WHERE status='Good Condition'";
			$result =  mysqli_query($conn, $sql_count);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			$totalNegative = $total;					
			}
			?>
			
			<?php 
//			Count Show widget Total Positive Vaccinated Today
			$sql_count =  "SELECT COUNT(*) FROM tbl_checkups WHERE status='Bad Condition'";
			$result =  mysqli_query($conn, $sql_count);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			$totalPositive = $total;					
			}
			?>
			
			<?php 
//			Count Show widget Total Critical Stocks
			$sql_count =  "SELECT COUNT(*) FROM tbl_vaccines WHERE stocks='0'";
			$result =  mysqli_query($conn, $sql_count);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			$totalCriticalStock = $total;					
			}
			?>
			
			<?php 
//			Count Show widget Total Users
			$sql_count =  "SELECT COUNT(*) FROM tbl_users";
			$result =  mysqli_query($conn, $sql_count);
	        while($row = mysqli_fetch_array($result)){
			$total = $row[0];
			$totalUsers = $total;					
			}
			?>
			
		
		 <div id="loading"></div>	
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
			<a href="residents.php">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="teal fas fa-house-user"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center">
									<p>Residents</p>
									<span class="number"><?php echo $totalResidents ?></span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							   <div class="stats">
								Total Residents
							</div> 
						</div>
					</div>
				</div>
				</a>
			</div>
			
			<?php if($_SESSION['usertype'] != 'HealthWorker'){?>
			<?php if($_SESSION['usertype'] != 'Nurse'){?>
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
			<a href="inventory.php">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="olive fas fa-prescription-bottle-alt"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center">
									<p>Stocks</p>
									<span class="number"><?php echo $totalCriticalStock ?></span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							  <div class="stats">
									Critical Stocks
							</div> 
						</div>
					</div>
				</div>
				</a>
			</div>
			<?php } ?>
			<?php } ?>
			
			<?php if($_SESSION['usertype'] != 'HealthWorker'){?>
			<?php if($_SESSION['usertype'] != 'Nurse'){?>
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
			<a href="users.php">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="violet fas fa-users"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center">
									<p>Users</p>
									<span class="number"><?php echo $totalUsers ?></span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							   <div class="stats">
								Total Users
							</div> 
						</div>
					</div>
				</div>
				</a>
			</div>
			<?php } ?>
			<?php } ?>
			
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
			<a href="reportVaccinatedToday.php">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="fas fa-hand-holding-medical" style="color:cadetblue"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center">
									<p>Total Residents Vaccinated Today</p>
									<span class="number"><?php echo $totalResidents1 ?></span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							    <div class="stats">
								Total Vaccinated Today
							</div> 
						</div>
					</div>
				</div>
				</a>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
				<a href="reportNegative.php">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="fas fa-user-plus" style="color:green"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center">
									<p>Good Condition</p>
									<span class="number"><?php echo $totalNegative ?></span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							  <div class="stats">
								Total Good Conditions Checkups
								
							</div> 
						</div>
					</div>
				</div>
				</a>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
			<a href="reportPositive.php">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="fas fa-user-injured" style="color:red"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center">
									<p>Bad Condition</p>
									<span class="number"><?php echo $totalPositive ?></span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							   <div class="stats">
								Total Bad Conditions Checkups
							</div> 
						</div>
					</div>
				</div>
				</a>
			</div>
			
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
			<a href="reportCheckupsToday.php">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="fas fa-clipboard-list" style="color:sandybrown"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center">
									<p>Total Checkups Today</p>
									<span class="number"><?php echo $totalCheckups ?></span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							  <div class="stats">
								Total Today Checkups
							</div> 
						</div>
					</div>
				</div>
				</a>
			</div>
				
			<?php if($_SESSION['usertype'] != 'HealthWorker'){?>
			<?php if($_SESSION['usertype'] != 'Nurse'){?>
			<div class="col-sm-6 col-md-6 col-lg-3 mt-3">
			<a href="supplier.php">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="col-sm-4">
								<div class="icon-big text-center">
									<i class="fas fa-ambulance" style="color:maroon"></i>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="detail text-center">
									<p>Suppliers</p>
									<span class="number"><?php echo $totalSupplier ?></span>
								</div>
							</div>
						</div>
						<div class="footer">
							<hr />
							  <div class="stats">
								Total Suppliers
							</div> 
						</div>
					</div>
				</div>
				</a>
			</div>
			<?php } ?>
			<?php } ?>
		</div>
		
<!--
		 <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h4 class="mb-0">Daily Vaccination</h4>
                                        <p class="text-muted">Vaccination overview per day</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="trafficflow"></canvas>
                                    </div>
                                    <div class="ui hidden divider"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h4 class="mb-0">Daily Checkups</h4>
                                        <p class="text-muted">Checkups overview per day</p>
                                    </div>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="sales"></canvas>
                                    </div>
                                    <div class="ui hidden divider"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
-->
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                       <a href="monthlyvaccinated.php">
                                    <div class="head">
                                        <h4 class="mb-0">Monthly Vaccination</h4>
                                        <p class="text-muted">Vaccination overview per month</p>
                                         <?php include("chart_monthly_vaccinated.php"); ?>
                                    </div>
									</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                   <a href="residentsYealy.php">
                                    <div class="head">
                                        <h4 class="mb-0">Yearly Vaccination</h4>
                                        <p class="text-muted">Vaccination overview per year</p>
                                      <?php include("chart_yearly_vaccinated.php"); ?>
                                    </div>
									</a>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                   <a href="weeklyReportResidents.php">
                                    <div class="head">
                                        <h4 class="mb-0">Daily Vaccinated</h4>
                                        <p class="text-muted">Vaccinated overview per day</p>
                                         <?php include("chart_daily_vaccinated.php"); ?>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
						
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <a href="checkupsWeekly.php">
                                    <div class="head">
                                        <h4 class="mb-0">Daily Checkups</h4>
                                        <p class="text-muted">Checkups overview per day</p>
                                         <?php include("chart_daily_checkups.php"); ?>
                                    </div>
									</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
		<!-- Footer -->
		<!--     <div class="row">
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="dfd text-center">
								<i class="blue large-icon mb-2 fas fa-thumbs-up"></i>
								<h4 class="mb-0">+21,900</h4>
								<p class="text-muted">FACEBOOK PAGE LIKES</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="dfd text-center">
								<i class="orange large-icon mb-2 fas fa-reply-all"></i>
								<h4 class="mb-0">+22,566</h4>
								<p class="text-muted">INSTAGRAM FOLLOWERS</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="dfd text-center">
								<i class="grey large-icon mb-2 fas fa-envelope"></i>
								<h4 class="mb-0">+15,566</h4>
								<p class="text-muted">E-MAIL SUBSCRIBERS</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="card">
					<div class="content">
						<div class="row">
							<div class="dfd text-center">
								<i class="olive large-icon mb-2 fas fa-dollar-sign"></i>
								<h4 class="mb-0">+98,601</h4>
								<p class="text-muted">TOTAL SALES</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div> -->

<!--
		  <script src="assets/vendor/chartsjs/Chart.min.js"></script>
    	  <script src="assets/js/dashboard-charts.js"></script>
-->
		
<?php include("includes/footer.php"); ?>