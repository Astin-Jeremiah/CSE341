<?php
session_start();

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Listing</title>

      <link href="../../bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  </head>
  <body class="bg-light">
    
<header>
    <div class="container text-end">
      <a href="cart.php">
        <i class="bi bi-cart2" style="font-size: 35px; color: black;" id="cart"></i>
      </a>
  </div>
</header>
          
<main>

      <div class="py-3 text-center">
      <img class="img-fluid" src="../../images/pop.png" alt="Pop Culture Vinyl Logo">
        <br>
      <h1>Available Items</h1>
    </div>

  <div class="album">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm pt-1">
              <h4 class="card-title text-center">Stitch Funko Pop</h4>
            <img class="img-fluid" src="../../images/st.jpg" alt="Stitch Funko Pop">
            <div class="card-body">
              <p class="card-text text-center">Experiment 626<br>
                  <small class="fw-bold">$13.99</small></p>
              <div class="text-center">
                  <form action="" method="post">
                  <input type="hidden" name="item" value="Stitch Funko Pop">
                  <input type="submit" class="btn btn-sm btn-outline-danger" value="Add To Cart">
                  </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm pt-1">
              <h4 class="card-title text-center">Bill Nye Funko Pop</h4>
            <img class="img-fluid" src="../../images/bill.jpg" alt="Bill Nye Funko Pop">
            <div class="card-body">
              <p class="card-text text-center">Science Rules<br>
                  <small class="fw-bold">$9.99</small></p>
              <div class="text-center">
                  <form action="" method="post">
                  <input type="hidden" name="item" value="Bill Nye Funko Pop">
                  <input type="submit" class="btn btn-sm btn-outline-danger" value="Add To Cart">
                  </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm pt-1">
              <h4 class="card-title text-center">Forky Funko Pop</h4>
            <img class="img-fluid" src="../../images/fork.jpg" alt="Forky Funko Pop">
            <div class="card-body">
              <p class="card-text text-center">"I am not a toy!"<br>
                  <small class="fw-bold">$15.99</small></p>
              <div class="text-center">
                  <form action="" method="post">
                  <input type="hidden" name="item" value="Forky Funko Pop">
                  <input type="submit" class="btn btn-sm btn-outline-danger" value="Add To Cart">
                  </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm pt-1">
              <h4 class="card-title text-center">Winifred Sanderson Funko Pop</h4>
            <img class="img-fluid" src="../../images/jp2.jpg" alt="Winifred Funko Pop">
            <div class="card-body">
              <p class="card-text text-center">"I'll put a spell on you!"<br>
                  <small class="fw-bold">$16.99</small></p>
              <div class="text-center">
                  <form action="" method="post">
                  <input type="hidden" name="item" value="Winifred Sanderson Funko Pop">
                  <input type="submit" class="btn btn-sm btn-outline-danger" value="Add To Cart">
                  </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm pt-1">
              <h4 class="card-title text-center">Mary Sanderson Funko Pop</h4>
            <img class="img-fluid" src="../../images/hp1.jpg" alt="Mary Funko Pop">
            <div class="card-body">
              <p class="card-text text-center">"It reeks of children!"<br>
                  <small class="fw-bold">$13.99</small></p>
              <div class="text-center">
                  <form action="" method="post">
                  <input type="hidden" name="item" value="Mary Sanderson Funko Pop">
                  <input type="submit" class="btn btn-sm btn-outline-danger" value="Add To Cart">
                  </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm pt-1">
              <h4 class="card-title text-center">Sarah Sanderson Funko Pop</h4>
            <img class="img-fluid" src="../../images/hp3.jpg" alt="Sarah Funko Pop">
            <div class="card-body">
              <p class="card-text text-center">"Dead man’s toe! Dead man’s toe!"<br>
                  <small class="fw-bold">$13.99</small></p>
              <div class="text-center">
                  <form action="" method="post">
                  <input type="hidden" name="item" value="Sarah Sanderson Funko Pop">
                  <input type="submit" class="btn btn-sm btn-outline-danger" value="Add To Cart">
                  </form>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm pt-1">
              <h4 class="card-title text-center">Frozone Funko Pop</h4>
            <img class="img-fluid" src="../../images/fro.jpg" alt="Frozone Funko Pop">
            <div class="card-body">
              <p class="card-text text-center">"Woman Where Is My Super Suit!"<br>
                  <small class="fw-bold">$7.99</small></p>
              <div class="text-center">
                  <form action="" method="post">
                  <input type="hidden" name="item" value="Frozone Funko Pop">
                  <input type="submit" class="btn btn-sm btn-outline-danger" value="Add To Cart">
                  </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm pt-1">
            <h4 class="card-title text-center">Jim Henson Funko Pop</h4>
            <img class="img-fluid" src="../../images/jh.jpg" alt="Jim Henson Funko Pop">
            <div class="card-body">
              <p class="card-text text-center">"It's not easy being green"<br>
                  <small class="fw-bold">$17.99</small></p>
              <div class="text-center">
                  <form action="" method="post">
                  <input type="hidden" name="item" value="Jim Henson Funko Pop">
                  <input type="submit" class="btn btn-sm btn-outline-danger" value="Add To Cart">
                  </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm pt-1">
              <h4 class="card-title text-center">Little Green Alien Funko Pop</h4>
            <img class="img-fluid" src="../../images/al.jpg" alt="Alien Funko Pop">
            <div class="card-body">
              <p class="card-text text-center">"The Claw Is Our Master!"<br>
                  <small class="fw-bold">$8.99</small></p>
              <div class="text-center">
                  <form action="" method="post">
                  <input type="hidden" name="item" value="Little Green Alien Funko Pop">
                  <input type="submit" class="btn btn-sm btn-outline-danger" value="Add To Cart">
                  </form>
              </div>
            </div>
          </div>
          </div>
    </div>
  </div>
    </div>
    <div class="text-center m-3">
          <form action="" method="post">
              <button type="submit" class="btn btn-outline-danger btn-lgy" name="destroy" value="true">Clear Cart</button>
              <a class="btn btn-outline-danger btn-lgy" href="cart.php" role="button">View Cart</a>
          </form>
          </div>      
          <?php
          if (isset($_POST["destroy"])){
              session_destroy();
          }

          ?>
      </div>
    <?php 
if(isset($_POST['item']))
{
    array_push($_SESSION['cart'], $_POST['item']);
}

?>
</main>  
  </body>
</html>
