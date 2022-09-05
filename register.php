<?php
include 'config.php';
if (isset($_POST['user_register'])) {
	$u_username = $_POST['u_username'];
	$u_email = $_POST['u_email'];
	$u_password = $_POST['u_password'];
	$sql = "INSERT INTO `users`(`username`, `email`, `password`) VALUES ('$u_username', '$u_email', '$u_password')";
	$execute = mysqli_query($conn, $sql);
	if ($execute) {
		echo "user registered";
	}else{
    echo "not registered";
	}
}
if (isset($_POST['publisher_register'])) {
  $p_username = $_POST['p_username'];
  $p_email = $_POST['p_email'];
  $p_password = $_POST['p_password'];
  $sql = "INSERT INTO `admins`(`username`, `email`, `password`) VALUES ('$p_username', '$p_email', '$p_password')";
  $execute = mysqli_query($conn, $sql);
  if ($execute) {
    echo "admin registered";
  }else{
    echo "admin not registered";
  }
}
require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Shop - Register</title>
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
  <div class="row my-5 d-flex align-items-center">
    <div class="col-md-6 p-5 shadow bg-light">
      <h2 class="mb-4 text-center">User Register</h2>
      <form method="POST">
      	<div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="u_username" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="u_email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="u_password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary form-control mb-2" name="user_register">Register >
        </button>
      </form>
      Already Register <a href="all_login.php">Login Now</a>
    </div>

    <div class="col-md-6 p-5 shadow bg-light">
      <h2 class="mb-4 text-center">Publisher Register</h2>
      <form method="POST">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="p_username" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="p_email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="p_password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary form-control mb-2" name="publisher_register">Register >
        </button>
      </form>
      Already Register <a href="all_login.php">Login Now</a>
    </div>
  </div>
</div>
</body>
</html>
<?php include 'footer.php'?>