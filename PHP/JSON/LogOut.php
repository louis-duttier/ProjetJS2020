<?php
session_start();

if(session_destroy())
{
    header("Location: SignIn.php");
}

$_SESSION['disconnected'] = "You are now disconnected !";


