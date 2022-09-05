<?php
include 'config.php';
include 'header.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Book Shop - My Card</title>
	</head>
	<body>
		<div class="container">
			<?php
			if (isset($_SESSION['cart']) && count($_SESSION['cart'])>0) {
			?>
			<div class="row my-5">
				<div class="col-md-8">
					<table class="table text-center">
						<thead>
							<tr>
								<th>Sr</th>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_SESSION['cart'])) {
								$totalprice = 0;
							foreach ($_SESSION['cart'] as $key => $value) {
								$pro_quan_price = (int)$value['price'] * (int)$value['quantity'];
								$totalprice+= $pro_quan_price;
								$sr = $key+1;
								echo "
								<tr>
											<td>$sr</td>
											<td><img src='img/$value[img_src]' width='50px'></td>
											<td>$value[Item_Name]</td>
											<td>$value[price]</td>
											<td>
													<form method='post' action='manage_cart.php'>
															<input type='number' style='text-align:center;width:70px;' onchange='this.form.submit()' min='1' name='mod_quantity' value='$value[quantity]'>
															<input type='hidden' name='Item_Name' value='$value[Item_Name]'>
													</form>
											</td>
											<td>
													<form method='post' action='manage_cart.php'>
															<input type='hidden' name='Item_Name' value='$value[Item_Name]'>
															<button class='btn btn-outline-danger btn-sm' name='remove_btn'>Remove</button>
													</form>
											</td>
								</tr>";
							}
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="col-md-4">
				<div class="p-2 bg-light border rounded">
				<?php
				if(isset($_SESSION['name'])){
					echo'
					<form action="place_order.php" method="POST">
							<p>Total Price : <b>'.$totalprice.'</b></p>
            <div class="mb-3">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="abc@gmail.com">
            </div>
            <div class="mb-3">
              <label>Phone</label>
              <input type="number" class="form-control" name="phone" placeholder="0301234567">
            </div>
            <div class="mb-3">
              <label>Address</label>
              <input type="text" class="form-control" name="address" placeholder="1234 Main St" required="">
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label>Country</label>
                <input type="text" class="form-control" name="country" placeholder="" required="">
              </div>
              <div class="col-md-4 mb-3">
                <label>State</label>
                <input type="text" class="form-control" name="state" placeholder="" required="">
              </div>
              <div class="col-md-3 mb-3">
                <label>Zip</label>
                <input type="text" class="form-control" name="zip" placeholder="" required="">
              </div>
            </div>
            <hr class="mb-4">            
            <div class="row">
              <div class="col-md-6 mb-3">
                <label>Name on card</label>
                <input type="text" class="form-control" name="ccname" placeholder="" required="">
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Card Number</label>
                <input type="text" class="form-control" name="ccnumber" placeholder="" required="">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="cc-expiration">Month</label>
                <input type="text" class="form-control" name="ccmonth" placeholder="" required="">
              </div>
              <div class="col-md-4 mb-3">
                <label for="cc-expiration">Year</label>
                <input type="text" class="form-control" name="ccyear" placeholder="" required="">
              </div>
              <div class="col-md-4 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" name="cvvnumber" placeholder="" required="">
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="place_order">Place Order</button>
          </form>
						</div>';
				}else{
					echo "<div><a class='btn btn-info m-5' href='all_login.php'>Login Now</a></div>";
				}
				?>
			</div>
			</div>
			<?php
			}else{
			echo '<div class="my-5 alert alert-danger">
				Card is Empty
				<a href="index.php#books">Add Products To Your Card</a>
			</div>';
			}
			?>
		</div>
	</body>
</html>
<?php include 'footer.php'?>