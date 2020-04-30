<?php
    session_start();
    $Username =  $_SESSION['user'];
	unset($_SESSION['user']); 
    //unset($_SESSION['user']); 
	header("Location: homepage.php");
?>