<?php

	$tid = $_GET['tid']; // user id
	require_once('connect.php');
	if(isset($tid)) {
		$q="DELETE FROM topic where t_id=$tid";
		$q = strtolower($q);
			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: ptopic.php");
	}
?>
