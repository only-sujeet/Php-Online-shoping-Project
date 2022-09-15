<?php 
include("conn.php");
include("usernav.php");

?>
<?php 
     session_start();
    if($_SESSION["username"] == true){

    }else{
        header("location:Login.php");
    }
    $uname = $_SESSION['username'];
    $q = "SELECT * FROM productorder where Username='$uname'";
    $result = mysqli_query($conn, $q);
    if(mysqli_num_rows($result) > 0){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/all.css">
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="css1/order.css">
</head>
<body>
<div class="container-fluid">
            <div class="container my-5">
                
                <h1 class="text-center  mt-2 mb-5 "><i>Your Orders</i></h1>
                <h1 class="welcome">Welcome <?php echo $uname;?>  </h1>
                <div class="ragister">

                    <div class="row riv1">
                        <?php while ($row = mysqli_fetch_array($result)) {  ?>
                            <div class="col-md-4">
                                <img class="order_img" src="../Images/Product/<?php echo $row['ProductImage'] ?>" alt="">
                            </div>
                            <div class="col-md-4">
                                <div class="column2">
                                    <label class="l1">Order ID:</label><br>
                                    <label class="l1">Product Name:</label><br>
                                    <label class="l1">Price:</label><br>
                                    <label class="l1">Qunatity:</label><br>
                                    <label class="l1">Total price</label><br>
                                    <button type="submit" class="btn btn-primary" style="color: black;font-size: 13px;"><a class="a" href="UpdateOrder.php?OrderId=<?php echo $row['OrderId'] ?>"><i class="fas fa-edit" aria-hidden="true"></i>  Edit Order</a></button>                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="column3">
                                    <label class="l1"><?php echo $row['OrderId'] ?></label><br>
                                    <label class="l1"><?php echo $row['ProductName'] ?></label><br>
                                    <label class="l1"><?php echo $row['ProductPrice'] ?></label><br>
                                    <label class="l1"><?php echo $row['ProductQty'] ?></label><br>
                                    <label class="l1"><?php echo $row['Total'] ?></label><br>
                                    <button type="submit" class="btn btn-danger" style="color: black;font-size: 13px;"><a class="a" href="DeleteOrder.php?OrderId=<?php echo $row['OrderId'] ?>"><i class="fa fa-times" aria-hidden="true"></i>  Cancel Order</a></button>                                    
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>


            </div>
        </div>
        </div>

    <?php } else {
    echo " <br><br><br><h1 class='welcome' align='center'>NO Orders</h1> ";
}
    ?>
</body>
</html>