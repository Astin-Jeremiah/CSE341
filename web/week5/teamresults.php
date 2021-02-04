<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$book1 = htmlspecialchars($_POST["book"]);



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
            echo $book1;
        ?>

</div>

  </body>
</html>