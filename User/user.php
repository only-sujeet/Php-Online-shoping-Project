<?php 
      
      include("usernav.php");

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="css1/card.css">
    
</head>
<body>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="h-50 w-100" src="slider/slider4.jpg   " alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="h-50 w-100" src="slider/slider2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="h-50 w-100" src="slider/slideer3.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
   
    <?php 
      include("conn.php");
      $query = "SELECT * from subcategory";
      $result = mysqli_query($conn,$query);
    
    ?>
    <div class="card-list">
        <?php while ($row1 = mysqli_fetch_array($result)) { ?>
          <a  class="a" href="Product.php?sId=<?php echo $row1['sId']; ?>">
        <div class="card">
            <div class="card_image">
                <img src="../Images/Subcategory/<?php echo $row1['sImage']; ?>" alt="img">
            </div>
            <div class="card_title title-black">
                <p><?php echo $row1['sName']; ?></p>
            </div>
        </div>
        </a>
        <?php } ?>
    </div>
</body>
</html>