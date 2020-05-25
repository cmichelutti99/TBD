<?php

session_start();

	if(isset($_SESSION['username'])){
		
		header('location:index.php');
	}
 // If user's already logged in, redirect to index.php
 ?>


<html>
    <head>
        
    <title>Login and Registration</title>
    <link rel="stylesheet" type="text/css" href="stylelogin.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    
    
</head>
<body style= "background: rgba(148, 216, 255, 1)">
    <div class="container">
    <div class="col-md-6">
            <h2> Register Here </h2>
            <form action="registration.php" method="post">
                <div class="form-group">
                    <label>First name</label>
                    <input type="text" name="first_name" class="form-control" required>
                    </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input type="text" name="last_name" class="form-control" required>
                    </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" required>
                    </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user_name" class="form-control" required>
                    </div>
                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
                </div>
            </div>
     </body>
</html>
