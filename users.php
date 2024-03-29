<?php
session_start();
//echo $_SESSION['UNIQUE_ID'];
if(!isset($_SESSION['UNIQUE_ID'])){
    header("Location:./login.php");
}
include_once "header.php";
include_once "php/config.php";
$sql = mysqli_query($conn , "SELECT * FROM USERS WHERE UNIQUE_ID = {$_SESSION['UNIQUE_ID']}");
if(mysqli_num_rows($sql)>0){
    $row = mysqli_fetch_assoc($sql);
}
?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="php/images/<?php echo $row['IMG'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['FNAME']." ".$row['LNAME']; ?></span>
                        <p><?php echo $row['STATUS']; ?></p>
                    </div>
                </div>
                <a href="./php/logout.php?USER_ID=<?php echo $row['UNIQUE_ID']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" name="" id="SearchBtn" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>
    <script src="./js/users.js"></script>
</body>

</html>