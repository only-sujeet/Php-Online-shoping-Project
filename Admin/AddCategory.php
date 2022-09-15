<script src="sweetalert.min.js"></script>
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
    <script src="jquery.js"></script>
    <script src="Admin.js"></script>
    <title>Admin</title>
    <style>
        body
        {
            margin-top :10px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<?php 
    if(isset($_POST["sub"]))
    {
        $filename = $_FILES['txtcati']['name'];
        $tempname = $_FILES['txtcati']['tmp_name'];
        $folder = "../Images/". $filename ;

        $catname = $_POST["txtcat"];
        if(move_uploaded_file($tempname,$folder))
        {
             $uploadmsg = "Image is Uploaded ";
        }
       else
        {
             $uploadmsg = "Image is not Uploaded";
        }

        $q = "INSERT INTO category(cName,cImage) VALUES('$catname','$filename')";
        if(mysqli_query($conn,$q) or die(mysqli_error($conn)))
        {
            include("alert.php");
        ?>
        <!-- <script>
            alert("Record Inserted");
        </script> -->
        <?php
        }
        else
        {
            $dis = "Record is Not Inserted";
        }
    }
  ?>
<body>
<div id="layoutSidenav_content">
    <main>
    <center><h2  style="font-family:popins;" >Add Catogory</h2></center>
    <div class="container">
        
        <form method="post" action="" class="form-inline" style="font-family:popins;font-size: 20px;"  enctype="multipart/form-data">
        
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblcat">Catergory Name :-</label></div>
                <div class="col-sm-9">
                        <input type="text" name="txtcat" placeholder="Enter Your Category.." id="txtcat" class="form-control" onblur='cat(this.id,"val1");' >
                </div>
                <label for="val1" id="val1" class="error"></label>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblcati">Catergory Image :-</label></div>
                <div class="col-sm-9">
                        <input type="file" name="txtcati" placeholder="Enter Your Category Image.." id="txtcati" class="form-control" >
                </div>
                
            </div>
        </div>
        <br>

        <div  align="center">
            <input type="submit" value="Submit" class="btn btn-danger" name="sub"><br><br>
            <span><?php echo $dis; ?></span>
        </div>
     </form > 
    </div>
    <?php 
        
        $query = mysqli_query($conn,"SELECT * from category");
        echo "<table  class='table table-bordered table-hover' ><thead class='thead-dark'><tr><th> Category ID</th><th>Category Name</th><th>Category Image</th><th></th><th></th></tr></thead>";
        while($row = mysqli_fetch_array($query))
        {
            echo "<tbody><tr><td>". $row['cId'] . "</td>";
            echo "<td>". $row['cName']."</td>";
            echo "<td><img src='../Images/". $row['cImage']."' width='100' height='100'></td>";
            echo "<td><button class='btn btn-info'><a href='EditCategory.php?cId=". $row['cId'] . " '><i class='fas fa-edit'></i> Update</a></button></td>"; 
            echo "<td><button class='btn btn-danger'><a href='DeleteCategory.php?cId=". $row['cId'] . "'><i class='fa fa-trash-can'></i> Delete</a></button></td></tr></tbody>"; 
        }
       
    ?>
    </main>
</div>
               
  
<?php 
    include("AdminFooter.php");
?>
</html>