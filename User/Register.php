<?php
    include("conn.php");
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
    <title>Register</title>
    <style>
        body{
            background-image: url("logo/back2.jpg");
        }
    </style>
</head>
<?php 
    if(isset($_POST['sub']))
    {
        $name = $_POST["txtname"];
        $uname = $_POST["txtuname"];
        $city = $_POST["selcity"];
        $date = $_POST["txtbdate"];
        $age= $_POST["txtage"];
        $email = $_POST["txtemail"];
        $pass = $_POST["txtpass"];
 
        $query ="INSERT INTO userregister(uName,uUsername,uCity,uBirthdate,uAge,uEmail,uPass) values('$name','$uname','$city','$date',$age,'$email','$pass')";
        if(mysqli_query($conn,$query)or die(mysqli_error($conn)))
        {
            header("location:Login.php");
        }
        else
        {
            echo "record is not inserted";
        }

    }
?>
<body>

    <div class="container">
    <h1 align="center"><img class="logo" src="logo/regi.png" alt="" align="center"></h1>
        <form method="post" id="frmreg"  onsubmit=" return validate();">
           
            <h2 align="center">Register</h2>
            <br>
            <div class="form-group">
                <div class="row">    
                    <div class="col-sm-3">
                            <label for="lblname"> Full Name :-</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="txtname" id="txtname" onblur='fullname(this.id,"val1");' class="form-control" placeholder="Enter Name ..."  >
                        </div>
                </div>
                <label for="val1" id="val1" class="error"></label>
            </div>
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
                            <label for="lblcity" class="form-label">City :-</label>
                        </div>
                        <div class="col-sm-9">
                            <?php 
                              $q = mysqli_query($conn,"SELECT * FROM city");
                              $rowcount = mysqli_num_rows($q);  
                            ?>
                            <select name="selcity"   id="selcity" class="form-select" onblur="chksel(this.id,'val3');">
                                
                            <option value="0" selected>Select City </option>
                            <?php 
                                    for($i=0; $i <= $rowcount;$i++ )
                                    {
                                        $row = mysqli_fetch_array($q);
                                    
                                ?>
                                <option value="<?php echo $row['cName'];  ?>"><?php echo $row['cName']; ?></option>
                                <?php } ?>
                            </select>
                           
                        </div>
                </div>
                <label for="val3" id="val3" class="error"></label>
            </div>
            
            <div class="form-group">
                <div class="row">    
                    <div class="col-sm-3">
                            <label for="lbldate" class="form-label">Birth Date :-</label>
                    </div>
                        <div class="col-sm-3">
                            <input type="date" name="txtbdate" id="txtbdate" class="form-control" placeholder="Enter Birth Date ...">
                        </div>
                        <div class="col-sm-2">
                            <label for="lblage" class="form-label">Age :-</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="txtage" id="txtage" class="form-control" placeholder="Enter Age ..." onblur="age(this.id,'val4');">
                        </div>
                </div>
                <label for="val4" id="val4" class="error"></label>
            </div>
           
            <div class="form-group">
                <div class="row">    
                    <div class="col-sm-3">
                            <label for="lblemail" class="form-label">Email ID :-</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="Email" name="txtemail" id="txtemail" class="form-control" placeholder="Enter Email ID ..." onblur="email(this.id,'val5');">
                        </div>
                </div>
                <label for="val5" id="val5" class="error"></label>
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
            
            <div class="form-group" align="center">
                <input type="submit" value="SignUp"  class="btn btn-primary" name="sub">
                <br><label for="lblvalidation" id="validate" class="error"></label>
            </div>
            
                
        </form>
    </div>
</body>
</html>