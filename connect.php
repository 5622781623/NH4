<?php
$mysqli = new mysqli('localhost','admin_db','wLhiTJDTAd','admin_db');
if($mysqli->connect_errno){
  echo $mysqli->connect_errno.": ".$mysqli->connect_error;
}

?>
