<?php
  $tid = $_POST['topic'];
	$code = $_POST['code'];
	$title = $_POST['title'];
	$note = $_POST['note'];


	require_once('connect.php');
	$q = "update topic set code='$code', title='$title', note='$note' where t_id=$tid";
	if(!$mysqli->query($q)){
		echo "Update failed: ". $mysqli->error;
	}else{
		header("Location: ptopic.php");
	}
?>
