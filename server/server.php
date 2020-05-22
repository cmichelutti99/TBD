<?php

session_start();

$first_name = "";
$last_name = "";
$id = 0;
$edit_state = false;


$db = mysqli_connect('localhost', 'root', '', 'TBD');

if (isset($_POST['add'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    
    $query = "INSERT INTO patients (first_name, last_name) VALUES ('$first_name', '$last_name')";
    
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Patient saved";
    header('location: index.php');
}

if (isset($_POST['update'])){
    
    $first_name = mysqli_real_escape_string($_POST['first_name']);
    $last_name = mysqli_real_escape_string($_POST['last_name']);
    $id = mysqli_real_escape_string($_POST['id']);
    
    mysqli_query($db, "UPDATE patients SET first_name = '$first_name', last_name ='$last_name' WHERE id=$id");
    $_SESSION['msg'] = "Patient updated";
    header('location: index.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM patients WHERE id=$id");
    $_SESSION['msg'] = "Patient deleted";
    header('location: index.php');
}

$results = mysqli_query($db, "SELECT * FROM patients");



?>
