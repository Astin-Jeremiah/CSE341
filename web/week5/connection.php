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
    
<div class="container">
  <h1>Content</h1>
    
    <ul>
        <?php
            foreach ($content as $con)
            {
                $image = $con['picture'];
                $name = $con['name'];
                echo "<li><img src='$image' alt='$name'></li>";
            }
        ?>
    </ul>


</div>

  </body>
</html>