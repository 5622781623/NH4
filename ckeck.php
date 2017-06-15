<?php
session_start();
$input_g = $_POST['gName'];
$input_w = $_POST['password'];

include_once('connect.php');

$q ="SELECT * FROM gro WHERE " .
"gName ='".$input_g."' AND pwd ='".$input_w."' ";


$objQuery = mysqli_query($mysqli,$q);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult)

	{
		echo "Username and Password Incorrect!";

	}
	else
	{
//*** Go to Main page
$_SESSION['gName'] = $row['gName'];
$_SESSION['g_ID'] = $row['g_ID'];
$_SESSION['email'] = $row['email'];
$_SESSION['gpa'] = $row['GPA'];
$_SESSION['duration'] = $row['duration'];
$_SESSION['password'] = $row['pwd'];
$_SESSION['groupid'] = $row['Status'];
	//*** Go to Main page
			header("location:select.php");


	}

	mysqli_close($mysqli);
?>
