<?php 
    $conn = mysqli_connect("localhost","root",'',"minorproject");
    if(!$conn)
    {
        die("Database is not connect". mysqli_connect_error());
    }
    else
    {
        echo "<center>Database is Connect</center>";
    }
?>