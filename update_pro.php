<?php

  	$id = $_POST['id'];
	$name = $_POST['name'];
	$uname = $_POST['username'];
	$pass= $_POST['password'];


	require_once('connect.php');
	$q = "UPDATE member set fName ='$name', Username='$uname', Password='$pass' where UserID = $id";
	if(!$mysqli->query($q)){
		echo "Update failed: ". $mysqli->error;
	}else{
		header("Location: ptopic.php");
	}
?>
