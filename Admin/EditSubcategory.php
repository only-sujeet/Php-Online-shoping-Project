<?php 
include("AdminHeader.php");
include("conn.php");
    $dis = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="AdminRegister.css">
    <script src="Admin.js"></script>
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
<?php 

        if(isset($_GET['sId']))
        {
            $id = $_GET["sId"];
            $query = "SELECT * FROM `subcategory` WHERE `sId`='$id'";
            $q1 = mysqli_query($conn,$query);
            $row1 = mysqli_fetch_array($q1);

            if(isset($_POST["update"]))
            {
                $filename = $_FILES['t3']['name'];
                $tempname = $_FILES['t3']['tmp_name'];
                 $folder = "../Images/Subcategory/". $filename ;
        
           
                $sname = $_POST['t2'];
                if(move_uploaded_file($tempname,$folder))
                {
                     $uploadmsg = "Image is Uploaded ";
                }
               else
                {
                     $uploadmsg = "Image is not Uploaded";
                }
        
                $q = "UPDATE `subcategory` SET `sName`='$sname', `sImage`='$filename' WHERE `sId`='$id'";
                if(mysqli_query($conn,$q) or die(mysqli_error($conn)))
                {
                    echo "<script>window.location.href='AddSubCategory.php';</script>";
                   // header("location:AddSubCategory.php");
                }
               
            }
        }
  
  ?>
    <main>
    <center><h2  style="font-family:popins;" >Manage SubCategory</h2></center>
    <div class="container">
        
        <form method="post" action="" class="form-inline" style="font-family:popins;font-size: 20px;"  enctype="multipart/form-data">
        
       
            
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblbrand">SubCategory Name :-</label></div>
                <div class="col-sm-9">
                        <input type="text" name="t2" placeholder="Enter Your SubCategory Name .." id="txtsub" class="form-control" 
                        onblur="subcat  (this.id,'val2');"  value="<?php echo $row1['sName']; ?>"/>
                </div>
                <label for="val2" id="val2" class="error"></label>
            </div>
        </div>
        <br> 
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblsubi">SubCategory Image :-</label></div>
                <div class="col-sm-9">
                        <input type="file" name="t3" placeholder="Enter Your SubCategory Image.." id="txtsubi" class="form-control" value="<?php echo $row1['sImage']; ?>" >
                </div>
                
            </div>
        </div>
        <br>

        <div  align="center">
            <input type="submit" value="Update" class="btn btn-danger" name="update">
            <br><br>
            <!-- <span><?php  echo $dis; ?></span> -->
        </div>
     </form > 
    </div>
   
    </main>
</div>
               
  
</body>
<?php 
    include("AdminFooter.php");
?>
</html>