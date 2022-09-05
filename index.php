<?php
include 'config.php';
if (isset($_SESSION['admin_id'])) {
  echo "<script>
          window.location.href = 'admin/admin_dashboard.php';
        </script>";
}
// include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Shop</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<style>
.card img{
	width: 100%;
	height: 300px!important;
	object-fit: contain;
}
.carousel-caption{
  background: #fff;
}
.carousel-item img{
    width: 100px;
    height: 80vh;
    object-fit: cover;
    object-position: center;
}
.card{
	box-shadow: 0 0 15px rgba(0,0,0,0.2);
}
.card-header, .card-footer{
	border:none!important;
}
.list-group li.hovered{
    cursor: pointer;
}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="background: rgba(0,0,0,0.5)!important;">
      <div class="container">
        
        <a class="navbar-brand" href="index.php"><img src="logo.png" style="width: 40px;"> Book Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <?php 
            if (!isset($_SESSION['name'])) {
              echo '<li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>';
            }else{
              echo'
            <li class="nav-item">
              <a class="nav-link" href="chatting/all_chats.php">Chats</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_orders.php">Orders</a>
            </li>';
            }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
          <div>
            <?php
            $count = 0;
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
            }

            echo '<a href="cart.php" class="btn btn-info">My Cart( '.$count.' )</a>';
            if (isset($_SESSION['name'])) {
            echo '<a href="logout.php" class="btn btn-link text-light">logout</a>';
            }else if(isset($_SESSION['admin_id'])){
            echo '<a href="logout.php" class="btn btn-link text-light">Admin logout</a>';
            echo '<a href="admin/admin_dashboard.php" class="btn btn-link text-light">Admin Section</a>';
            }else{
            echo '<a href="all_login.php" class="btn btn-link text-light">login Now</a>';
            }
            ?>
          </div>
        </div>
      </div>
    </nav>
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2019/12/18/13/56/glasses-4704055_960_720.jpg" alt="First slide">
      <div class="carousel-caption text-dark">
    <h2>So many books, so little time.</h2>
    <p>Frank Zappa</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2019/05/14/21/50/storytelling-4203628_960_720.jpg" alt="First slide">
      <div class="carousel-caption text-dark">
    <h2>There is no friend as loyal as a book.</h2>
    <p>Ernest Hemingway</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2016/09/10/17/18/book-1659717_960_720.jpg" alt="First slide">
      <div class="carousel-caption text-dark">
    <h2>Classic′ - a book which people praise and don't read.</h2>
    <p>Mark Twain</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2016/01/27/04/32/books-1163695_960_720.jpg" alt="First slide">
      <div class="carousel-caption text-dark">
    <h2>Never trust anyone who has not brought a book with them.</h2>
    <p>Lemony Snicket</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container my-5" id="books">
	<!-- <h4 class="mt-3">Categories</h4> -->
            <div class="row">
                <div class="col-md-3  mt-3">
                    <ul class="list-group">
  <li class="list-group-item active">Categories</li>
	<?php
		$fetchSQL = "SELECT * FROM `category`";
		$execute = mysqli_query($conn,$fetchSQL);
		while ($row = mysqli_fetch_array($execute)) {
	// echo '<button type="button" class="btn btn-info btn-sm ml-1 mb-1" onclick="filter('.$row['id'].')">'.$row['name'].'</button>';
  echo '<li class="list-group-item list-group-item-action hovered" onclick="filter('.$row['id'].')">'.$row['name'].'</li>';
}
			?>
</ul>
                </div>
                <div class="col-md-9">
                    
	<div class="row" id="product_div">

<?php
	$select = "SELECT * FROM `products`";
	$exexute = mysqli_query($conn,$select);
	while($row = mysqli_fetch_array($exexute)){
		echo '
				<div class="col-md-4 mt-3">
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
?>
	</div>
</div>
                </div>
            </div>
<?php include 'footer.php'?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">
	let product_div = document.getElementById('product_div');
function filter(catid_no){
	let xhr=new XMLHttpRequest();
    xhr.open('GET',`filter_product.php?selectData&catid=${catid_no}`,true);
    xhr.onreadystatechange=function(){
        if(this.readyState ==4 && this.status == 200){
        	product_div.innerHTML = this.responseText;
   		}
    }
    xhr.send();
}
</script>
</body>
</html>