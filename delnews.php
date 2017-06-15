<?php

	$nid = $_GET['nid']; //nid
	require_once('connect.php');
	if(isset($nid)) {
		$q="DELETE FROM news where n_ID = $nid";

			if(!$mysqli->query($q)){
				echo "DELETE failed. Error: ".$mysqli->error ;
		   }
		   $mysqli->close();
		   //redirect
		   header("Location: home.php");
	}
?>
