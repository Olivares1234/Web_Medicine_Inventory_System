<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HCBPCL-Profile</title>
    <!--  extension GoogleFonts  -->
    <link rel="shortcut icon" type="image/png" href="./img/60a812843d3c929dce80a4b188beec51-injection-needle-by-vexels.png" sizes="1366x768">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@600&display=swap" rel="stylesheet">
    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <!--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.css"/>-->
    <link href="assets/vendor/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <!--   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">-->
    <style>
        body {
            font-family: 'IBM Plex Sans', sans-serif;
        }
        
        .required {
            color: brown;
            font-weight: bold;
        }
        
        img[alt="www.000webhost.com"] {
            display: none;
        }
    </style>
</head>

<body>
    <?php session_start();?>
    <?php if(isset($_SESSION[ "username"])){ $_SESSION[ "username"]; } else{ header( "location:index.php"); } ?>
    <!--    connection database-->

    <?php include( "private/database.php"); ?>
    <!--     			sidbar content-->
    <?php include( "includes/sidebar.php") ?>
    <!--   	 navbar top head-->
    <?php include( "includes/navbar.php") ?>

    <?php 
	$error="" ; 
	if(isset($_POST[ "btnSubmit"])){ 
		$useremail= $_POST[ "useremail"]; 
		$username= $_POST[ "username"]; 
		$opwd= $_POST[ "opwd"]; 
		$npwd= $_POST[ "npwd"];
		$cpwd= $_POST[ "cpwd"]; 
		
		$query= mysqli_query($conn, "SELECT username, email, password FROM tbl_users WHERE email='$useremail' AND password='$opwd'"); 
		$num= mysqli_fetch_array($query); 
		if($npwd != $cpwd){ 
		$error="<div class='alert alert-warning' role='alert'>Confirm Password Does Not Match Carefully!
		<button class='close' data-dismiss='alert'><span>&times;</span></button></div><script type='text/javascript'>
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src', 'assets/music/success_message.mp3');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        audioElement.play();
		
    }
play_sound();
</script>" ; } elseif($num>0){ 
	$update = mysqli_query($conn,"UPDATE tbl_users set username='$username', password='$npwd' WHERE email='$useremail'"); $error ="
    <div class='alert alert-success' role='alert'>Password Change Successfully Updated!
        <button class='close' data-dismiss='alert'><span>&times;</span></button>
    </div>
    <script type='text/javascript'>
        function play_sound() {
            var audioElement = document.createElement('audio');
            audioElement.setAttribute('src', 'assets/music/success_message.mp3');
            audioElement.setAttribute('autoplay', 'autoplay');
            audioElement.load();
            audioElement.play();

        }
        play_sound();
    </script>"; } else{
	$error ="
    <div class='alert alert-warning' role='alert'>Check Your Email/Password Does Not Match Carefully!
        <button class='close' data-dismiss='alert'><span>&times;</span></button>
    </div>
    <script type='text/javascript'>
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

    <div id="alert" role="alert">
        <?php echo $error;?>
    </div>
    <div class="content">
        <h3 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-circle  fa-2x" style="color:teal;"></i> My Account</h3>
    </div>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-left">
                <!--                                                    <p>Add User</p>-->
                <form name="chngpwd" method="POST" action="profile.php" onsubmit="return valid();" accept-charset="utf-8">
                    <div class="form-group">
                        <label for="supplier"><b>Required All Fields</b><span class="required">*</span></label>
                        <!--
									<br>
									<label for="supplier">UserName:</label><span class="required">*</span>
									<input type="text" name="username" placeholder="UserName..." class="form-control" required>
-->
                    </div>
                    <div class="form-group">
                        <label for="address">Email:</label><span class="required">*</span>
                        <input type="text" name="useremail" id="useremail" placeholder="Email..." class="form-control" required 
                        value="<?php if(isset($_POST["useremail"])){ echo htmlentities($_POST["useremail"]); }?>">
                        <!--									<textarea type="text" ></textarea>-->
                    </div>
                    <div class="form-group">
                        <label for="address">Username:</label><span class="required">*</span>
                        <input type="text" name="username" id="username" placeholder="Username..." class="form-control" required 
                        value="<?php if(isset($_POST["username"])){ echo htmlentities($_POST["username"]); }?>">
                        <!--									<textarea type="text"></textarea>-->
                    </div>
                    <div class="form-group">
                        <label for="contact">Old Password:</label><span class="required">*</span>
                        <input type="text" name="opwd" id="opwd" placeholder="Old Password..." class="form-control" required 
                        value="<?php if(isset($_POST["opwd"])){ echo htmlentities($_POST["opwd"]); }?>">
                    </div>
                    <div class="form-group">
                        <label for="contact">New Password:</label><span class="required">*</span>
                        <input type="text" name="npwd" id="npwd" placeholder="Change Password..." class="form-control" required 
                        value="<?php if(isset($_POST["npwd"])){ echo htmlentities($_POST["npwd"]); }?>">
                    </div>
                    <div class="form-group">
                        <label for="contact">Confirm Password:</label><span class="required">*</span>
                        <input type="text" name="cpwd" id="cpwd" placeholder="Change Password..." class="form-control" required 
                        value="<?php if(isset($_POST["cpwd"])){ echo htmlentities($_POST["cpwd"]); }?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <!--    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.3/r-2.2.6/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.0/sp-1.2.1/sl-1.3.1/datatables.min.js"></script>-->

    <!--
       <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
       <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>     
-->
    <script src="assets/vendor/jquery3/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/vendor/bootstrap4/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/solid.min.js"></script>
    <script src="assets/vendor/fontawesome5/js/fontawesome.min.js"></script>
    <script src="assets/vendor/DataTables/datatables.min.js"></script>
    <script src="assets/js/initiate-datatables.js"></script>
    <script src="assets/js/script.js"></script>

    <script type="text/javascript">
        setTimeout(function() {
            document.getElementById("alert").style.display = "none";

        }, 3000);
    </script>


    <footer id="foot">
        <hr>
        <center>
            <div>
                <b>Copyright &copy;</b>
                <script type="text/javascript">
                    document.write(new Date().getFullYear());
                </script>
            </div>
        </center>
    </footer>
</body>
</html>