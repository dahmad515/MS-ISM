<?php
include 'config.php';
if(isset($_GET['selectData'])){
        $catid = $_GET['catid'];
        // echo $catid;
        // $checkadmin = ''
        $select = "SELECT * FROM `products` WHERE `category` = '$catid'";
  $exexute = mysqli_query($conn,$select);
  while($row = mysqli_fetch_array($exexute)){
    echo '
        <div class="col-sm col-md-4 mt-3">
        <form action="manage_cart.php" method="post">
          <div class="card text-center">
            <div class="card-header p-0"><a href="single_product.php?pro_id='.$row['id'].'&Pub_id='.$row['publisher_id'].'"><img src=img/'.$row['img_src'].' class="img-fluid card-image"></div>
            <div class="card-body"><p>'.$row['name'].' - $'.$row['price'].'</p></a>
        <input type="number" name="quantity" min="1" class="mb-2 form-control" value="1">
           <button name="cart_btn" type="submit" class="btn btn-info">Add To Cart</button>
        <input type="hidden" name="product_id" value="'.$row['id'].'">
        <input type="hidden" name="Item_Name" value="'.$row['name'].'">
        <input type="hidden" name="img_src" value="'.$row['img_src'].'">
        <input type="hidden" name="price" value="'.$row['price'].'">
        </div>
          </div>
      </form>
        </div>';
  }
      }

?>