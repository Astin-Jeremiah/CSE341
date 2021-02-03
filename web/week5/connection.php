<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$query = 'SELECT public.content.content_name, public.content.description FROM public.content';
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
                $name = $con['content_name'];
                $des = $con['content_descirption'];
                echo "<li><p>$name&emsp;$des</p></li>";
            }
        ?>
        <li></li>
    </ul>

</div>

  </body>
</html>