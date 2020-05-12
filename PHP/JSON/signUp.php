<?php

require ('config.php');

if (isset($_REQUEST['USERNAME'], $_REQUEST['MAIL'], $_REQUEST['PWD'])){
    $username = stripslashes($_REQUEST['USERNAME']);
    $username = mysqli_real_escape_string($conn, $username);

    $email = stripslashes($_REQUEST['MAIL']);
    $email = mysqli_real_escape_string($conn, $email);

    $password = stripslashes($_REQUEST['PWD']);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "INSERT INTO ACCOUNT (USERNAME, MAIL, PASSWORD)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";

    $res = mysqli_query($conn, $query);

    if($res){
        echo "<div class='sucess'>
             <h3>Registration Successful.</h3>
             <p>Click here for <a href='signIn.php'>Log In</a></p>
             </div>";
    }

    echo $res;
}
