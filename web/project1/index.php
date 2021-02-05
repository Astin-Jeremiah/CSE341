<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$test = "WHERE service_id = 3";
$query = 'SELECT * FROM content \''.$test.'\'';
$stmt = $db->prepare($query);
$stmt->execute();
$content = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query2 = 'SELECT * FROM service';
$stmt2 = $db->prepare($query2);
$stmt2->execute();
$serv = $stmt2->fetchAll(PDO::FETCH_ASSOC);
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
      <a href="#">
        <i class="bi bi-person-circle" id="login"></i>
      </a>
  </div>
</header>

      <main>
<div class="py-3 text-center">
      <img class="img-fluid" src="../../images/logo.png" alt="Stream Central Logo">
        <h3>Find Something New To Watch</h3>
        <br>
      <h1>Popular Shows</h1>
    </div>      
<div class="album">      
<div class="container">
  <label for="cars">Filter By Streaming Service:</label>
  <select name="service" id="service">
      <option value=''>All</option>
      <?php
            foreach ($serv as $service)
            {
                $id2 = $service['id'];
                $servicename = $service['service_name'];
                echo "<option value='$id'>$servicename</option>";
            }
        ?>
  </select>
  <button onclick="fil()">Submit</button>
<br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 g-3">
        <?php
            foreach ($content as $con)
            {
                $id = $con['id'];
                $image = $con['picture'];
                $name = $con['content_name'];
                $sn = $con['service_id'];
                echo "<div class='col'> <div class='card shadow-sm bg-secondary text-center'>
            <a href='programdetails.php?id=$id'><img class='img-fluid card-img-top' src='$image' alt='$name'></a>
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