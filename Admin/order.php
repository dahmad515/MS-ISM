<?php include 'admin_nav.php'; ?>
<?php
if (isset($_GET['status']) && isset($_GET['id'])) {
	$status = $_GET['status'];
	$id = $_GET['id'];
	$updateSQL = "UPDATE `orders_manager` SET `status`='$status' WHERE Order_id = '$id'";
	$result = mysqli_query($conn,$updateSQL);
	if($result){
		echo "<script>
          window.location.href = 'order.php';
        </script>";
	}else{
		echo "Failed";
	}
}else{
		// header("location:order.php");

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
				      <th scope="col">User</th>
				      <th scope="col">Actions</th>
				      <th scope="col">Order Products</th>
				    </tr>
				  </thead>
				  <tbody>
<?php
$select = "SELECT * FROM `orders_manager`";
$exexute = mysqli_query($conn, $select);
$srno = 0;
while ($row = mysqli_fetch_array($exexute))
{
  $srno+=1;
    echo '
    <tr>
      <td>'.$srno.'</td>
      <td>';
      $user_Id = $row[1];
      $sql_user = "SELECT * FROM `users` WHERE id = '$user_Id'";
	  $exexute2 = mysqli_query($conn, $sql_user);
      $row2 = mysqli_fetch_array($exexute2);
      echo $row2[1];
      echo '</td>
     	<td>
      ';
      	if($row[2]=="pending"){
      		echo '
      		<form>
<div class="form-check form-check-inline">
<input class="form-check-input" checked type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1"><a href="order.php?status=pending&id='.$row[0].'"><b>Pending</b></a></label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1"><a href="order.php?status=confirm&id='.$row[0].'">Confirm</a></label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1"><a href="order.php?status=delivered&id='.$row[0].'">Delivered</a></label>
</div>
      		</form>
      		';
      	}elseif($row[2]=="confirm"){
      		echo '
      		<form>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1"><a href="order.php?status=pending&id='.$row[0].'">Pending</a></label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" checked type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1"><a href="order.php?status=confirm&id='.$row[0].'"><b>Confirm</b></a></label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1"><a href="order.php?status=delivered&id='.$row[0].'">Delivered</a></label>
</div>
      		</form>
      		';
      	}elseif($row[2]=="delivered"){
      		echo '
      		<form>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1"><a href="order.php?status=pending&id='.$row[0].'">Pending</a></label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1"><a href="order.php?status=confirm&id='.$row[0].'">Confirm</a></label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" checked type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
<label class="form-check-label" for="inlineRadio1"><a href="order.php?status=delivered&id='.$row[0].'"><b>Delivered</b></a></label>
</div>
      		</form>
      		';
      	}
      echo'</td>
      <td>';
      echo '<a class="btn btn-info btn-sm" href="order_products.php?order='.$row['Order_id'].'">View Products</a>';
      echo '<a class="btn btn-info btn-sm ml-2" href="shipping_details.php?order='.$row['Order_id'].'">Shipping</a>';
      echo'</td>
    </tr>';
}
?>
  </tbody>
</table>
		</div>
	</div>
</div>