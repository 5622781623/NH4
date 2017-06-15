<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli('localhost','admin_db','wLhiTJDTAd','admin_db');

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Escape user inputs for security
$fname = $mysqli->real_escape_string($_REQUEST['name']);
$username = $mysqli->real_escape_string($_REQUEST['username']);
$passwd= $_POST['password'];
//$options = $mysqli->real_escape_string($_REQUEST['options']);
$options = $_POST['options'];

// attempt insert query execution
$sql = "INSERT INTO member (Username, Password, fName, Status) VALUES ('$fname', '$username', '$passwd','$options')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully. Click <a href='addstaff.php'>here</a> to back.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

// Close connection
$mysqli->close();
?>
