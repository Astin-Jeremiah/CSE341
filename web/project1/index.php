<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$query = 'SELECT * FROM content ORDER BY content_name ASC';
$stmt = $db->prepare($query);
$stmt->execute();
$content = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stream Central</title>

      <link href="../../bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link href="style.css" rel="stylesheet">
  </head>
  <body class="bg-secondary">
 <header>
    <div class="container text-end">
      <a href="cart.php">
        <i class="bi bi-cart2" id="cart"></i>
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
    
  <h1>Content</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 row-cols-md-5 g-3">
        <?php
            foreach ($content as $con)
            {
                $id = $con['id'];
                $image = $con['picture'];
                $name = $con['content_name'];
                echo "<div class='col'> <div class='card shadow-sm bg-secondary text-center'>
            <a href='contentdetails.php?id=$id'><img class='img-fluid card-img-top' src='$image' alt='$name'></a>
          </div>
        </div>";
            }
        ?>
</div>
      </div>
      </div>
      </main>
  </body>
</html>