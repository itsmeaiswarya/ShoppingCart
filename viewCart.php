<?php 
	include "config.php";
	session_start();
	$abc = $_SESSION["cartDB"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Php Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  
<div class="container">
  <div class="row">
			<h1>Cart Items</h1><hr>
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
