<?php 
  include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIGN up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="AdminRegister.css">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script type="text/javascript" src="AdminRegister.js"language="javascript">
  </script>  

</head>

<body>
<div class="container pt-3">
<h1 align="center">Register</h1>
<div class="page">
<br>
<form class="need-validation" name="frmreg" id="frmreg" onsubmit=" return validate();" method="post">

<div class="form-group">
<div class="row">
<div class="col-sm-2"><label class="label" for="fname" id="fname">Name:-</label></div>
<div class="col-sm-10">
<input type="text" id="txtname" title="Name" name="txtname" placeholder="Enter Name Here.."  onblur='fname(this.id,"val1");' onfocus="changecolor(this.id);"class="form-control" >
</div>
<label id="val1" class="error" for="fname"></label>
</div>
</div>
<br>
<div class="form-group">
<div class="row">
<div class="col-sm-2"><label class="label" for="lbluser" id="lbluser">User Name:-</label></div>
<div class="col-sm-10"><input type="text" id="txtuser" for="txtuser" title="UserName" class="form-control" onblur='uname(this.id,"val2");' onfocus="changecolor(this.id);"placeholder="Enter UserName Here.." name="txtuser"/>
</div>
<label id="val2" class="error" for="user"></label>
</div>
</div>
<br>

<div class="form-group">
<div class="row">
<div class="col-sm-2"><label  class="label" for="bdate" id="bdate">Birth-Date:-</label></div>
<div class="col-sm-10"><input type="date" id="txtbdate" for="txtbdate" title="Birth-Date" class="form-control"placeholder="Enter Birth-Date Here.." onfocus="changecolor(this.id);"name="txtbdate"></div>
</div>
</div>
<br>
<div class="form-group">
  <div class="row">
    <div class="col-sm-2"><label class="label" for="email" id="email">Email:-</label></div>
    <div class="col-sm-10">
      <input type="email" id="txtemail" for="txtemail"  class="form-control" onfocus="changecolor(this.id)" onblur='email(this.id,"val4")'placeholder="Enter Email Here.." name="txtemail">
    </div>
    <label id="val4" class="error" for="Email"></label>
  </div>
</div>
<br>
<div class="form-group">
  <div class="row">
    <div class="col-sm-2">
      <label class="label" for="pwd" id="pwd">Password:-</label>
    </div>
    <div class="col-sm-10">
      <input type="password" id="txtpassword" for="txtpwd"  class="form-control" onfocus="changecolor(this.id)" onblur='pass(this.id,"val5")'placeholder="Enter Password Here.." name="txtpass">
    </div>
    <label id="val5" class="error" for="password"></label>
  </div>
</div>
<br>
<div class="form-group" align="center">
  <input type="submit" class="btn btn-success" id="btnsubmit" name="sub" value="SUBMIT">
  <input type="reset" class="btn btn-primary" id="btnreset" value="RESET">
</div>
<div align="center">
<label id="val7" class="error" for="submission"></label>
</div>
</form>
</div>
</div>
</body>
<?php 
  if(isset($_POST['sub']))
  {
    $name = $_POST["txtname"];
    $uname = $_POST["txtuser"];
   
    $bdate = $_POST["txtbdate"];
    $email =$_POST["txtemail"];
    $pass = $_POST["txtpass"];
    $q = "INSERT INTO adminregister(adminName,adminUserName,adminDate,adminEmail,adminPass) VALUES('$name','$uname','$bdate','$email','$pass')";
    if(mysqli_query($conn,$q)or die(mysqli_error($conn)))
    {
        header('location:AdminLogin.php');
    }
    else
    {
      echo "<center>Record is  Not Inserted</center>";
    }

  }

?>
</html>