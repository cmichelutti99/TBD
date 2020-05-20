<?php

session_start();

$firstname = "";
$lastname = "";
$id = 0;
$edit_state = false;


$db = mysqli_connect('localhost', 'root', '', 'TBD');

if (isset($_POST['add'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    $query = "INSERT INTO Patient (firstname, lastname) VALUES ('$firstname', '$lastname')";
    
    mysqli_query($db, $query);
    $_SESSION['msg'] = "Patient saved";
    header('location: index.php');
}

if (isset($_POST['update'])){
    
    $firstname = mysqli_real_escape_string($_POST['firstname']);
    $lastname = mysqli_real_escape_string($_POST['lastname']);
    $id = mysqli_real_escape_string($_POST['id']);
    
    mysqli_query($db, "UPDATE Patient SET firstname = '$firstname', lastname ='$lastname' WHERE id=$id");
    $_SESSION['msg'] = "Patient updated";
    header('location: index.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM Patient WHERE id=$id");
    $_SESSION['msg'] = "Patient deleted";
    header('location: index.php');
}

$results = mysqli_query($db, "SELECT * FROM Patient");



?>
