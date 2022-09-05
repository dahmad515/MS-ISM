<?php
include 'admin_nav.php';
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
			<table class="table table-light text-center">
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
$select = "SELECT * FROM `orders` WHERE `Order_id`='$order'";
$exexute = mysqli_query($conn, $select);
while ($row = mysqli_fetch_array($exexute))
{
	$pro_id = $row['product_id'];
	$select2 = "SELECT * FROM `products` WHERE `id`='$pro_id'";
$exexute2 = mysqli_query($conn, $select2);
$row2 = mysqli_fetch_array($exexute2);
    echo '
    <tr>
      <td><img width="70" src="../img/'.$row2['img_src'].'"></td>
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
	$select3 = "SELECT * FROM `orders_manager` WHERE `Order_id`='$order'";
$exexute3 = mysqli_query($conn, $select3);
$row3 = mysqli_fetch_array($exexute3);
$order_mode = $row3['status'];
if($order_mode=='pending'){
	echo '<a class="btn btn-info" href="order.php?status=pending&id='.$order.'">Order is '.$order_mode.' Click To Confirm</a>';
}elseif($order_mode=='confirm'){
	echo '<a class="btn btn-info" href="order.php?status=delivered&id='.$order.'">Order is '.$order_mode.' Click For Delivered</a>';
}elseif($order_mode=='delivered'){
	echo '<a class="btn btn-info" href="">Order is '.$order_mode.'</a>';
}
	?>
</div>
</div>
</div>