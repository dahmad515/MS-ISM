<?php
include 'config.php';
// for redirect to home page of the webite
if (isset($_SESSION['id'])){
    echo "<script>
window.location.href = 'index.php';
</script>";
}else if (isset($_SESSION['admin_id'])){
    echo "<script>
window.location.href = 'admin/admin_dashboard.php';
</script>";
}
// if login btn clicked
if (isset($_POST['submit_btn']))
{
    // store form data into the variables
    $email = $_POST['email'];
    $password = $_POST['password'];
    // query for database and running to database
    $loginSQL = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
    $execute = mysqli_query($conn, $loginSQL);
    $row = mysqli_fetch_array($execute);
    // row > 0 =/ Not
    if ($row > 0)
    {
            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['username'];
                echo "<script>
                window.location.href = 'index.php';
                </script>";
    }
    else
    {
        $loginSQL2 = "SELECT * FROM `admins` WHERE `email` = '$email' AND `password` = '$password'";
        $execute2 = mysqli_query($conn, $loginSQL2);
        $row2 = mysqli_fetch_array($execute2);
        if ($row2 > 0)
        {
            session_start();
            $_SESSION['admin_id'] = $row2['id'];
                echo "<script>
                alert('sucess');
                window.location.href = 'admin/admin_dashboard.php';
                </script>";
        }else{
            echo "<script>
                alert('failed');
                </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Shop - Login</title>
    <link rel="icon" href="favicon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
        *{
            font-family: poppins;
        }
        body{
            background: rgba(2, 117, 216, 1);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        
        <a class="navbar-brand" href="index.php"><img src="logo.png" style="width: 40px;"> Book Shop</a>
    </div>
</nav>
<div class="container">
  <div class="row my-5 shadow bg-light d-flex align-items-center">
    <div class="col-md-6 p-5">
      <h1 class="mb-4 text-center">Login Now</h1>
      <form method="POST">
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary form-control mb-2" name="submit_btn">Login >
        </button>
      </form>
      No Account Yet? <a href="register.php">Create you Account</a>
    </div>
    <div class="col-md-6 p-0 pr-0">
        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=628&q=80" style="height: 100%;width: 100%;object-fit: cover;" class="img-fluid">
    </div>
  </div>
</div>

</body>
</html>