<?php
  $act = $_POST['act'];
	$url = $_POST['url'];
	$note = $_POST['note'];
	$date = $_POST['date'];
  $nid = $_POST['n'];

	require_once('connect.php');

	$q = "UPDATE news SET activity='$act', url='$url', title='$note', dtime='$date' where n_ID=$nid";
	if(!$mysqli->query($q)){
		echo "Update failed: ". $mysqli->error;
	}else{
		header("Location: home.php");
	}
?>
