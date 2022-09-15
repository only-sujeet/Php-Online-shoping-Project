<?php 
include("conn.php");
$error ="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css1/form.css">	
    <script src="User.js"></script>
    <title>Overlays</title>
    
</head>
<body class="body1" style='background-image: url("logo/back.jpg");'>
    <div class="container1">
    <h1 align="center"><img class="logo" src="logo/regtister.png" alt=""></h1>
    <form  method="post">
    <h2 align="center">Login</h2>
    <div class="form-group">
                <div class="row">    
                    <div class="col-sm-3">
                            <label for="lbluname" class="form-label">User Name :-</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="txtuname" id="txtuname" class="form-control" placeholder="Enter User Name ..." onblur="uname(this.id,'val2');">
                        </div>
                </div>
                <label for="val2" id="val2" class="error"></label>
            </div>
            <div class="form-group">
                <div class="row">    
                    <div class="col-sm-3">
                            <label for="lblpass" class="form-label">Password :-</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="password" name="txtpass" id="txtpass" class="form-control" placeholder="Enter Password ..." onblur="pass(this.id,'val6');">
                        </div>
                </div>
                <label for="val6" id="val6" class="error"></label>
            </div>
             <div class="form-group">
                <p class="p">If don't have account Register first?  <a href="Register.php" class="a">Create a Account.
                </a> </p>
             </div>
            <div class="form-group" align="center">
                <input type="submit" value="SignIn"  class="btn btn-primary" name="sub">
               
                <br><label class="error"></label>
            </div>
    </form>
    </div>
</body>
<?php
if(isset($_POST["sub"]))
{
    $uname = $_POST["txtuname"];
    $pass = $_POST["txtpass"];
    $q ="SELECT * FROM userregister where uUsername='$uname' and uPass='$pass' ";
    $result = mysqli_query($conn,$q);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    if($count == 1)
    {
        session_start();
        $_SESSION["username"] = $row['uUsername'];
        header("location:user.php");
    }
    else
    {
        // $error = "Invalid UserName and Password";
        echo '<script>alert("Invalid UserName and Password");</script>';
    }
}
?>
</html>