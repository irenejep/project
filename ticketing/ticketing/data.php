<?php
//compiled by vincent k chebon

// assigning variables 

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "ticketing";

// connecting to the server localhost

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if (!$con) {
     die('cannot connect to the server' . mysqli_error($con) );
  }