<?php
$con = mysqli_connect('localhost','admin_db','wLhiTJDTAd','admin_db');

	if (!$con)
	{
		echo 'Not connect To Server';
	}else{
	//	echo 'connected';
	}

	$tid = implode(',', $_POST['mu']);
	$gname = $_POST['gName'];

	//echo $gname;
  //echo $tid;



	$sqlc = "INSERT INTO prefer (gName, code) VALUES ('".$gname."','".$tid."')";

	if(!$con->query($sqlc )){
		echo "Update failed: ". $mysqli->error;
	}else{
	  header("Location: tt.php");


	}
?>
