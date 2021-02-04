<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

if (!issset($_GET['course_id']))
{
    die("Error, ID not specified");
}

$sid = htmlspecialchars($_GET['scripture_id']);

$db = get_db();
$query = 'SELECT * FROM scripture WHERE id = \''.$sid.'\'';
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $sid, PDO::PARAM_INT);
$stmt->execute();
$scripture = $stmt->fetchAll(PDO::FETCH_ASSOC);



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
            foreach ($scripture as $script)
            {
                $book = $script['book'];
                $chapter = $script['chapter'];
                $verse = $script['verse'];
                $content = $script['content'];
                echo "<p><b>$book&nbsp;$chapter:$verse</b> - \"$content\"</p>";
            }
        ?>
    
     
</div>

  </body>
</html>