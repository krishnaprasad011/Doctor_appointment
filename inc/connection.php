<?php
    $conn = mysqli_connect('localhost','root','','hospital',3308);
    if ( !$conn ) {
        # code...
        die('unable to connect' ) . mysqli_error( $conn );
    }
?>