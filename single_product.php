<?php
include 'config.php';
include 'header.php';
if(!isset($_GET['pro_id'])){
	  echo "<script>
          window.location.href = 'index.php';
        </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Shop</title>
</head>
<body>

<div class="container">
	<div class="row my-5 d-flex align-items-center rounded border bg-light">
<?php
$pro_id = $_GET['pro_id'];
$Pub_id = $_GET['Pub_id'];
$select = "SELECT * FROM `products` WHERE id = '$pro_id'";
$exexute = mysqli_query($conn,$select);
while($row = mysqli_fetch_array($exexute)){
echo '
<div class="col-md-6 p-0"><img src="img/'.$row['img_src'].'" class="img-fluid"></div>
		<div class="col-md-6">
		<form action="manage_cart.php" method="post">
			<div class="p-5">
				<h3>'.$row['name'].'</h3>
				<p>Description : '.$row['Description'].'</p>
				<label>Quantity:</label>
				<input type="number" name="quantity" class="form-control" min="1" class="mb-2" value="1"><br>';

if (isset($_SESSION['name'])) {
					echo '<button name="single_cart_btn" type="submit" class="btn btn-info">Add To Cart</button>
						<a href="chatting/index.php?admin='.$Pub_id.'" class="btn btn-danger">Chat with Publisher</a>';
				}else{
					echo '<a href="all_login.php" class="btn btn-danger">Login For Cart</a>';
				}

echo '
<input type="hidden" name="product_id" value="'.$pro_id.'">
		<input type="hidden" name="Item_Name" value="'.$row['name'].'">
		<input type="hidden" name="img_src" value="'.$row['img_src'].'">
		 <input type="hidden" name="price" value="'.$row['price'].'">
		 <input type="hidden" name="Pub_id" value="'.$Pub_id.'">
		</form>
			</div>
		</div>
';
}
?>
		
	</div>
</div>
</body>
</html>