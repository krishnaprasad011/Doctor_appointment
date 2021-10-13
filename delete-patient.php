<?php include 'inc/connection.php';
    $uid = $_GET['uid'];

    $sql = "DELETE FROM users WHERE `uid` = '$uid'";
    if(mysqli_query($conn,$sql))
    {
        header('Location: view-patient.php');
    }else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>