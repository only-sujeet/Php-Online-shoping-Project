<script src="sweetalert.min.js"></script>
<?php 
    
    include("conn.php");
    include("cdn.php");
    include("usernav.php");
?>
<?php 
     session_start();
    
    if($_SESSION["username"] == true){

    }else{
        header("location:Login.php");
    }
    if(isset($_GET['OrderId']))
    {
        $id = $_GET['OrderId'];
        $q = "select * from productorder where OrderId='$id'";
        $result1 = mysqli_query($conn,$q);
        $row2 = mysqli_fetch_array($result1);

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="css1/Buynow.css">
</head>
<body>
    <br><br>
    <h1 align="center">Order</h1>
    <div class="container">
        
        <form action="" method="post">
            <div class="row">
         
                <div class="col-md-4">
                    <label for="">UserName:</label><br>
                    <label for="">Product Name:</label><br>
                    <label for="">Product Price:</label><br>
                    <label for="">Quantity:</label><br>
                    <label for="">Total:</label><br>
                    <input type="submit" value="Confirm Order" name="subupdate" class="btn btn-success">
                </div>
                <div class="col-md-4">
                    <input type="text" name="txtuname" id="txtuname" class="form-control"     value="<?php echo $_SESSION["username"];  ?>"  readonly><br>
                    <input type="text" name="txtpname" id="txtpname" class="form-control" value="<?php  echo $row2['ProductName']; ?>"readonly><br>
                    <input type="text" name="txtprice" id="txtprice" class="form-control" value="<?php echo $row2['ProductPrice'] ?>" readonly><br>
                    <select id="qty" name="t1" onchange="autochange(this.value)" id="" class="select form-select" value="<?php echo $row2['ProductQty']; ?>">
                        <option value="1">1</option>
                        
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select><br>
                    <input type="text" name="t2" id="txttotal" value="<?php echo $row2['ProductPrice']; ?>" class="form-control" readonly><br>
                    
                </div>
                <div class="col-md-4">
                    <img  class="img" src="../Images/Product/<?php  echo    $row2['ProductImage']; ?>" alt="" ><br><br>
                    <input type="hidden"  value="<?php echo $row2['ProductImage']; ?>" name="pimage">
                </div>
            </div>
        </form>
    </div>
    <script>
        function autochange(val){
            var total_price = val * <?php echo $row2['ProductPrice']; ?>;
            var qty = document.getElementById('txttotal');
            qty.value = total_price;
        }
    </script>
    <?php 
    if(isset($_POST['subupdate']))
    {
        
        $qty = $_POST['t1'];
        $total = $_POST['t2'];
         $query2 = "UPDATE productorder set ProductQty='$qty', Total='$total' where OrderId='$id'";
        
          if(mysqli_query($conn,$query2)or die(mysqli_errno($conn)))
          {
            
            echo "<script>window.location.href='YourOrder.php';</script>"; 
          }
    }
    
    ?>
</body>
</html>