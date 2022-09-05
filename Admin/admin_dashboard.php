<?php include 'admin_nav.php'; ?>
<style type="text/css">
	a{
		text-decoration: none!important;
		color: #fff;
	}
</style>
<div class="container">
	<div class="row my-5">
		<div class="col-md-3 p-5 text-center bg-primary text-white rounded">
      <?php
        $select = "SELECT * FROM `orders_manager`";
        $exexute = mysqli_query($conn, $select);
        $orders = 0;
        while ($row = mysqli_fetch_array($exexute))
        {
          $orders+=1;
        }
      ?>
			<h2><a href="order.php"><?php echo $orders; ?> Orders</a></h2>
		</div>

    <div class="offset-md-1 col-md-3 p-5 text-center bg-info text-white rounded">
      <?php
      $Pub_id = $_SESSION['admin_id'];
        $select1 = "SELECT * FROM `products` WHERE `publisher_id` = '$Pub_id'";
        $exexute1 = mysqli_query($conn, $select1);
        $products = 0;
        while ($row1 = mysqli_fetch_array($exexute1))
        {
          $products+=1;
        }
      ?>
      <h2><a href="Product/view_products.php"><?php echo $products; ?> Products</a></h2>
    </div>
    <div class="offset-md-1 col-md-3 p-5 text-center bg-success text-white rounded">
      <?php
        $select2 = "SELECT * FROM `users`";
        $exexute2 = mysqli_query($conn, $select2);
        $users = 0;
        while ($row2 = mysqli_fetch_array($exexute2))
        {
          $users+=1;
        }
      ?>
      <h2><?php echo $users; ?> users</h2>
    </div>
	</div>
</div>