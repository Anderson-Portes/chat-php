<?php
$you="";
while($row = mysqli_fetch_assoc($sql)){
    $sql2 = mysqli_query($conn , "SELECT * FROM MESSAGES WHERE (INCOMING_MSG_ID = {$row['UNIQUE_ID']} OR OUTGOING_MSG_ID =  {$row['UNIQUE_ID']}) AND (INCOMING_MSG_ID = {$outgoing_id} OR OUTGOING_MSG_ID =  {$outgoing_id}) ORDER BY MSG_ID DESC LIMIT 1");
    $row2 = mysqli_fetch_assoc($sql2);
    if(mysqli_num_rows($sql2)>0){
        $result = $row2['MSG'];
    } else{
        $result="No message avaliable";
    }
    (strlen($result)>28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;
    if($row2!=false){
        if($outgoing_id==$row2['OUTGOING_MSG_ID']){
            $you = "You: ";
        } else{
            $you="";
        }
    }
    ($row['STATUS']=="Offline now") ? $offline = "offline" : $offline = "";

    $output .= '<a href="chat.php?USER_ID='.$row['UNIQUE_ID'].'">
    <div class="content">
        <img src="php/images/'.$row['IMG'].'" alt="">
        <div class="details">
            <span>'.$row['FNAME']." ".$row['LNAME'].'</span>
            <p>'.$you.$msg.'</p>
        </div>
    </div>
    <div class="status-dot '.$offline.'">
        <i class="fas fa-circle"></i>
    </div>
</a>'; 
}
?>