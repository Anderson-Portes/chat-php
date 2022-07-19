<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['UNIQUE_ID'];
$SearchTerm = mysqli_real_escape_string($conn , $_POST['SearchTerm']);
$output = "";
$sql = mysqli_query($conn ,"SELECT * FROM USERS WHERE NOT UNIQUE_ID = {$outgoing_id} AND (FNAME LIKE '%{$SearchTerm}%' OR LNAME LIKE '%{$SearchTerm}%' OR '{$SearchTerm}')");
if(mysqli_num_rows($sql)>0){
    include "data.php";
} else{
    $output.="No user found related to your seach term";
}
echo $output;
?>