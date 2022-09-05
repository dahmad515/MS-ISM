<?php
include '../Product/product_nav.php';
if (!isset($_GET['catid'])) {
	echo "
<script>
window.location.href = 'view_c.php';
</script>
";
}
$id = $_GET['catid'];
if (isset($_POST['cat_btn'])) {
	$Cat_name = $_POST['Cat_name'];
		//updating the database
		$sql = "UPDATE `category` SET `name`='$Cat_name' WHERE id='$id'";
	    if(mysqli_query($conn,$sql)){
	      echo "Inserted Sucessfully With Image Upload";
	    }else{
	      echo 'not inserted but image uploaded';
	    }
}
?>
<!-- for view category from databse -->
<?php
$fetchSQL = "SELECT * FROM `category` Where id='$id'";
$execute = mysqli_query($conn,$fetchSQL);
$row = mysqli_fetch_array($execute);

?>
<div class="container mt-5">
			<div class="row mt-5">
				<div class="col-md-6 offset-md-3 shadow p-5 mt-5" style="background: rgba(255,255,255,0.7)">
					<!--w-- 25 50 75 100 -->
					<form method="post" class="w-100" enctype="multipart/form-data">
					<h2 class="mb-3 text-center">Update Category</h2>
						<div class="mb-3">
							<label>Category Name</label>
							<input type="text" value="<?php echo $row['name']; ?>" name="Cat_name" class="form-control" required>
						</div>

						<button type="submit" name="cat_btn" class="btn btn-primary">Update Category Data ></button>
						
					</form>
				</div>
				
			</div>
		</div>