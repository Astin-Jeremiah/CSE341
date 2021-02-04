<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$book1 = htmlspecialchars($_POST["book"]);

$db = get_db();
$query = 'SELECT * FROM scripture WHERE book = \''.$book1.'\'';
$stmt = $db->prepare($query);
$stmt->execute();
$scripture = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Results</title>
  </head>
  <body class="bg-light">
    
<div class="container">
  <h1>Scripture Results</h1>
    
     <?php
            foreach ($scripture as $script)
            {
                $book = $script['book'];
                $chapter = $script['chapter'];
                $verse = $script['verse'];
                echo "<p><a href="details.php">$book&nbsp;$chapter:$verse</a></p>";
            }
        ?>
</div>

  </body>
</html>