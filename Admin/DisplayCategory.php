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
    <title>Admin</title>
    <style>
        a
        {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
    <center><h2  style="font-family:popins;" >Category</h2></center>
 <div class="container" style="width: 80%;" >
 <?php 
        
        $query = mysqli_query($conn,"SELECT * from category");
        echo "<table  class='table table-bordered table-hover' ><thead class='thead-dark'><tr><th> Category ID</th><th>Category Name</th><th>Category Image</th><th></th><th></th></tr></thead>";
        while($row = mysqli_fetch_array($query))
        {
            echo "<tbody><tr><td>". $row['cId'] . "</td>";
            echo "<td>". $row['cName']."</td>";
            echo "<td><img src='../Images/". $row['cImage']."' width='100' height='100'></td>";
            echo "<td><button class='btn btn-info'><a href='EditCategory.php?cId=". $row['cId'] . "'>Update</a></button></td>"; 
            echo "<td><button class='btn btn-info'><a href='DeleteCategory.php?cId=". $row['cId'] . "'>Delete</a></button></td></tr></tbody>"; 
        }
       
    ?>
    </table>
    </main>
</div>
</body>
<?php 
    include("AdminFooter.php");
?>
</html>