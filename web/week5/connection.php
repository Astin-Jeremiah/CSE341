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
    <title>Connection Test</title>

      <link href="../../bootstrap.min.css" rel="stylesheet">
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
 
<div class="album">      
<div class="container">
    
  <h1>Content</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4 row-cols-md-5 g-3">
        <?php
            foreach ($content as $con)
            {
                $id = $con['id'];
                $sid = con['service_id'];
                $image = $con['picture'];
                $name = $con['content_name'];
                echo "<div class='col'> <div class='card shadow-sm text-center'>
            <a href='contentdetails.php?id=$id'><img class='img-fluid' src='$image' alt='$name'></a>
          </div>
        </div>";
            }
        ?>
</div>
      </div>
      </div>

  </body>
</html>