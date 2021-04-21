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
					$id_array=array_column($_SESSION["cartDB"],"pid");
					if(!in_array($_GET["id"],$pid_array))
					{
						$index=count($_SESSION["cartDB"]);
						$item=array(
							'pid' => $_POST["id"],
							'name' => $_POST["name"],
							'price' => $_POST["price"],
							'quantity' => $_POST["quantity"]
						
						);
						$_SESSION["cartDB"][$index]=$item;
						
							echo "<script>alert('Product Added..');</script>";
						
					}
					else
					{
						echo "<script>alert('Already Added..');</script>";
					}
				}
				else
				{
						$item=array(
							'pid' => $_POST["id"],
							'name' => $_POST["name"],
							'price' => $_POST["price"],
							'image' => $_POST["image"],
							'quantity' => $_POST["quantity"]
						);
						$_SESSION["cartDB"][0]=$item;
						

						echo "<script>alert('Product Added..');</script>";
						
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
  	

  		<tr>



<?php foreach($stocks as $stock){ ?>
<form action="view.php" method="POST"> 

      <div class="col s6 md3">
      <div class="card z-depth-0">
        <div class="card-content center">
          <td><h6><?php echo htmlspecialchars($stock['name']); ?> </h6></td>
            <td><div><?php echo htmlspecialchars($stock['price']); ?></div></td>
           <td><div><?php echo htmlspecialchars($stock['id']);  ?></div></td>
            <td><img src="images/<?php echo htmlspecialchars($stock['image']); ?>" width="300" height="300"></td>


            
    <td><p><input type="text"  placeholder="Enter Quantity" name="quantity"  class="form-control"></p></td>
	<p><input type="hidden"  name="name" value="<?php echo htmlspecialchars($stock['name']); ?>" class="form-control"></p>
	<p><input type="hidden"  name="price" value="<?php echo $stock['price']; ?>" class="form-control"></p>
	<p><input type="hidden"  name="id" value="<?php echo $stock['id']; ?>" class="form-control"></p>
    

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
</form>
   <?php } ?>
  </div>
</tr>

</table>
</div>

</body>
</html>



