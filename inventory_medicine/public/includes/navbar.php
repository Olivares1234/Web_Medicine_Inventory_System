<div id="body" class="active">
	<nav class="navbar navbar-expand-lg navbar-white bg-white">
		<button type="button" id="sidebarCollapse" class="btn btn-outline-secondary default-secondary-menu"><i class="fas fa-bars"></i><span></span></button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="nav navbar-nav ml-auto">

				<li class="nav-item dropdown">
					<div class="nav-dropdown">
						<a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span><?php  echo $_SESSION["username"]; ?></span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
						<div class="dropdown-menu dropdown-menu-right nav-link-menu">
							<ul class="nav-list">
								<li><a href="profile.php" class="dropdown-item"><i class="fas fa-address-card"></i> My Account</a></li>
								<li><a href="logout.php?logout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</nav>