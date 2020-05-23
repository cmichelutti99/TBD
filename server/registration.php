<?php  
session_start();

$con=mysqli_connect('localhost', 'root','');

mysqli_select_db($con, 'TBD');
    
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $user_name=$_POST['user_name'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `user_name`, `password`, `ip_addr`, `email`) VALUES (NULL, '$first_name', '$last_name', '$user_name', '$password', '', '$email')"; 

    
    if ($con->query($sql) === TRUE) {  
        header('Location: login.php');  
    } else {  
        echo "Error: " . $sql . "<br>" . $con->error;  
    }  
    $con->close();  
  
?> 
