<?php 
    
    include("usernav.php");
    include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css1/product.css">
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <style>
    .changebutton {
        color: black;
        text-decoration: none;
    }
</style>
</head>
<body>
    

    <?php  
            if(isset($_GET['sId']))
            {
                $sid = $_GET["sId"];
                $q = "select * from product where sId='$sid'";
                $result = mysqli_query($conn,$q);
            }    
    ?>

<div class="container-fluid">
    <div class="row">
        <?php while ($row = mysqli_fetch_array($result)) { ?>
            <div class="col-md-3 mb-2">
                <div class="card" style="   background-image: linear-gradient(to top,white,rgb(6, 149, 185)); ">
                    <img id="img" src="../Images/Product/<?php echo $row['pImage1']; ?>">
                    <div class="card-body">
                        <h3><?php echo $row['pName']; ?></h3>
                        <h5>Price:- <i class="fa fa-inr"></i> <?php echo $row['pPrice']; ?></h5>
                        <button class="button btn btn-primary"><a class="changebutton" href="Details.php?pId=<?php echo $row['pId']; ?>">View details</a></button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>