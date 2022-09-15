<?php include("cdn.php"); ?>
<!DOCTYPE html>
 <html lang="en">
 <head charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="bootstrap.min.css">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/all.css">	 
 <link rel="stylesheet" href="css1/practice.css">
 <title>Overlays</title>
 </head>
 <body>
 <header>
 <a href="#" class="logo"><img src="logo/clothes.png" height="30px" width="30px">Overlays</a>
 <nav class="navbar">
	<a href="user.php" >Home</a>
	<a href="YourOrder.php">Orders</a>
	<a href="#about">About Us</a>
	<a href="#about">Contact Us</a>
	<a href="Login.php">Login</a>
	<!-- <a href="#menu">menu</a>
	<a href="#review">review</a>
	<a href="#order">order</a> -->
 </nav>
 <div >
 <form method="post"  action="search.php" >
	<div class="form-group-sm">
		<div class="row">
			<div class="col-sm-10"><input type="search" name="txt_find" class="form-control" placeholder="Search Product "></div>
			<div class="col-sm-2"><button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-search"></i></button></div>
		</div>
	</div>	 
        </form>
</div>
<div>
	<a href="LogOut.php"><img  class="logo" src="logo/logout.png" height="25px" width="25px"></a>
</div>
 
 </header>
 <br><br><br><br>
 </body>
 </html>