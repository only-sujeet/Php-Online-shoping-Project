<?php 
include("conn.php");

if(isset($_GET['pId']))
{
    $id = $_GET["pId"];
    $q = mysqli_query($conn,"DELETE FROM product where pId='$id'");
    if($q)
    {
        header('location:AddProduct.php');
    }
}


?>