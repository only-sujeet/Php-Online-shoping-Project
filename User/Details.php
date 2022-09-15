<?php 
    include("conn.php");
    include("usernav.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="css1/Details.css">
    <link rel="stylesheet" href="css/all.css">
   
    
</head>
<body>
    <?php 
        if(isset($_GET['pId']))
        {
            $pid = $_GET["pId"];
            $q1 = "select * from product p,brand b where p.bId=b.bId and  pId='$pid'";
            $result = mysqli_query($conn,$q1);
            $row1 = mysqli_fetch_array($result);
            
        }
    ?>
    <br><br><br>
  <div class="container">
    <h1 align="center">Product Details</h1><br><br>
    <div class="row">
        
        <div class="col-6">
            <img  class="img" src="../Images/Product/<?php echo $row1['pImage1']; ?>" alt="" width="100%">
        </div>
        <div class="col-6">
           
                <h3><?php echo $row1['pName']; ?></h3>
                <p class="p">Desritption :-<?php echo $row1['pDes']; ?></p>
                <p class="p">Brand:-<?php echo $row1['bName']; ?></p>
                <p class="price">Price :-<?php echo $row1['pPrice']; ?></p>
                <button type="submit" class="btn btn-primary btn-lg button"><a class="a" href="Buynow.php?pName=<?php echo $row1['pName']; ?>"><i class="fa fa-store"> </i>  Buy Now</a></button>
               
            
             
        </div>
       
    </div>
  </div>

</body>
</html>