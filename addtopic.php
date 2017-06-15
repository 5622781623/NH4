<?php
$con = mysqli_connect('localhost','admin_db','wLhiTJDTAd','admin_db');

	if (!$con)
	{
		echo 'Not connect To Server';
	}else{
	//	echo 'connected';
	}
	/*
	if (!mysqli_select_db($con,'regis'))
	{
		echo 'Database Not Selected';
	}else{
		echo "connected DB";
	}
	*/


	$title = $_POST['title'];

	$code = $_POST['code'];

	$note = $_POST['note'];

	$id = $_POST['t'];


	//echo $id;

	//echo $code;

	//echo $title;

	//echo $note;




	$sqlc = "INSERT INTO topic (title, code, note, UserID) VALUES ('".$title."','".$code."','".$note."','".$id."')";


	// gr name
	if(!$con->query($sqlc )){
		echo "Update failed: ". $mysqli->error;
	}else{
		header("Location: ptopic.php");
	}
?>
