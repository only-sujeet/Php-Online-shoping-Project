<script src="sweetalert.min.js"></script>
<?php 
    include("alert.php");
    include("AdminHeader.php");
    include("conn.php");
    $err = "";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="AdminRegister.css">
    <script src="Product.js"></script>
    <title>Admin</title>
    <style>
        body
        {
            margin-top :10px;
            margin-right: 40px;
        }
        table
        {
            margin-right: 20px;
            
        }
        a
        {
            text-decoration: none;
        }

    </style>
</head>

<body>
<div id="layoutSidenav_content">
    <main>
    <?php 
    if(isset($_POST["sub"]))
    {
        $filename1 = $_FILES['img1']['name'];
        $filename2 = $_FILES['img2']['name'];
        $tempname1 = $_FILES['img1']['tmp_name'];
        $tempname2 = $_FILES['img2']['tmp_name'];
        $folder1 = "../Images/Product/". $filename1;
        $folder2 = "../Images/Product/". $filename2;
        move_uploaded_file($tempname1,$folder1);
        move_uploaded_file($tempname2,$folder2);
        $pname = $_POST['txtproname'];
        $price = $_POST['txtprice'];
        $pqty = $_POST['txtqty'];
        $pdes = $_POST['txtdes'];
        $cat = mysqli_real_escape_string($conn,$_POST['selcat']);
        $subcat = mysqli_real_escape_string($conn,$_POST['selsubcat']);
        $brand = mysqli_real_escape_string($conn,$_POST['selbrand']);
       
        $q = "INSERT INTO product(pName,pPrice,pQuantity,pDes,cId,sId,bId,pImage1,pImage2) VALUES('$pname',$price,$pqty,'$pdes','$cat','$subcat','$brand','$filename1','$filename2')";
        if(mysqli_query($conn,$q)or die(mysqli_error($conn)))
        {
        ?>
        <script>
            alert("Record Inserted");
        </script>
        <?php
        }
    }
