<div class="wrapper">
	<nav id="sidebar" class="active">
		<div class="sidebar-header">
			<img src="assets/img/Healthcare Brgy punta calamba laguna4.png" alt="bootraper logo" class="app-logo">
		</div>
		<ul id="fixed" class="list-unstyled components text-secondary">
			<li>
				<a href="home.php"><i class="fas fa-home"></i> Dashboard</a>
			</li>
			<li>
				<a href="residents.php"><i class="fas fa-house-user"></i> Residents</a>
			</li>
			<li>
				<a href="vaccinations.php"><i class="fas fa-first-aid"></i> Vaccination</a>
			</li>
			<li>
				<a href="checkups.php"><i class="fas fa-user-injured"></i> Checkups</a>
			</li>
			
			<?php if($_SESSION['usertype'] != 'HealthWorker'){?>
			<?php if($_SESSION['usertype'] != 'Nurse'){?>
			<li>
				<a href="#pagesmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-chart-bar"></i> Inventory</a>
				<ul class="collapse list-unstyled" id="pagesmenu">
					<li>
						<a href="inventory.php"><i class="fas fa-prescription-bottle"></i>Vaccines</a>
					</li>
					<li>
						<a href="medicines.php"><i class="fas fa-pills"></i>Medicines</a>
					</li>
					<!--   <li>
                            <a href="404.html"><i class="fas fa-info-circle"></i>Stock</a>
                        </li>
 -->
				</ul>
			</li>

								
		 	

				<li>
					<a href="supplier.php"><i class="fas fa-ambulance"></i> Suppliers</a>
				</li>

				<li>
					<a href="users.php"><i class="fas fa-user-friends"></i>Users</a>
				</li>
			  
			  <?php } ?>
			  <?php } ?>			  
		
			
			<?php if($_SESSION['usertype'] != 'HealthWorker'){?>
				<li>
					<a href="#pagesmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-scroll"></i>Reports</a>
					<ul class="collapse list-unstyled" id="pagesmenu1">
						<li>
							<a href="reportPositive.php"><i class="fas fa-user-injured"></i>Total Bad Condition Report</a>
						</li>
						<li>
							<a href="reportNegative.php"><i class="fas fa-user-plus"></i>Total Good Condition Report</a>
						</li>
						<li>
							<a href="reportVaccinatedToday.php"><i class="fas fa-hand-holding-medical"></i><center>Total Vaccinated Today Report</center></a>
						</li>
						<li>
							<a href="reportCheckupsToday.php"><i class="fas fa-clipboard-list"></i><center>Total Checkups Today Report</center></a>
						</li>
						<li>
							<a href="weeklyReportResidents.php"><i class="fas fa-syringe  fa-lg"></i><center>Total Vaccinated Daily Report</center></a>
						</li>
						<li>
							<a href="checkupsWeekly.php"><i class="fas fa-file-medical"></i><center>Total Checkups Daily Report</center></a>
						</li>
						<li>
							<a href="residentsYealy.php"><i class="fas fa-file-medical-alt"></i><center>Total Vaccinated Yearly Report</center></a>
						</li>
						<li>
							<a href="monthlyvaccinated.php"><i class="fas fa-calendar-plus"></i><center>Total Monthly Vaccinated Report</center></a>
						</li>
						<!--   <li>
                            <a href="404.html"><i class="fas fa-info-circle"></i>Stock</a>
                        </li>
 -->
					</ul>
				</li>
				 <?php } ?>
		</ul>
	</nav>