<?php
require_once("./includes/config.inc.php");
	
	
	session_start();
	
if(!isset($_SESSION['username'])){
	header('location: login.php');
}

	if(isset($_POST['doctorid'])){
    
	$did = $_POST['doctorid'];
	$uid = $_POST['uid'];
	$measure = $_POST['measure'];
	$notes = $_POST['notes'];
	$date = $_POST['date'];
/**
    $rec = mysqli_query($db, "SELECT * FROM patients WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $first_name = $record['first_name'];
    $last_name = $record['last_name'];
	$fiscal_code = $record['fiscal_code'];**/
}

		$query = "INSERT INTO `appoint` (`id`, `uid`, `did`, `measure`, `notes`, `date`) VALUES (NULL, '$uid', '$did', '$measure', '$notes', '$date')";
   
   mysqli_query($db, $query);
   
    $_SESSION['msg'] = "Appointment saved";
    header('location: appointment.php?id='.$_POST['uid']);


?>