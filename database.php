<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";

$connect = new mysqli($servername, $username, $password, $database);
if(!$connect){
  echo "You Got Error".mysqli_error($connect);
}
// else{echo "Success<br>";}
?>