<?php 
    include("conn.php");
    include_once("AdminFooter.php");
    if(isset($_GET['bId']))
    {
        $id = $_GET["bId"];
        $q = mysqli_query($conn,"DELETE FROM brand WHERE bId='$id'");
        if($q)
        {
            header('location:AddBrand.php');
        }
    }

?>