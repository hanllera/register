<?php


session_start();
//--------------------Config to database-------------------
error_reporting(0);

	$con = mysqli_connect("localhost", "root", "", "dishtansya") or die
	("Unable to Connect");
//-------------------------------------------------------

//-----------------Registration backend process--------------

$email = $_POST['email'];
$password = $_POST['password'];

$email_reg = stripslashes($email);
$password_reg = stripslashes($password);

	
	$user_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email_reg' ");
	$num_user = mysqli_num_rows($user_query);

		if ($num_user!=0) 
		{
			echo "User successfully registered";

				$to = $email;
				$subject = "Registration";
				$message = "User successfully registered";

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				mail($to,$subject,$message,$headers);

		}
		else
		{
			echo "Email already taken";
		}

?>