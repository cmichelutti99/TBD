<?php 
require_once("./includes/config.inc.php");

session_start();


// first we should check if $_POST data have been submitted or not

	// If form submitted
    if (isset($_POST['user_name']) && isset($_POST['password'])){

			$user_name= stripslashes($_POST['user_name']);
			$password= stripslashes($_POST['password']);

				//We have to check if the Username or Password are an SQL-injection so we've to escape the strings

			$user_name = mysqli_real_escape_string($db, $user_name);
			$password = mysqli_real_escape_string($db, $password);


			$s = "SELECT id FROM doctors WHERE user_name= '$user_name' && password = '".md5($password)."'"; // added md5() for encrypting the password

			$result= mysqli_query($db, $s);
			$num = mysqli_num_rows($result);
			



		if($num == 1){
			$row = mysqli_fetch_array($result);
			$doctorid = $row['id'];
			//Let's write username to Session;
			$_SESSION['doctorid'] = $doctorid;
			$_SESSION['username'] = $user_name;
	
			header('location: dashboard.php');
		}else{
	
	die("Wrong Username or Password! <a href= './login.php'>Back to login</a>");
	
    header('location: login.php');
		}


	}else{
		//later we'll merge the login.php and this to one file
		//inside of this else there will be the HTML code of login.php
		
		//and it'll be only shown if no POST data have been submitted
		
		
		header('location: login.php');
		
	}

?>

