<?php 
    include("conn.php");
    $error = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="AdminRegister.css">
    <script src="AdminRegister.js"></script>
    <style>
     
    .container{
        height: 400px;
        width: 40%;
        
        padding: 30px;
        margin: 30%;
        margin-top: 10%;
        margin-bottom: 11%;
        font-family: Times New Roman;
        font-size: 20px;
        border-radius: 20px;
        /* background-color: red; */
    }
    span{
        color: red;
        text-align: center;
    } 
    /* body
    {
        background-image: url("Images/image2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    } */
    form
    {
        padding: 10px;
        margin: 10px;

    }
    h2
    {
        font-size: 60px;
    }

</style>
<?php 
   
    if(isset($_POST['log']))
    {
        $username = $_POST['txtuname'];
        $pass=$_POST['txtpass'];
        $query ="SELECT * FROM adminregister WHERE adminUserName='$username' and adminPass='$pass'";
        $result = mysqli_query($conn,$query);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);
        if($count == 1)
        {
            session_start();
            
            $_SESSION["adminname"] = $row['adminUserName'];
            header('location:AddCategory.php');

        }
        else
        {
            $error = "Invalid UserName and Password";
            echo '<script language="text/javascript" >alert("Invalid UserName and Password");</script>';
            header("location:AdminRegister.php");

        }
    }
?>
  
</head>

<body>
   <div class="container">
        <h2 align="center">Login</h2>
        <form  method="post" class="form-inline" >
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lbllogin">User Name :-</label></div>
                    <div class="col-sm-9">
                        <input type="text" name="txtuname" placeholder="Enter Your Username.." id="txtuname" class="form-control" onblur='uname(this.id,"val1");' >
                    </div>
                    <label for="val1" id="val1" class="error"></label>
                </div>
            </div><br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-3"><label for="lblpass">Password :-</label></div>
                    <div class="col-sm-9"><input type="password" name="txtpass" placeholder="Enter Your Password.." id="txtpass" class="form-control" onblur='pass(this.id,"val2");'>
                    </div>
                    <label for="val2" id="val2" class="error"></label>
                </div>
            </div><br>
            <div class="form-group" align="center">
                <input type="submit" name="log" value="Login" class="btn btn-success"><br>
                <span><?php echo $error; ?></span>
            
            </div>
        </form>

   </div>
</body>

</html>