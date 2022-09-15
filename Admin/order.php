<?php 

include("AdminHeader.php");
include("conn.php");
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="AdminRegister.css">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
            
        }
    </style>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
    <center><h2  style="font-family:popins;" >Orders</h2></center>
 <div class="container" style="width: 80%;" >
 <?php 
         $query = mysqli_query($conn,"SELECT * FROM productorder");
        echo "<center><table class='table table-bordered table-hover'><thead><tr><th>Order ID</th><th>User Name</th><th>Product Name</th><th>Product Image</th><th>Product Price</th><th>Product Qunatity</th><th>Total Price</th><th>Order Date</th></th></tr></thead>";
        while($row5 = mysqli_fetch_array($query))
        {
            echo "<tbody><tr><td>". $row5['OrderId'] ."</td>";
            echo "<td>". $row5['Username'] ."</td>";
            echo "<td>". $row5['ProductName'] ."</td>";
            echo "<td><img src='../Images/Product/".$row5['ProductImage'] ."' width='100' height='100'></td>";
            echo "<td>". $row5['ProductPrice'] ."</td>";
            echo "<td>". $row5['ProductQty'] ."</td>";
            echo "<td>". $row5['Total'] ."</td>";
            echo "<td>". $row5['OrderDate'] ."</td>";
            echo "<td><button class='btn btn-danger'><a href='Deleteorder.php?OrderId=". $row5['OrderId']."'><i class='fa fa-trash-can'></i> Delete</a></button></td></tr><tbody>";
            
        }
       
    ?>
    </table>
    </main>
</div>
<?php 
    include("AdminFooter.php");
?>
</body>
</html>