<?php
include 'config.php';
// session_start();

if (isset($_POST['place_order'])) {
	// user details
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	// card details
	$name = $_POST['ccname'];
	$ccnumber = $_POST['ccnumber'];
	$ccmonth = $_POST['ccmonth'];
	$ccyear = $_POST['ccyear'];
	$cvvnumber = $_POST['cvvnumber'];
		$User_id = $_SESSION['id'];
		$auto_gene_order_id = 0;
		$sql = "INSERT INTO `orders_manager`(`User_id`, `status`) VALUES ('$User_id','pending')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			// $select = "SELECT `Order_id` FROM `orders_manager` ORDER BY `Order_id` DESC LIMIT 1";
			// $exexute = mysqli_query($conn,$select);
			// $row = mysqli_fetch_array($exexute);
			// $auto_gene_order_id = $row[0];
  		$auto_gene_order_id = mysqli_insert_id($conn);
  		// for inserting credit card data in database
  		$cardSql = "INSERT INTO `credit_card`(`order_id`, `email`, `phone`, `address`, `country`, `state`, `zip`, `name`, `card_no`, `month`, `year`, `Cvv`) VALUES ('$auto_gene_order_id','$email','$phone','$address','$country','$state','$zip','$name','$ccnumber','$ccmonth','$ccyear','$cvvnumber')";
			$resultcard = mysqli_query($conn, $cardSql);
			if ($resultcard) {
		foreach ($_SESSION['cart'] as $key => $value) {
			$quantity = $value['quantity'];
			$product_id = $value['product_id'];
			echo $auto_gene_order_id;
			$sql2 = "INSERT INTO `orders`(`Order_id`, `product_id`, `quantity`) VALUES ('$auto_gene_order_id','$product_id', '$quantity')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {				
				unset($_SESSION['cart']);
	 			echo "<script>
					alert('Order Placed Success');
					window.location.href = 'cart.php';
				</script>";
			}else{
				echo "string"; 
			}
		}
	}
}
}
?>