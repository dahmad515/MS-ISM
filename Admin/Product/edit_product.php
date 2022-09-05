<?php include 'product_nav.php';?>
<?php
if (!isset($_GET['pro_id']))
{
echo "
<script>
window.location.href = 'view_products.php';
</script>
";
}
$id=$_GET['pro_id'];
?>
<!-- getting product data from database -->
<?php
$fetchSQL = "SELECT * FROM `products` Where id='$id'";
$execute2 = mysqli_query($conn,$fetchSQL);
$row2 = mysqli_fetch_array($execute2);
?>
<?php
if (isset($_POST['submit_btn'])) {
$pro_name = $_POST['pro_name'];
$pro_price = $_POST['pro_price'];
$pro_Category = $_POST['pro_Category'];
$pro_desc = $_POST['pro_desc'];
// file uploading
$filename = $_FILES['pro_img']['name'];
if ($filename) {
// if file is selected
$fname = time().'.jpg';
  $tmploc = $_FILES['pro_img']['tmp_name'];
$ploc = '../../img/'.$fname;
if(move_uploaded_file($tmploc, $ploc)){
$imgSRC = "../../img/".$row2['img_src'];
if (unlink($imgSRC)){
// insert to database SQL
$sql = "UPDATE `products` SET `name`='$pro_name',`img_src`='$fname',`price`='$pro_price',`Description`='$pro_desc',`Category`='$pro_Category' WHERE id='$id'";
if(mysqli_query($conn,$sql)){
echo "Updated Sucessfully";
}else{
echo 'Not Updated';
}
}
}
}else{
  // if file is not selected
  // insert to database SQL
$sql = "UPDATE `products` SET `name`='$pro_name',`price`='$pro_price',`Description`='$pro_desc',`Category`='$pro_Category' WHERE id='$id'";
if(mysqli_query($conn,$sql)){
echo "Updated Sucessfully";
}else{
echo 'Not Updated';
}
}
// $tmploc = $_FILES['pro_img']['tmp_name'];
// $ploc = '../../img/'.$fname;
// if(move_uploaded_file($tmploc, $ploc)){
// // insert to database SQL
// $sql = "UPDATE `products` SET `name`='$pro_code',`Note`='$Note',`Ingredients`='$Ingredients',`Allergens`='$Allergens',`CreamType`='$CreamType' WHERE id='$id'";
// if(mysqli_query($conn,$sql)){
//   echo "Updated Sucessfully";
// }else{
//   echo 'Not Updated';
// }
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
          <h1 class="mb-4 text-center">Update Book</h1>
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" value="<?php echo $row2['name'];?>" class="form-control" required="required" name="pro_name" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
              <label>Product Image</label>
              <input type="file" class="form-control" class="w-50" name="pro_img">
              <img src="../../img/<?php echo $row2['img_src'];?>" class="w-25">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" value="<?php echo $row2['price'];?>" class="form-control" required="required" name="pro_price"  placeholder="Enter Price">
            </div>
            <div class="form-group">
              <label>Preference</label>
              <select name="pro_Category" class="form-control">
                <?php
                $fetchSQL = "SELECT * FROM `category`";
                $execute = mysqli_query($conn,$fetchSQL);
              while ($row4 = mysqli_fetch_array($execute)) {
                $catid_fetched = $row4['id'];
                echo $catid_fetched;
                if($catid_fetched == $row2['Category']){
                echo '<option selected value="'.$row4['id'].'">'.$row4['name'].'</option>';
                }else{
                echo '<option value="'.$row4['id'].'">'.$row4['name'].'</option>';
                }
              }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea type="text"class="form-control" required="required" name="pro_desc"  placeholder="Enter Description"><?php echo $row2['Description'];?></textarea>
            </div>
            <button type="submit" class="btn btn-primary form-control mb-2" name="submit_btn">Update >
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