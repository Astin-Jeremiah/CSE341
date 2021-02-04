<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

if (!issset($_GET['scripture_id']))
{
    die("Error, ID not specified");
}

$sid = htmlspecialchars($_GET['scripture_id']);

$db = get_db();

$stmt = $db->prepare('SELECT * FROM scripture WHERE id = :id');
$stmt->bindValue(':id', $sid, PDO::PARAM_INT);
$stmt->execute();
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scripture Details</title>
  </head>
  <body class="bg-light">
    
<div class="container">
  <h1>Scripture Details</h1>
    
    <?php
            foreach ($details as $detail)
            {
                $book = $detail['book'];
                $chapter = $detail['chapter'];
                $verse = $detail['verse'];
                $content = $detail['content'];
                echo "<p><b>$book&nbsp;$chapter:$verse</b> - \"$content\"</p>";
            }
        ?>
    
     
</div>

  </body>
</html>