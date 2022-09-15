<?php 
include("AdminHeader.php");
include("conn.php");
    $dis = "";
    $uploadmsg = "";
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
    if(isset($_GET['bId']))
    {
      $id = $_GET["bId"];
      $q1 = mysqli_query($conn,"SELECT * from brand where bId='$id'") ;
      $row = mysqli_fetch_array($q1); 

      if(isset($_POST['update']))
      {
          $filename = $_FILES['t2']['name'];
          $tempname = $_FILES['t2']['tmp_name'];
          $folder = "../Images/Brand/". $filename ;
  
          $bname = $_POST["t1"];
          if(move_uploaded_file($tempname,$folder))
          {
               $uploadmsg = "Image is Uploaded ";
          }
         else
          {
               $uploadmsg = "Image is not Uploaded";
          }
  
          $q = mysqli_query($conn,"UPDATE brand SET bName='$bname',bImage='$filename' WHERE bId='$id'");
          if($q)
          {
            echo "<script>window.location.href='AddBrand.php';</script>";
          }
         
      }
    }
   
  ?>
<body>
<div id="layoutSidenav_content">

    <main>
    <center><h2  style="font-family:popins;" >Add Brands</h2></center>
    <div class="container">
        
        <form method="post" action="" class="form-inline" style="font-family:popins;font-size: 20px;"  enctype="multipart/form-data">
        
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblbrand">Brand Name :-</label></div>
                <div class="col-sm-9">
                        <input type="text" name="t1" placeholder="Enter Your Brand .." id="txtbrand" class="form-control" 
                        onblur="bname(this.id,'val2');"  value="<?php echo $row['bName']; ?>"/>
                </div>
                <label for="val2" id="val2" class="error"></label>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblbrandi">Brand Image :-</label></div>
                <div class="col-sm-9">
                        <input type="file" name="t2" placeholder="Enter Your Brand Image.." id="txtbrandi" class="form-control" value="<?php echo $row['bImage']; ?>" >
                </div>
                <label for="lblmsg"><?php echo $uploadmsg; ?></label>
            </div>
        </div>
        <br>

        <div  align="center">
            <input type="submit" value="Submit" class="btn btn-danger" name="update"><br><br>
            <span></span>
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