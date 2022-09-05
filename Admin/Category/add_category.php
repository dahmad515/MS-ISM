<?php
include '../Product/product_nav.php';
if (isset($_POST['cat_btn'])) {
	$Cat_name = $_POST['Cat_name'];
		//Add Data to database
	$insertSQL = "INSERT INTO `category`(`name`) VALUES ('$Cat_name')";
	$exe = mysqli_query($conn,$insertSQL);
	if ($exe) {
		echo "inserted sucessfully";
	}else{
		echo 'no file';
	}
	
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="row mt-5">
				<div class="col-md-6 offset-md-3 bg-light shadow p-5 mt-5">
					<!--w-- 25 50 75 100 -->
					<form method="post" class="w-100" enctype="multipart/form-data">
					<h2 class="mb-3">Category</h2>
						<div class="mb-3">
							<label>Category Name</label>
							<input type="text" name="Cat_name" required class="form-control">
						</div>
						<button type="submit" name="cat_btn" class="btn btn-primary">Add Category ></button>
						
					</form>
				</div>
				
			</div>
		</div>
		
	</body>
</html>