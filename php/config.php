<?php
$conn = mysqli_connect("localhost","root","","bd_chat");
if(!$conn){
    echo "ERRO: ".mysqli_connect_error();
}
