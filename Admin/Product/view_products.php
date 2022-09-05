<?php include 'product_nav.php';?>
<?php
if(!isset($_GET['catid'])){
	  echo "<script>
          window.location.href = 'select_category.php';
        </script>";
}
?>
<div class="container">
	<div class="row my-5">
		<div class="offset-md-2 col-md-8">
			<table class="table table-dark text-center">
				  <thead>
				    <tr>
				      <th scope="col">Product Name</th>
				      <th scope="col">Actions</th>
				    </tr>
				  </thead>
				  <tbody>
<?php
$catid = $_GET['catid'];
$admin_id = $_SESSION['admin_id'];
$select = "SELECT * FROM `products` Where `Category`='$catid' AND `publisher_id`='$admin_id'";
$exexute = mysqli_query($conn, $select);
while ($row = mysqli_fetch_array($exexute))
{
    echo '
    <tr>
      <td>'.$row['name'].'</td>
      <td>
      <a href="delete_product.php?pro_id='.$row['id'].'" class="btn btn-danger btn-sm">Delete</a>
      <a href="edit_product.php?pro_id='.$row['id'].'" class="btn btn-success btn-sm">Edit</a>
      </td>
    </tr>';
}
?>
  </tbody>
</table>
		</div>
	</div>
</div>