<?php
$con = mysqli_connect('localhost','admin_db','wLhiTJDTAd','admin_db');

	if (!$con)
	{
		echo 'Not connect To Server';
	}else{
	//	echo 'connected';
	}

	$gname= $_POST['gName'];

  $t1 = $_POST['1st'];
  $t2 = $_POST['2nd'];
  $t3 = $_POST['3rd'];
  $t4 = $_POST['4th'];
  $t5 = $_POST['5th'];
  $t6 = $_POST['6th'];
  $t7 = $_POST['7th'];
  $t8 = $_POST['8th'];
  $t9 = $_POST['9th'];
  $t10 = $_POST['10th'];
  $t11 = $_POST['11th'];
  $t12 = $_POST['12th'];

	$sqlc = "UPDATE gro SET 1t='$t1', 2t='$t2', 3t='$t3', 4t='$t4', 5t='$t5', 6t='$t6', 7t='$t7', 8t='$t8', 9t='$t9', 10t='$t10', 11t='$t11', 12t='$t12' WHERE gName='$gname' ";

	if(!$con->query($sqlc )){
		echo "Update failed: " .$gname.$t1. $con->error ;
	}else{
		header("Location: stInfo.php");
	}
?>