?>
    <center><h2  style="font-family:popins;" >Manage Product</h2></center>
    <div class="container">
        
            <form method="post" action="" class="form-inline" style="font-family:popins;font-size: 20px;"  enctype="multipart/form-data">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblproname">Product Name :-</label></div>
                    <div class="col-sm-9">
                            <input type="text" name="txtproname" placeholder="Enter Your Product Name .." id="txtproname" class="form-control" 
                            onblur="pname(this.id,'val1')" />
                    </div>
                    <label for="val1" id="val1" class="error"></label>
                </div>
            </div>
            <br> <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblpprice">Product Price :-</label></div>
                    <div class="col-sm-9">
                            <input type="text" name="txtprice" placeholder="Enter Your Product Price .." id="txtprice" class="form-control" 
                            onblur="pprice(this.id,'val2');" />
                    </div>
                    <label for="val2" id="val2" class="error"></label>
                </div>
            </div>
            <br> <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblqty">Prouct Quantity :-</label></div>
                    <div class="col-sm-9">
                            <input type="text" name="txtqty" placeholder="Enter Your Product Quantity .." id="txtqty" class="form-control" 
                            onblur="pqty(this.id,'val3');" />
                    </div>
                    <label for="val3" id="val3" class="error"></label>
                </div>
            </div>
            <br> <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lbldes">Product Description :-</label></div>
                    <div class="col-sm-9">
                            <input type="text" name="txtdes" placeholder="Enter Your Product Description .." id="txtdes" class="form-control" 
                            onblur="pdes(this.id,'val4');" />
                    </div>
                    <label for="val4" id="val4" class="error"></label>
                </div>
            </div>
            <br> 
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblimg1">Product Image :-</label></div>
                    <div class="col-sm-9">
                            <input type="file" name="img1" id="img1" class="form-control" />
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblimg2">Product Image :-</label></div>
                    <div class="col-sm-9">
                            <input type="file" name="img2" id="img2" class="form-control" />
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblselcat">Select Category :-</label></div>
                <div class="col-sm-9">
                    <?php 
                        $sel = mysqli_query($conn,"SELECT * FROM category");
                        $rowcount = mysqli_num_rows($sel);
                    ?>
                        <select name="selcat" id="selcat" class="form-select" onblur="drpcat(this.id,'val5');">
                            <option value="0">--------Select Category--------</option>
                            <?php 
                                for($i = 0;$i <= $rowcount; $i++)
                                {
                                   $row1= mysqli_fetch_array($sel);
                                
                            ?>
                            <option value="<?php echo $row1['cId']; ?>"><?php echo $row1['cName']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                </div>
                <label for="val5" id="val5" class="error"></label>
            </div>
        </div><br><div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblselcat">Select Sub-Category :-</label></div>
                <div class="col-sm-9">
                    <?php 
                        $sel1 = mysqli_query($conn,"SELECT * FROM subcategory");
                        $rowcount1 = mysqli_num_rows($sel1);
                    ?>
                        <select name="selsubcat" id="selsubcat" class="form-select" onblur="drpsubcat(this.id,'val6');">
                            <option value="0">--------Select Sub Category--------</option>
                            <?php 
                                for($j = 0;$j <= $rowcount1; $j++)
                                {
                                   $row1 = mysqli_fetch_array($sel1);
                                
                            ?>
                            <option value="<?php echo $row1['sId']; ?>"><?php echo $row1['sName']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                </div>
                <label for="val6" id="val6" class="error"></label>
            </div>
        </div><br>
       
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblbrand">Select Brand :-</label></div>
                <div class="col-sm-9">
                    <?php 
                        $sel1 = mysqli_query($conn,"SELECT * FROM brand");
                        $rowcount1 = mysqli_num_rows($sel1);
                    ?>
                        <select name="selbrand" id="selbrand" class="form-select" onblur="drpbrand(this.id,'val7');">
                            <option value="0">--------Select Brand--------</option>
                            <?php 
                                for($j = 0;$j <= $rowcount1; $j++)
                                {
                                   $row1 = mysqli_fetch_array($sel1);
                                
                            ?>
                            <option value="<?php echo $row1['bId']; ?>"><?php echo $row1['bName']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                </div>
                <label for="val7" id="val7" class="error"></label>
            </div>
        </div><br>
        <div  align="center">
            <input type="submit" value="Insert" class="btn btn-danger" name="sub">
            <br><br>
            <label for=""><?php echo $err; ?></label>
            
        </div>
        </form>
    </div>    
    <?php 
         $query = mysqli_query($conn,"SELECT * FROM product p, subcategory sc,category c,brand b  where p.cId = c.cId and p.sId=sc.sId and p.bId=b.bId");
        echo "<center><table class='table table-bordered table-hover'><thead><tr><th>Product ID</th><th>Product Name</th><th>Product Price</th><th>Product Quantity</th><th>Product Description</th><th>Product Image</th><th>Product Image</th><th>Category Name</th><th>Sub category</th><th>Brand Name</th><th></th><th></th></tr></thead>";
        while($row5 = mysqli_fetch_array($query))
        {
            echo "<tbody><tr><td>". $row5['pId'] ."</td>";
            echo "<td>". $row5['pName'] ."</td>";
            echo "<td>". $row5['pPrice'] ."</td>";
            echo "<td>". $row5['pQuantity'] ."</td>";
            echo "<td>". $row5['pDes'] ."</td>";
            echo "<td><img src='../Images/Product/".$row5['pImage1'] ."' width='100' height='100'></td>";
            echo "<td><img src='../Images/Product/".$row5['pImage2'] ."' width='100' height='100'></td>";
            echo "<td>". $row5['cName'] ."</td>";
            echo "<td>". $row5['sName'] ."</td>";
            echo "<td>". $row5['bName'] ."</td>";
           
            echo "<td><button class='btn btn-info'><a href='EditProduct.php?pId=". $row5['pId']."'><i class='fas fa-edit'></i>Update</a></button></td>";
            echo "<td><button class='btn btn-danger'><a href='DeleteProduct.php?pId=". $row5['pId']."'><i class='fa fa-trash-can'></i> Delete</a></button></td></tr><tbody>";
            
        }
       
    ?>
        </table> </center>
    </main>
</div>

</body>
<?php 
include("AdminFooter.php");
?>
</html>