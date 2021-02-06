<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$serid = htmlspecialchars($_GET['service']);

if ($serid == 1) {
  $query =  'SELECT * FROM content WHERE service_id = 1 ORDER BY content_name ASC';
} elseif ($serid == 2) {
  $query =  'SELECT * FROM content WHERE service_id = 2 ORDER BY content_name ASC';
} elseif ($serid == 3) {
  $query =  'SELECT * FROM content WHERE service_id = 3 ORDER BY content_name ASC';
} elseif ($serid == 4) {
  $query =  'SELECT * FROM content WHERE service_id = 4 ORDER BY content_name ASC';
} elseif ($serid == 5) {
  $query =  'SELECT * FROM content WHERE service_id = 5 ORDER BY content_name ASC';
} elseif ($serid == 6) {
  $query =  'SELECT * FROM content WHERE service_id = 6 ORDER BY content_name ASC';
} elseif ($serid == 7) {
  $query =  'SELECT * FROM content WHERE service_id = 7 ORDER BY content_name ASC';
} elseif ($serid == 8) {
  $query =  'SELECT * FROM content WHERE service_id = 8 ORDER BY content_name ASC';
} elseif ($serid == 9) {
  $query =  'SELECT * FROM content WHERE service_id = 9 ORDER BY content_name ASC';
} elseif ($serid == 10) {
  $query =  'SELECT * FROM content WHERE service_id = 10 ORDER BY content_name ASC';
} elseif ($serid == 11) {
  $query =  'SELECT * FROM content WHERE service_id = 11 ORDER BY content_name ASC';
} else {
  $query =  'SELECT * FROM content ORDER BY content_name ASC';
}


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
      <script>
          function submitform(){
            document.filter.submit();
          }
      </script>
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
   <form name="filter" action="" method="get">
            <select lass="form-select" aria-label="Default select example" name="service" id="service" onchange="submitform();">
      <option selected>Filter By Streaming Service</option>
      <option value='0'<?php if($_GET['service'] == 0) {
                    echo "selected=selected";
                } ?>>All</option>
      <?php
            foreach ($serv as $service)
            {
                $id2 = $service['id'];
                $servicename = $service['service_name'];
                echo "<option value='$id2'";
                if($_GET['service'] == $id2) {
                    echo "selected=selected";
                }
                echo ">$servicename</option>";
            }
        ?>
  </select>  
</form>
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