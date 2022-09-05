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
		<div class="col-md-12">
			<table class="table table-light">
				  <thead>
				    <tr>
				      <th scope="col">Email</th>
				      <th scope="col">Phone #</th>
				      <th scope="col">Address</th>
				      <th scope="col">Country</th>
				      <th scope="col">State</th>
				      <th scope="col">Zip</th>
				    </tr>
				  </thead>
				  <tbody>
<?php
$select = "SELECT * FROM `credit_card` WHERE `Order_id`='$order'";
$exexute = mysqli_query($conn, $select);
while ($row = mysqli_fetch_array($exexute))
{
    echo '
    <tr>
      <td>'.$row['email'].'</td>
      <td>'.$row['phone'].'</td>
      <td>'.$row['address'].'</td>
      <td>'.$row['country'].'</td>
      <td>'.$row['state'].'</td>
      <td>'.$row['zip'].'</td>
    </tr>';
}
?>
</tbody>
</table>
</div>
</div>
</div>