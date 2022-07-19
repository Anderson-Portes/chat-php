<?php
session_start();
if(isset($_SESSION['UNIQUE_ID'])){
    include_once "config.php";
    $outgoind_id = mysqli_real_escape_string($conn , $_POST['outgoing_id']);
    $incomig_id = mysqli_real_escape_string($conn , $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn , $_POST['message']);

    if(!empty($outgoind_id) && !empty($incomig_id) && !empty($message)){
        $sql = mysqli_query($conn , "INSERT INTO MESSAGES VALUES(DEFAULT, {$incomig_id}, {$outgoind_id}, '{$message}')") or die();
    }

} else{
    header("Location:../login.php");
}
?>