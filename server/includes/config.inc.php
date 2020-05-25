<?php
/**
 * config.inc.php
 *
 * Database Config File
 *
 * @copyright  (C) 2020 by TBD
 * @license    https://directory.fsf.org/wiki/License:X11  MIT/X11/X - Licence
 */


// Enter your Database Data
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'TBD';

$db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



?>