<?php
    if(!isset($_SESSION)){ 
        session_start(); 
        }
            unset($_SESSION["aid"]);
            echo "<script>alert('logged out successfully');</script>";
            header("Location: admin-log.php");
?>