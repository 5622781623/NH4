
<?php

// Create connection
$con = new mysqli('localhost','admin_db','wLhiTJDTAd','admin_db');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$gname = $_POST['gname'];
$stu1 = $_POST['namemember1'];
$stu2= $_POST['namemember2'];
$stu3 = $_POST['namemember3'];

$num1 = $_POST['studentid1'];
$num2 = $_POST['studentid2'];
$num3 = $_POST['studentid3'];
$email = $_POST['email'];

$passwd= $_POST['password'];
 //$passwd = md5($passwd);

$gpa = $_POST['gpa'];
$options = $_POST['options'];

mysqli_autocommit($con, FALSE);
$sql = "INSERT INTO gro (gName,email,GPA,pwd,duration) VALUES ('".$gname."','".$email."','".$gpa."','".$passwd."',$options)";

if (mysqli_query($con, $sql ) === TRUE) {
  $postId = mysqli_insert_id($con);
   $sql1 ="INSERT INTO student (s_num,s_name,g_ID) VALUES ('".$num1."', '".$stu1."','".$postId."'),('".$num2."', '".$stu2."','".$postId."')";
   mysqli_query($con, $sql1 );
   print("Rgister successfully. Click <a href='loginstudent.html'>here</a> to LOGIN.");
}

if (!mysqli_commit($con)) { //commit transaction
   print("Rgister failed.  Click <a href='reg.php'>here</a> to back.");
    exit();
}

?>
