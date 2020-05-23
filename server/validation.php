<?php 
session_start();


$con=mysqli_connect('localhost', 'root','');

mysqli_select_db($con, 'TBD');

$user_name= $_POST['user_name'];
$password= $_POST['password'];

$s = "SELECT * FROM doctors WHERE user_name= '$user_name' && password = '$password'";

$result= mysqli_query($con, $s);
$num = mysqli_num_rows($result);

if($num == 1){
    header('location:index.php');
}else{
    header('location:login.php');
}
?>
