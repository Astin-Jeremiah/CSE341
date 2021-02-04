<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$query = 'SELECT * FROM public.scripture';
$stmt = $db->prepare($query);
$stmt->execute();
$scripture = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Week 5 Team Activity</title>

      <link href="../../bootstrap.min.css" rel="stylesheet">
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <h1>Scripture References</h1>

        <?php
            foreach ($scripture as $script)
            {
                $book = $script['book'];
                $chapter = $script['chapter'];
                $verse = $script['verse'];
                $content = $script['content'];
                echo "<p><b>$book&nbsp;$chapter:$verse - \"$content\"</b></p>";
            }
        ?>

</div>

  </body>
</html>