<?php
session_start();
$input_u = $_POST['username'];
$input_p = $_POST['passwd'];

include_once('connect.php');

$q ="SELECT * FROM member WHERE " .
"Username ='".$input_u."' AND Password ='".$input_p."' ";

$res = $mysqli->query($q);
if ($res && $res->num_rows == 1){
	while($row = $res->fetch_array()){
		$_SESSION['uname'] = $row['Username'];
		$_SESSION['fname'] = $row['fName'];
		$_SESSION['userid'] = $row['UserID'];
		$_SESSION['passwd'] = $row['Password'];
		$_SESSION['groupid'] = $row['Status'];
}
	if($_SESSION['groupid'] == "Admin")
		header("Location: home.php");

	else if ($_SESSION['groupid'] == "Staff")
		header("Location: ptopic.php");

	else if ($_SESSION['groupid'] == "student")
		header("Location: add.php");
}
else{
	echo "Wrong username or password !";
}
?>
