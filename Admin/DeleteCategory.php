
<?php 
    include("conn.php");
   
   
    if(isset($_GET['cId']))
    {
        $id = $_GET["cId"];
        $q =mysqli_query($conn,"DELETE FROM category WHERE cId='$id'"); 
        if( $q)
        {
           
            echo "<script>window.location.href='AddCategory.php';</script>";
        
        }
    }
?>