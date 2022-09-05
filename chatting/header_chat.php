<?php
if (isset($_SESSION['admin_id'])) {
  echo "<script>
          window.location.href = '../admin/admin_dashboard.php';
        </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Book Shop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="../favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style type="text/css">
      *{
        font-family: poppins;
      }
    </style>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        
        <a class="navbar-brand" href="index.php"><img src="../logo.png" style="width: 40px;"> Book Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="all_chats.php">Chats</a>
            </li>
          </ul>
          <div>
            <?php
            $count = 0;
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
            }

            if (isset($_SESSION['name'])) {
            echo '<a href="../cart.php" class="btn btn-info">My Cart( '.$count.' )</a>';
            echo '<a href="../logout.php" class="btn btn-link text-light">logout</a>';
            }else if(isset($_SESSION['admin_id'])){
            echo '<a href="../logout.php" class="btn btn-link text-light">Admin logout</a>';
            echo '<a href="../admin/admin_dashboard.php" class="btn btn-link text-light">Profile</a>';
            }else{
            echo '<a href="../all_login.php" class="btn btn-link text-light">login Now</a>';
            }
            ?>
            <!-- <a href="logout.php" class="btn btn-link text-light">logout</a> -->

          </div>
        </div>
      </div>
    </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>