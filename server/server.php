<?php
require_once("./includes/config.inc.php");

session_start();

$first_name = "";
$last_name = "";
$id = 0;
$fiscal_code="";
$edit_state = false;


if (isset($_POST['add'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $fiscal_code = $_POST['fiscal_code'];

    
    $query = "INSERT INTO `patients` (`id`, `first_name`, `last_name`, `fiscal_code`, `email`) VALUES (NULL, '$first_name', '$last_name', '$fiscal_code', '')";
    
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Patient saved";
    header('location: patientlist.php');
}

if (isset($_POST['update'])){
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $fiscal_code = $_POST['fiscal_code'];
    $id = $_POST['id'];
    
	
    mysqli_query($db, "UPDATE `patients` SET `first_name` = '$first_name', `last_name` = '$last_name', `fiscal_code` = '$fiscal_code' WHERE `patients`.`id` = $id");
    $_SESSION['msg'] = "Patient updated";
    header('location: patientlist.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM patients WHERE id=$id");
    $_SESSION['msg'] = "Patient deleted";
    header('location: patientlist.php');
}

$results = mysqli_query($db, "SELECT * FROM patients");



?>
