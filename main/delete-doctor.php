<?php include '../inc/connection.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM doctors WHERE id = '$id'";
    if(mysqli_query($conn,$sql))
    {
        header('Location: edit-doctor.php');
    }else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>