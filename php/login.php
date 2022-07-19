<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn , $_POST['email']);
$password = mysqli_real_escape_string($conn , $_POST['password']);
if(!empty($email) && !empty($password)){
    $sql = mysqli_query($conn , "SELECT * FROM USERS WHERE EMAIL = '{$email}' AND PASSWORD = '{$password}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $sql3 = mysqli_query($conn , "UPDATE USERS SET STATUS = 'Active now' WHERE UNIQUE_ID = {$row['UNIQUE_ID']}");
        if($sql3){
            $_SESSION['UNIQUE_ID'] = $row['UNIQUE_ID'];
            echo "Success";
        }
    } else{
        echo "Email or Password is incorrect!";
    }
} else{
    echo "All input fields are required!";
}
