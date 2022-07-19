<?php
include_once "header.php";
session_start();
if(isset($_SESSION['UNIQUE_ID'])){
    header("Location:users.php");
}
?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>E-Mail Adress</label>
                    <input type="email" name="email" id="" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" id="" placeholder="Enter new password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>
    <script src="./js/pass-show-hie.js"></script>
    <script src="./js/login.js"></script>
</body>

</html>