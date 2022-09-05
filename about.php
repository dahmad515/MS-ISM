<?php
include 'config.php';
include 'header.php';
?>


    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">About Us</h1>
          <p class="lead text-muted">This book covers a wide array of topics on the subject Urban Horticulture and constitutes a valuable reference guide for students, professors, researchers, builders,  and horticulturists concerned with urban horticulture, city planning, biodiversity, and the sustainable development of horticultural resources.</p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php
            $fetchSQL = "SELECT * FROM `category`";
    $execute = mysqli_query($conn,$fetchSQL);
    $size_img = 300;
    while ($row = mysqli_fetch_array($execute)) {
      $size_img+=1;
      echo '<div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="https://source.unsplash.com/random/'.$size_img.'x'.$size_img.'/?books">
                <div class="card-body">
                  <p class="card-text">'.$row['name'].'</p>
                </div>
              </div>
            </div>';
    }
            ?>
            
          </div>

        </div>
      </div>

    </main>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  </html>
<?php include 'footer.php'?>