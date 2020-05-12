<?php

require('config.php');
session_start();

if (isset($_POST['USERNAME'])){
    $username = stripslashes($_REQUEST['USERNAME']);
    $username = mysqli_real_escape_string($conn, $username);

    $password = stripslashes($_REQUEST['PASSWORD']);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * 
              FROM ACCOUNT 
              WHERE USSERNAME='$username' AND PASSWORD='".hash('sha256', $password)."'";

    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);

    if($rows==1){
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else{
        $message = "Username or password is incorrect.";
    }
}
