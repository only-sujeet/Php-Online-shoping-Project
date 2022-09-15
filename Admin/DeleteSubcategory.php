
<?php   
   
   
    include("conn.php");
    if(isset($_GET['sId']))
    {
        $id = $_GET["sId"];
        $q = mysqli_query($conn,"DELETE FROM subcategory WHERE sId='$id'");
        if($q)
        {
            
            header('location:AddSubCategory.php');
        }
    }
?>