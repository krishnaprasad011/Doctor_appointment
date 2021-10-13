<?php
       if(!isset($_SESSION)){ 
        session_start(); 
        }
    if(isset($_POST["submit"]))
    {
        $id = $_POST['id'];
        $pas = $_POST['pas'];

        if($id == "admin" && $pas == "123"){
            $_SESSION["aid"]=$id;
            header("Location: admin-panel.php");
        }else{
            echo "<script>alert('invalid user');</script>";
            header("Location: admin-log.php");
        }
    }
?>