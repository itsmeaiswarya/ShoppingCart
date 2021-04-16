<?php 
	include "config.php";
	session_start();
	include "config.php";
 session_start();
?>
<!DOCTYPE html>
<html lang="en">

<body>
  
<div class="container">
  <div class="row">
			<h3><center>Add To Cart In PHP</center></h3><hr>
			<button onclick="location.href = 'viewCart.php';" style="color: green;">cart</button>
			<?php 
			if(isset($_POST["add-to-cart"])){
				if(isset($_SESSION["cartDB"]))
				{
					$id_array=array_column($_SESSION["cartDB"],"id");
					if(!in_array($_GET["id"],$id_array))
					{
						$index=count($_SESSION["cartDB"]);
						$item=array(
							'id' => $_POST["id"],
							'name' => $_POST["name"],
							'price' => $_POST["price"],
						
						);
						$_SESSION["cartDB"][$index]=$item;
							echo "<script>alert('Product Added..');</script>";
						header("location:viewCart.php");
					}
					else
					{
						echo "<script>alert('Already Added..');</script>";
					}
				}
				else
				{
						$item=array(
							'id' => $_POST["id"],
							'name' => $_POST["name"],
							'price' => $_POST["price"],
							'image' => $_POST["image"]
						);
						$_SESSION["cartDB"][0]=$item;
						echo "<script>alert('Product Added..');</script>";
						header("location:viewCart.php");
				}
			} ?>
			
			<?php
            $sql="SELECT * FROM products";
   $result=mysqli_query($conn,$sql);


$stocks=mysqli_query($conn,$sql);

mysqli_free_result($result);


session_start();
mysqli_close($conn);

?>

<!DOCTYPE html>
<html>

 <?php 
 ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


 ?>
 <h4 class="center grey-text"><center>SHOPPING CART</center></h4>

 <div class="container">
  <div class="row">

  	<table>
  		<tr>
  		<th>name</th>

  		<th> price </th>

  		<th> id </th>

       <th>image</th>

       <th> quantity </th>


       <th> add to cart</th>




         

  		</tr>
  	<form action="view.php" method="POST"> 


  		<tr>



<?php foreach($stocks as $stock){ ?>

      <div class="col s6 md3">
      <div class="card z-depth-0">
        <div class="card-content center">
          <td><h6><?php echo htmlspecialchars($stock['name']); ?> </h6></td>
            <td><div><?php echo htmlspecialchars($stock['price']); ?></div></td>
           <td><div><?php echo htmlspecialchars($stock['id']);  ?></div></td>
            <td><img src="images/<?php echo htmlspecialchars($stock['image']); ?>" width="300" height="300"></td>


            
    <td><p><input type="text"  placeholder="Enter Quantity" name="quantity"  class="form-control"></p></td>
	<p><input type="hidden"  name="name" value="<?php echo htmlspecialchars($stock['name']); ?>" class="form-control"></p>
	<p><input type="hidden"  name="price" value="'.<?php echo $stock['price']; ?>.'" class="form-control"></p>
	<p><input type="hidden"  name="id" value="'.<?php echo $stock['id']; ?>.'" class="form-control"></p>
    

          </div>
      <div class="card-action right-align">
      	<td><input type="submit" name="add-to-cart" value="add-to-cart"></td>
        <body>
  <tbody>
      </div>
    </div>
  </div>
</div>
<div class="col s6 md3"></div>

   <?php } ?>
  </div>
</tr>
</form>
</table>
</div>

</body>
</html>

