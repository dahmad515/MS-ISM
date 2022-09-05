<?php
include 'product_nav.php';
if (!isset($_GET['catid'])) {
  echo "<script>
          window.location.href = 'select_category.php';
        </script>";
}
if (isset($_POST['submit_btn'])) {
    $publisher_id = $_SESSION['admin_id'];
    $catid = $_GET['catid'];
    $pro_name = $_POST['pro_name'];
    $pro_price = $_POST['pro_price'];
    $pro_desc = $_POST['pro_desc'];
    $fname = time().'.jpg';
    // file uploading
    $filename = $_FILES['pro_img']['name'];
    $tmploc = $_FILES['pro_img']['tmp_name'];
    $ploc = '../../img/'.$fname;
    if(move_uploaded_file($tmploc, $ploc)){
    // insert to database SQL
    $sql = "INSERT INTO `products`(`name`, `img_src`, `price`, `publisher_id`, `Description`,`Category`) VALUES ('$pro_name','$fname','$pro_price','$publisher_id', '$pro_desc', '$catid')";
    if(mysqli_query($conn,$sql)){
      echo "Inserted Sucessfully With Image UPload";
    }else{
      echo 'not inserted but image uploaded';
    }
    }else{
        echo "File Not Updaded";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        *{
            font-family: poppins;
        }
        body{
            background: rgba(2, 117, 216,1);
        }
    </style>
</head>
<body>

<div class="container">
  <div class="row my-5 shadow bg-light d-flex align-items-center">
    <div class="col-md-6 p-5">
      <h1 class="mb-4 text-center">Add Book</h1>
      <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label>Product Name</label>
          <input type="text" class="form-control" required="required" name="pro_name" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
          <label>Product Image</label>
          <input type="file" class="form-control" required="required" name="pro_img">
        </div>
        <div class="form-group">
          <label>Price</label>
          <input type="text" class="form-control" required="required" name="pro_price"  placeholder="Enter Price">
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" required="required" name="pro_desc"  placeholder="Enter Description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary form-control mb-2" name="submit_btn">Add Book >
        </button>
      </form>
    </div>
    <div class="col-md-6 p-0 pr-0">
        <img src="https://images.unsplash.com/photo-1505773278895-5efa7b11679a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=622&q=80" style="height: 100%;width: 100%;object-fit: cover;" class="img-fluid">
    </div>
  </div>
</div>

</body>
</html>