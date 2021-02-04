<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$query = 'SELECT content.content_name, content.picture FROM content ORDER BY content.content_name ASC';
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
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
            foreach ($content as $con)
            {
                $image = $con['picture'];
                $name = $con['content_name'];
                echo "<div class='col'> <div class='card shadow-sm pt-1'>
            <img class='img-fluid' src='$image' alt='$name'>
          </div>
        </div>";
            }
        ?>
</div>
      </div>
      </div>

  </body>
</html>