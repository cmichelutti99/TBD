<?php  

require_once("./includes/config.inc.php");


session_start();

    
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $email=$_POST['email'];
    $user_name=$_POST['user_name'];
    $password = md5($_POST['password']);;
    
    $sql = "INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `user_name`, `password`, `ip_addr`, `email`) VALUES (NULL, '$first_name', '$last_name', '$user_name', '$password', '".$_SERVER['REMOTE_ADDR']."', '$email')"; 

    
    if ($db->query($sql) === TRUE) {  
        header('Location: login.php');  
    } else {  
        echo "Error: " . $sql . "<br>" . $db->error;  
    }  
    $db->close();  
  
?> 
