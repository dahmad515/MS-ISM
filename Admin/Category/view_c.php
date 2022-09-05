<?php
include '../Product/product_nav.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="offset-md-2 col-md-8 mt-4">
			<div class="card">
		  <div class="card-header text-center text-bold p-3 bg-primary text-light">
		    Categories
		  </div>
  
		<?php
		$fetchSQL = "SELECT * FROM `category`";
		$execute = mysqli_query($conn,$fetchSQL);
		while ($row = mysqli_fetch_array($execute)) {
			echo '
			  		  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="border:none;display: flex;justify-content: space-between;align-items: center;">
    <a class="btn text-dark">'.$row['name'].'</a>
    <div>
    <a class="btn btn-danger" href="del_c.php?catid='.$row['id'].'">DEL</a>
    <a class="btn btn-info" href="edit_c.php?catid='.$row['id'].'">Edit</a>
    </div>
    </li>
  </ul>
			';
		}
		?>
</div>
		</div>
	</div>
</div>
</body>
</html>