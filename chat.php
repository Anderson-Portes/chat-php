<?php
session_start();
if(!isset($_SESSION['UNIQUE_ID'])){
    header("Location:./login.php");
}
include_once "header.php";
include_once "php/config.php";
$user_id = mysqli_real_escape_string($conn , $_GET['USER_ID']);
$sql = mysqli_query($conn , "SELECT * FROM USERS WHERE UNIQUE_ID = {$user_id}");
if(mysqli_num_rows($sql)>0){
    $row = mysqli_fetch_assoc($sql);
}
?>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['IMG']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['FNAME']." ".$row['LNAME']; ?></span>
                    <p><?php echo $row['STATUS']; ?></p>
                </div>
            </header>
            <div class="chat-box">
            
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['UNIQUE_ID']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" id="" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="./js/chat.js"></script>
</body>

</html>