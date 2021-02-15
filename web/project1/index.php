<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$_SESSION['url2'] = $_SERVER['REQUEST_URI']; 

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
      <script src="script.js"></script>
  <body class="bg-secondary">
 <header>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/project1/header.php'; ?>
</header>

      <main>
<div class="py-3 text-center">
      <a href="index.php"><img class="img-fluid" src="../../images/logo.png" alt="Stream Central Logo"></a>
        <h3>Find Something New To Watch</h3>
        <br>
      <h1>Popular Shows</h1>
    </div>      
<div class="album">      
<div class="container">
   <form name="filter" action="" method="get">
           <label for="select"><h4>Filter By Streaming Service</h4></label>
            <select class="form-select" name="service" id="service" onchange="submitform();">
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
  </select><br>  
       <?php
            if (isset ($_SESSION['userid'])){
                echo"
                <div class='d-grid gap-2'>
                <a href='suggestion.php' class='btn btn-dark me-2' role='button'>Suggest New Content</a>
                </div>";
            }
       ?>
  
    
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
                echo "<div class='col'> <div class='card'>
            <a href='programdetails.php?id=$id'><img class='card-img-top img-fluid' src='$image' alt='$name'></a>
          </div>
        </div>";
            }
        ?>
</div><br><br>
      </div>
      </div>
      </main>
  </body>
</html>