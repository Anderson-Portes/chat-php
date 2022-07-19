<?php
include_once "config.php";
session_start();
$outgoing_id = $_SESSION['UNIQUE_ID'];
$sql = mysqli_query($conn, "SELECT * FROM USERS WHERE UNIQUE_ID != " . $outgoing_id);
$output = "";
if (mysqli_num_rows($sql) > 0) {
    include "data.php";
} else {
    $output .= "No users are avaliable to chat";
}

echo $output;
