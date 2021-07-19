
<?php 
	session_start();
	if(isset($_GET["logout"]))
	{
		unset($_SESSION["username"]);
		session_destroy();
		setcookie("email",'',time()-3600);
		header("location:index.php");
		die();
	 

	}

	

 ?>





 