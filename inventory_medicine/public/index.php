<?php
 
	include("./private/database.php");
	include("./private/functions.php");
    
   		session_start();

        $error1 = "";
        if(isset($_SESSION['username'])) {
			header("Location:home.php"); // redirects them to homepage
			exit; // for good measure
}
       

		if(isset($_POST["submit"])) 
		{

			$email = mysqli_real_escape_string($conn, $_POST["username"]);
			$pass = mysqli_real_escape_string($conn, $_POST["password"]);
			$checkBox = isset($_POST["keep"]);

			if(email_exists($email, $conn))
			{
				/*echo $email= "Email Exist";*/
				$result = mysqli_query($conn, "SELECT * FROM tbl_users WHERE username='$email' AND password='$pass' AND status='Active' order by id");
				$retrievepassword = mysqli_num_rows($result);

				if($retrievepassword == 0 )
				{
					
					
					
					$error1 ="<div class='alert alert-danger' role='alert'>Incorrect Password!
					<button class='close' data-dismiss='alert'><span>&times;</span></button><script type='text/javascript'>
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'assets/music/success_message.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
		
    }
play_sound();
</script>";
					
					
				}
				else
				{
				
					$retrievepassword = mysqli_fetch_assoc($result);
					unset($retrievepassword['password']);
					$_SESSION = $retrievepassword;
					
					/*$error = "Password is correct";*/
					$_SESSION["username"] = $email;
					

					if ($checkBox == "on") 
					{
						setcookie("username",$email, time()+3600);
						
					}
                    
                    header("location:home.php");
					die();
                }

              

			}
			else
			{
				$error1 ="<div class='alert alert-danger' role='alert'>User does not exists!
					<button class='close' data-dismiss='alert'><span>&times;</span></button><script type='text/javascript'>
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'assets/music/success_message.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
		
    }
play_sound();
</script>";
			}
			

		}




	?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HCBPCL - Login</title>
	<link rel="stylesheet" href="assets/vendor/fontawesome-free-5.15.1-web/css/all.min.css">
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
	<link rel="stylesheet" href="assets/css/styles.css">
	<link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/auth.css" rel="stylesheet">
	<link href="assets/css/master.css" rel="stylesheet">
	<!--    <link href="assets/vendor/chartsjs/Chart.min.css" rel="stylesheet">-->
	<link rel="shortcut icon" type="image/png" href="./img/60a812843d3c929dce80a4b188beec51-injection-needle-by-vexels.png" >
	<link href="assets/vendor/flagiconcss3/css/flag-icon.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
	<style>
		body {
			font-family: 'IBM Plex Sans', sans-serif;
			background: url(assets/img/1_O6IGb0Y8derg7idymtFBvg.png) no-repeat center center fixed;
            background-size: 100%;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			/*overflow: hidden;*/

		}

		.field-icon {
			float: right;
			margin-left: -20px;
			top: 15px;
			position: relative;
			z-index: 2;
		}

		.container {
			padding-top: 50px;
			margin: auto;
		}
		img[alt="www.000webhost.com"]{display:none;}
	</style>
</head>

<body>
	<br>
	<br>
	<div class="wrapper">
		<div class="auth-content">
			<div class="card">
				<div class="card-body text-center">
					<center><span><img src="assets/img/Healthcare Brgy punta calamba laguna4.png" alt="bootraper logo" class="app-logo" width="200"></span></center>
					<div class="mb-4">
						<!--   <img class="brand" src="assets/img/bootstraper-logo.png" alt="bootstraper logo"> -->
						<hr>
						<h2 class="mb-4 text-muted"><span>WELCOME</span></h2>
					</div>
					<h6 class="mb-4 text-muted">Log in to your account</h6>
					<div>
						<div id="alert" role="alert"><?php echo $error1;?></div>
					</div>
					<form action="index.php" method="POST">

						<div class="input-group form-group">
							
							<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
							<input type="text" name="username" class="form-control" placeholder="Username" spellcheck="false" required>
						</div>

						<div class="input-group form-group">
							<div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-key"></i></span></div>
							<input type="password" id="password-field" name="password" class="form-control" placeholder="Password" required><span toggle="#password-field" class="fa fa-eye field-icon toggle-password"></span>


						</div>
						<div class="form-group text-left">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
								<label class="custom-control-label" for="remember-me">Remember me</label>
							</div>
						</div>
						<button class="btn btn-primary shadow-2 mb-4" name="submit" value="login">Login</button>
					</form>


					<!--
                    <p class="mb-2 text-muted">Forgot password? <a href="forgot-password.html">Reset</a></p>
                    <p class="mb-0 text-muted">Don’t have an account? <a href="signup.html">Signup</a></p>
-->
				</div>
			</div>
		</div>
	</div>


	<script src="assets/vendor/jquery3/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap4/js/bootstrap.min.js"></script>
	<!--     <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>-->
	<script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>

	<script type="text/javascript">
		$(".toggle-password").click(function() {

			$(this).toggleClass("fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
			} else {
				input.attr("type", "password");
			}
		});



		setTimeout(function() {
			document.getElementById("alert").style.display = "none";

		}, 3000);
	</script>


</body>

</html>