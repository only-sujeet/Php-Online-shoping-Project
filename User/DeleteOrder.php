<?php 
    include("conn.php");
    include("usernav.php");

    if(isset($_GET['OrderId']))
    {
        $id = $_GET['OrderId'];
        $q = mysqli_query($conn,"DELETE FROM  productorder where OrderId='$id'");
        if($q)
        {
            header("location:YourOrder.php");
        }
    }
?>