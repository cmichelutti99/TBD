<?php

session_start();

$con=mysqli_connect('localhost', 'root','');

mysqli_select_db($con, 'TBD');

$user_name=$_POST['user_name'];
$password = $_POST['password'];

$s = "SELECT * FROM doctors WHERE user_name='$user_name'";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "Username already taken";

}else{
    $reg= "INSERT INTO doctors(user_name, password) VALUES ('$user_name', '$password')";
    mysqli_query($con, $reg);
    echo "Registration Successful";
}


?>
