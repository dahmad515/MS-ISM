<?php
include 'config.php';
include 'header.php';
if(!isset($_GET['order'])){
	echo "<script>
          window.location.href = 'order.php';
        </script>";
}
$order = $_GET['order'];
?>

<div class="container">
	<div class="row my-5">
		<div class="col-md-9">
			<table class="table table-dark text-center">
				  <thead>
				    <tr>
				      <th scope="col">Image</th>
				      <th scope="col">Name</th>
				      <th scope="col">Price</th>
				      <th scope="col">Quantity</th>
				    </tr>
				  </thead>
				  <tbody>
<?php
$totalprice = 0;
$select = "SELECT * FROM `orders` WHERE `Order_id`='$order'";
$exexute = mysqli_query($conn, $select);
while ($row = mysqli_fetch_array($exexute))
{
	$pro_id = $row['product_id'];
	$select2 = "SELECT * FROM `products` WHERE `id`='$pro_id'";
$exexute2 = mysqli_query($conn, $select2);

$row2 = mysqli_fetch_array($exexute2);
$totalprice += ($row2['price'] * $row['quantity']);
    echo '
    <tr>
      <td><img width="50" src="img/'.$row2['img_src'].'"></td>
      <td>'.$row2['name'].'</td>
      <td>'.$row2['price'].'</td>
      <td>'.$row['quantity'].'</td>
    </tr>';
}
?>
</tbody>
</table>
</div>
<div class="col-md-3">
	<?php
	echo '<a class="btn btn-info text-white">Total Price : '.$totalprice.'</a>';
	?>
</div>
</div>
</div>