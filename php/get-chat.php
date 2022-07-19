<?php
session_start();
if(isset($_SESSION['UNIQUE_ID'])){
    include_once "config.php";
    $outgoing_id = mysqli_real_escape_string($conn , $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn , $_POST['incoming_id']);
    $output = "";
    $sql = mysqli_query($conn,"SELECT * FROM MESSAGES LEFT JOIN USERS ON USERS.UNIQUE_ID = MESSAGES.OUTGOING_MSG_ID WHERE (OUTGOING_MSG_ID = {$outgoing_id} AND INCOMING_MSG_ID = {$incoming_id}) OR  (OUTGOING_MSG_ID = {$incoming_id} AND INCOMING_MSG_ID = {$outgoing_id}) ORDER BY MSG_ID");
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_assoc($sql)){
            if($row['OUTGOING_MSG_ID'] === $outgoing_id){
                $output.= '<div class="chat outgoing">
                <div class="details">
                    <p>'.$row['MSG'].'</p>
                </div>
            </div>';
            } else{
                $output.='<div class="chat incoming">
                <img src="php/images/'.$row['IMG'].'" alt="">
                <div class="details">
                    <p>'.$row['MSG'].'</p>
                </div>
            </div>';

            }
        }
        echo $output;
    }

} else{
    header("Location:../login.php");
}
?>