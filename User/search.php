
<?php 
include("conn.php");
 include("usernav.php");
$msg = "";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css1/search.css">
    <link rel="stylesheet" href="css1/product.css">
<style>
        #msg {
            width: 50%;
        }
    </style>
</head>
<body>
    <?php 
    if (isset($_POST['submit'])) {
        if ($_POST['txt_find'] == "") {
            header('location:user.php');
        } else {
            $str = $_POST['txt_find'];
            $qry = "SELECT * FROM product WHERE pName LIKE '%$str%'";
            $result = mysqli_query($conn, $qry);
    
            if (mysqli_num_rows($result) > 0) {?>
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

    <?php 
     } else {
                $msg = $str;
            }
        }
    }
    
    ?>
<?php

if ($msg == "") {
    } else { ?>
        <h1 class="text-center"> <img id="msg" src="../Images/msg.jpg" alt="" srcset=""></h1>
        <h1 class="text-center"> Result Not Found </h1>
        <h3 class="text-center">No Result For <?php echo $msg ?></h3>
    <?php } ?> 
</body>
</html>