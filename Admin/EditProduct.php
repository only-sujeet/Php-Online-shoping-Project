<?php 
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
    if(isset($_GET['pId']))
    {
        $id = $_GET["pId"];
       $q1 = mysqli_query($conn,"SELECT * FROM product WHERE pId='$id'");
       $row = mysqli_fetch_array($q1); 
       if(isset($_POST["update"]))
       {
           $filename1 = $_FILES['t5']['name'];
           $filename2 = $_FILES['t6']['name'];
           $tempname1 = $_FILES['t5']['tmp_name'];
           $tempname2 = $_FILES['t6']['tmp_name'];
           $folder1 = "../Images/Product/". $filename1;
           $folder2 = "../Images/Product/". $filename2;
           move_uploaded_file($tempname1,$folder1);
           move_uploaded_file($tempname2,$folder2);
           $pname = $_POST['t1'];
           $price = $_POST['t2'];
           $pqty = $_POST['t3'];
           $pdes = $_POST['t4'];
          
          
           $q = "UPDATE product SET pName='$pname',pPrice=$price,pQuantity='$pqty',pDes='$pdes',pImage1='$filename1',pImage2='$filename2' WHERE pId='$id'";
           if(mysqli_query($conn,$q) or die(mysqli_error($conn)))
           {
               echo "<script>window.location.href='AddProduct.php';</script>";
              
           }
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
                            <input type="text" name="t1" placeholder="Enter Your Product Name .." id="txtproname" class="form-control" 
                            onblur="pname(this.id,'val1')" value="<?php echo  $row['pName']; ?>" />
                    </div>
                    <label for="val1" id="val1" class="error"></label>
                </div>
            </div>
            <br> <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblpprice">Product Price :-</label></div>
                    <div class="col-sm-9">
                            <input type="text" name="t2" placeholder="Enter Your Product Price .." id="txtprice" class="form-control" 
                            onblur="pprice(this.id,'val2');" value="<?php echo $row['pPrice']; ?>" />
                    </div>
                    <label for="val2" id="val2" class="error"></label>
                </div>
            </div>
            <br> <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblqty">Prouct Quantity :-</label></div>
                    <div class="col-sm-9">
                            <input type="text" name="t3" placeholder="Enter Your Product Quantity .." id="txtqty" class="form-control" 
                            onblur="pqty(this.id,'val3');"
                             value="<?php echo $row['pQuantity']; ?>" />
                    </div>
                    <label for="val3" id="val3" class="error"></label>
                </div>
            </div>
            <br> <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lbldes">Product Description :-</label></div>
                    <div class="col-sm-9">
                            <input type="text" name="t4" placeholder="Enter Your Product Description .." id="txtdes" class="form-control" 
                            onblur="pdes(this.id,'val4');"  value="<?php echo $row['pDes']; ?>"/>
                    </div>
                    <label for="val4" id="val4" class="error"></label>
                </div>
            </div>
            <br> 
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblimg1">Product Image :-</label></div>
                    <div class="col-sm-9">
                            <input type="file" name="t5" id="img1" class="form-control" value="<?php echo $row['pImage1']; ?>" />
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblimg2">Product Image :-</label></div>
                    <div class="col-sm-9">
                            <input type="file" name="t6" id="img2" class="form-control" value="<?php echo $row['pImage2']; ?>" />
                    </div>
                </div>
            </div>
            <br>
            
        </div><br>
        <div  align="center">
            <input type="submit" value="Update" class="btn btn-danger" name="update">
            <br><br>
            <label for=""><?php echo $err; ?></label>
            
        </div>
        </form>
    </div>  
    </main>
</div>

</body>
<?php 
include("AdminFooter.php");
?>
</html>