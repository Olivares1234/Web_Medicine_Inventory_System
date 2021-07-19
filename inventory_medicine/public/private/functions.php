<?php  

function email_exists($email, $conn)
		{
			$result = mysqli_query($conn, "SELECT id FROM tbl_users WHERE username='$email'");

			if(mysqli_num_rows($result) == 1)
			{

				return true;
			}
			else 
			{
				return false;

			}

		}

		function logged_in()
		{
			if(isset($_SESSION["username"]) || isset($_COOKIE["username"]))
			{
				return true;
			}
			else
			{
				return false;

			}
		}


	?>
