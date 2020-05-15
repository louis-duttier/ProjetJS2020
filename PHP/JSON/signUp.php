<?php

require ('config.php');

if (isset($_POST['USERNAME'], $_POST['MAIL'], $_POST['PWD'])){
    $username = stripslashes($_POST['USERNAME']);
    $username = mysqli_real_escape_string($conn, $username);

    $email = stripslashes($_POST['MAIL']);
    $email = mysqli_real_escape_string($conn, $email);

    $password = stripslashes($_POST['PWD']);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "INSERT INTO ACCOUNT (USERNAME, MAIL, PASSWORD)
              VALUES ('$username', '$email', '".hash('sha256', $password)."')";

    $res = mysqli_query($conn, $query);

    if($res){
        echo "<div class='sucess'>
             <h3>Inscription réussite !</h3>
             <p>Clique ici pour te  <a href='signIn.php'>Connecter</a></p>
             </div>";
    }

    echo $res;
}
