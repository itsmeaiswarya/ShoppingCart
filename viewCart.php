<?php 
	include "config.php";
	session_start();
	$abc = $_SESSION["cartDB"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Php Cart</title>
  
</head>
<body>
  
<div class="container">
  <div class="row">
	  <h1><center>Cart Items</center></h1>
			<a href='view.php'>Home</a>
			<table class='table'>	
				<tr>
					<th>Item Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>Total</th>
					<th>Remove</th>
				</tr>

				<?php 
				if(isset($_GET["del"]))
				{
					foreach($abc as $u)
					{
							if($u["id"]==$_GET["del"])
							{
								unset($_SESSION["cartDB"][$keys]);
							}
					}
				}
					if(!empty($abc))
					{
							$total=0;
							foreach($abc as $u)
							{
								$amt=(int)$u["quantity"]*(int)$u["price"];
									$total+=$amt;
									?>

									<tr>
												<td><?php echo $u["name"]; ?></td>
												<td><?php echo $u["quantity"]; ?></td>
												<td><?php echo $u["price"]; ?></td>
												<td><?php echo $amt; ?></td>
												<td><a href='viewCart.php?del=<?php echo $u["id"];?>'>Remove</a></td>
											</tr>

									

								<?php	
							}	
								echo "
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td>Total</td>
												<td>{$total}</td>
											</tr>";							
							
					}
				?>
			</table>
			
  </div>
</div>

</body>
</html>
