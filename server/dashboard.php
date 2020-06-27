<?php include('server.php'); 

if(!isset($_SESSION['username'])){
	header('location: login.php');
}


	if (isset($_SESSION['username'])){
	//Is the user_name set? == Is user logged in?

			if(isset($_GET['edit'])){
				$id = $_GET['edit'];
				$edit_state = true;
				$rec = mysqli_query($db, "SELECT * FROM patients WHERE id=$id");
				$record = mysqli_fetch_array($rec);
				$first_name = $record['first_name'];
				$last_name = $record['last_name'];
                $fiscal_code= $record['fiscal_code'];
				$id = $record['id'];
			}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Doctor</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Welcome</h1>
        <div>
        
             <form action="selectlist.php" method="post">
                <button type="submit" name="appointment" class="btn">Appointment</button>
                </form>
            
            <form action="add.php" method="post">
                <button type="submit" name="addpatient" class="btn">Add patient</button>

            </form>
			
			<form action="patientlist.php" method="post">
                <button type="submit" class="btn">Show patients</button>
            </form>
        </div>
        <form action="logout.php" method="post">
        <button type="submit" name="logout" class="btn">Logout</button>
        </form>
            
    </body>
</html>

<?php

	}else{
		
		die("You're not allowed to access this page! <a href='./login.php'>Back to login</a>");
		
	}

?>
