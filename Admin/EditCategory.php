
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
        }
    </style>
</head>

<body>
<div id="layoutSidenav_content">
    <main>
    <?php 
    if(isset($_GET['cId']))
    {
        $id = $_GET['cId'];
        $q1 = mysqli_query($conn,"SELECT * FROM category WHERE cId='$id'");
        $row = mysqli_fetch_array($q1);
        if(isset($_POST['update']))
        {include_once("alertupdate.php");
            $filename = $_FILES['t2']['name'];
            $tempname = $_FILES['t2']['tmp_name'];
            $folder = "../Images/". $filename ;

            $catname = $_POST["t1"];
            if(move_uploaded_file($tempname,$folder))
            {
                $uploadmsg = "Image is Uploaded ";
            }
        else
            {
                $uploadmsg = "Image is not Uploaded";
            }
           
            $q = mysqli_query($conn,"UPDATE category set cName='$catname',cImage='$filename' where cId='$id'");
            if($q)
            {
                //header("location:DisplayCategory.php");
                echo "<script>window.location.href='AddCategory.php';</script>";   
            }
        }
    }
  ?>
    <center><h2  style="font-family:popins;" >Update Catogory</h2></center>
    <div class="container">
        
        <form method="post" action="" class="form-inline" style="font-family:popins;font-size: 20px;"  enctype="multipart/form-data">
        
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblcat">Catergory Name :-</label></div>
                <div class="col-sm-9">
                        <input type="text" name="t1" placeholder="Enter Your Category.." id="txtcat" class="form-control" onblur='cat(this.id,"val1");' value="<?php echo $row['cName']; ?>" >
                </div>
                <label for="val1" id="val1" class="error"></label>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblcati">Catergory Image :-</label></div>
                <div class="col-sm-9">
                        <input type="file" name="t2" placeholder="Enter Your Category.." id="txtcati" class="form-control"  value="<?php  echo $row['cImage']; ?>">
                </div>
                
            </div>
        </div>
        <br>

        <div  align="center">
            <input type="submit" value="Update" class="btn btn-danger" name="update"><br><br>
            
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