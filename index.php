<?php
$conn=mysqli_connect("localhost","users","P4\$\$w0rd123","cartDB");
// Check connection
if (!$conn){
  echo 'connection error:' . mysqli_connect_error();
}

$sql="SELECT * FROM products";
$result=mysqli_query($conn,$sql);

$stocks=mysqli_query($conn,$sql);

mysqli_free_result($result);


session_start();
mysqli_close($conn);


?>

<!DOCTYPE html>
<html>
<body>

 <h4 class="center grey-text">SHOPPING CART</h4>

 <div class="container">
  <div class="row">

    <?php foreach($stocks as $stock){ ?>

      <div class="col s6 md3">
      <div class="card z-depth-0">
        <div class="card-content center">
          <h6><?php echo htmlspecialchars($stock['name']); ?> </h6>
            <div><?php echo htmlspecialchars($stock['price']); ?></div>
            <div><?php echo htmlspecialchars($stock['id']);  ?></div>
            <img src="images/<?php echo htmlspecialchars($stock['image']); ?>" width="300" height="300">


          </div>
      <div class="card-action right-align">
        <button id="addItem" class="btn btn-success btn-md">Add to cart</button>
        

      </div>
    </div>
  </div>
</div>
<div class="col s6 md3"></div>

   <?php } ?>
</div>
</div>
</body>
</html>
