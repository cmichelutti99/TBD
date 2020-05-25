<?php
// Destroy Session


session_start();

if(session_destroy())
{
header("Location: login.php"); // Redirecting
}
?>