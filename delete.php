<?php
include 'database.php';

if (isset($_GET['deletepro'])){
    $sno = $_GET['deletepro'];

    $sql = "DELETE FROM `php_crud` WHERE `sno` = '$sno'";
    $result = mysqli_query($connect, $sql);
    if(!$result){
        die(mysqli_error($connect));
    }
    else{
        // echo "deleted";
        header ('location: view.php');
    }
}
?>