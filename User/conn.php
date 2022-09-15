<?php 

    $conn = mysqli_connect("localhost","root",'',"minorproject");
    if(!$conn)
    {
        die("database is not connect". mysqli_connect_error());
    }
?>