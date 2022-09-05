<?php include 'config.php'; ?>
<?php include 'header.php'; 
if (!isset($_SESSION['id'])) {
   echo "<script>
          window.location.href = 'all_login.php';
        </script>";
}
?>

<style type="text/css">
	a{
		text-decoration: none!important;
		color: #fff;
	}
</style>
<div class="container">
	<div class="row my-5">
		<div class="offset-md-1 col-md-10">
			<table class="table table-dark text-center">
				  <thead>
				    <tr>
				      <th scope="col">Order #</th>
				      <th scope="col">Status</th>
              <th scope="col">Actions</th>
				    </tr>
				  </thead>
				  <tbody>
<?php
$user_Id = $_SESSION['id'];
$select = "SELECT * FROM `orders_manager` WHERE `User_id` = '$user_Id'";
$exexute = mysqli_query($conn, $select);
$srno = 0;
while ($row = mysqli_fetch_array($exexute))
{
  $srno+=1;
    echo '
    <tr>
      <td>'.$srno.'</td>
      <td>'.$row['status'].'</td>
      <td><a class="btn btn-info btn-sm ml-2" href="order_products.php?order='.$row['Order_id'].'">Products</a></td>
    </tr>';
}
?>
  </tbody>
</table>
		</div>
	</div>
</div>