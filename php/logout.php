<?php
session_start();
if(isset($_SESSION['UNIQUE_ID'])){
    include_once "config.php";
    $logout_id = mysqli_real_escape_string($conn , $_GET['USER_ID']);
    if(isset($logout_id)){
        $sql = mysqli_query($conn , "UPDATE USERS SET STATUS = 'Offline now' WHERE UNIQUE_ID = {$logout_id}");
        if($sql){
            session_unset();
            session_destroy();
            header("Location:../login.php");
        }
    } else{
        header("Location:../users.php");
    }
} else{
    header("Location:../login.php");
}
?>