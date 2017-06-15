<?php
session_start();
$input_u = $_POST['gName'];
$input_p = $_POST['password'];

include_once('connect.php');

$q ="SELECT * FROM gro WHERE " .
"gName ='".$input_u."' AND pwd ='".$input_p."' ";

$res = $mysqli->query($q);
if ($res && $res->num_rows == 1){
	while($row = $res->fetch_array()){
		$_SESSION['gName'] = $row['gName'];
		$_SESSION['g_ID'] = $row['g_ID'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['gpa'] = $row['GPA'];
		$_SESSION['duration'] = $row['duration'];
		$_SESSION['password'] = $row['pwd'];
		$_SESSION['groupid'] = $row['Status'];
}
	if($_SESSION['groupid'] == "student")
		header("Location: select.php");
}
else{
	echo "Wrong username or password !";
}
?>
