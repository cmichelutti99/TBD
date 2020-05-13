<?php
/**
 * config.inc.php
 *
 * Database Config File
 *
 * @author     Thomas Michael Schwaab
 * @email  	   thomas@schwaab.bayern
 * @copyright  (C) 2020 Thomas Michael Schwaab
 * @license    https://directory.fsf.org/wiki/License:X11  MIT/X11/X - Licence
 * @version    0.1a
 */


// Enter your Database Data
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'abc';

$db = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }



?>
