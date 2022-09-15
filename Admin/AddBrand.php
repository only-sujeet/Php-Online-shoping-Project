<script src="sweetalert.min.js"></script>
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
<?php 
    if(isset($_POST["sub"]))
    {
        $filename = $_FILES['txtbrandi']['name'];
        $tempname = $_FILES['txtbrandi']['tmp_name'];
        $folder = "../Images/Brand/". $filename ;

        $bname = $_POST["txtbrand"];
        if(move_uploaded_file($tempname,$folder))
        {
             $uploadmsg = "Image is Uploaded ";
        }
       else
        {
             $uploadmsg = "Image is not Uploaded";
        }

        $q = "INSERT INTO brand(bName,bImage) VALUES('$bname','$filename')";
        if(mysqli_query($conn,$q) or die(mysqli_error($conn)))
        {
            include("alert.php");
        }
        
    }
  ?>
<body>
<div id="layoutSidenav_content">

    <main>
    <center><h2  style="font-family:popins;" >Manage Brands</h2></center>
    <div class="container">
        
        <form method="post" action="" class="form-inline" style="font-family:popins;font-size: 20px;"  enctype="multipart/form-data">
        
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblbrand">Brand Name :-</label></div>
                <div class="col-sm-9">
                        <input type="text" name="txtbrand" placeholder="Enter Your Brand .." id="txtbrand" class="form-control" 
                        onblur="bname(this.id,'val2');" />
                </div>
                <label for="val2" id="val2" class="error"></label>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblbrandi">Brand Image :-</label></div>
                <div class="col-sm-9">
                        <input type="file" name="txtbrandi" placeholder="Enter Your Brand Image.." id="txtbrandi" class="form-control" >
                </div>
                
            </div>
        </div>
        <br>

        <div  align="center">
            <input type="submit" value="Submit" class="btn btn-danger" name="sub"><br><br>
            <span></span>
        </div>
     </form > 
    </div>
    <?php 
        $q1 = mysqli_query($conn,"SELECT * FROM brand");
        echo "<center><table class='table table-bordered table-hover'><thead><tr><th>Brand ID</th><th>Brand Name</th><th>Brand Image</th><th></th><th></th></tr></thead>";
        while($row = mysqli_fetch_array($q1))
        {
            echo "<tbody><tr><td>". $row['bId'] ."</td>";
            echo "<td>". $row['bName'] ."</td>";
            echo "<td><img src='../Images/Brand/".$row['bImage'] ."' width='130' height='180'></td>";
            echo "<td><button class='btn btn-info'><a href='EditBrand.php?bId=". $row['bId']."'><i class='fas fa-edit'></i> Update</a></button></td>";
            echo "<td><button class='btn btn-danger'><a href='DeleteBrand.php?bId=". $row['bId']."'><i class='fa fa-trash-can'></i> Delete</a></button></td></tr><tbody>";
            
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