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
        
        $filename = $_FILES['txtsubi']['name'];
        $tempname = $_FILES['txtsubi']['tmp_name'];
         $folder = "../Images/Subcategory/". $filename ;

        $cid= mysqli_real_escape_string($conn,$_POST['selcat']);
        $sname = $_POST['txtsub'];
        if(move_uploaded_file($tempname,$folder))
        {
             $uploadmsg = "Image is Uploaded ";
        }
       else
        {
             $uploadmsg = "Image is not Uploaded";
        }

        $q = "INSERT INTO `subcategory`(`sName`,`sImage`,`cId`) VALUES('$sname','$filename','$cid')";
        if(mysqli_query($conn,$q) or die(mysqli_error($conn)))
        {
            include("alert.php");
        
    
           
        }
       
    }
  ?>
<body>
<div id="layoutSidenav_content">

    <main>
    <center><h2  style="font-family:popins;" >Manage SubCategory</h2></center>
    <div class="container">
        
        <form method="post" action="" class="form-inline" style="font-family:popins;font-size: 20px;"  enctype="multipart/form-data">
        
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblselcat">Select Category :-</label></div>
                <div class="col-sm-9">
                    <?php 
                        $sel = mysqli_query($conn,"SELECT * FROM category");
                        $rowcount = mysqli_num_rows($sel);
                    ?>
                        <select name="selcat" id="selcat" class="form-select" onblur="drpcat(this.id,'val1');">
                            <option value="0">--------Select Category--------</option>
                            <?php 
                                for($i = 0;$i <= $rowcount; $i++)
                                {
                                   $row = mysqli_fetch_array($sel);
                                
                            ?>
                            <option value="<?php echo $row['cId']; ?>"><?php echo $row['cName']; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                </div>
                <label for="val1" id="val1" class="error"></label>
            </div>
        </div><br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblcat">SubCategory Name :-</label></div>
                <div class="col-sm-9">
                        <input type="text" name="txtsub" placeholder="Enter Your SubCategory Name .." id="txtsub" class="form-control" 
                        onblur="subcat  (this.id,'val2');" />
                </div>
                <label for="val2" id="val2" class="error"></label>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3"><label for="lblsubi">SubCategory Image :-</label></div>
                <div class="col-sm-9">
                        <input type="file" name="txtsubi"  id="txtsubi" class="form-control" >
                </div>
                
            </div>
        </div>
        <br>

        <div  align="center">
            <input type="submit" value="Submit" class="btn btn-danger" name="sub">
            <br><br>
            <!-- <span><?php  echo $dis; ?></span> -->
        </div>
     </form > 
    </div>
    <?php 
         $q1 = mysqli_query($conn,"SELECT * FROM subcategory sc,category c where sc.cId = c.cId");
        echo "<center><table class='table table-bordered table-hover'><thead><tr><th>Sub Category ID</th><th>Sub Category Name</th><th>Sub Category Image</th><th>Category Name</th><th></th><th></th></tr></thead>";
        while($row = mysqli_fetch_array($q1))
        {
            echo "<tbody><tr><td>". $row['sId'] ."</td>";
            echo "<td>". $row['sName'] ."</td>";
            echo "<td><img src='../Images/Subcategory/".$row['sImage'] ."' width='120' height='180'></td>";
            echo "<td>". $row['cName'] ."</td>";
            echo "<td><button class='btn btn-info'><a href='EditSubcategory.php?sId=". $row['sId']."'><i class='fas fa-edit'></i> Update</a></button></td>";
            echo "<td><button class='btn btn-danger'><a href='DeleteSubcategory.php?sId=". $row['sId']."'><i class='fa fa-trash-can'></i> Delete</a></button></td></tr><tbody>";
            
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