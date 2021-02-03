<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$query = 'SELECT public.content.content_name, public.content.description, public.service.service_name FROM public.content INNER JOIN public.service ON public.service.id = public.content.service_id';
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
                $des = $con['description'];
                $service = $con['service_name'];
                echo "<li><p>$name&nbsp;&#8212;&nbsp;$des&nbsp;&#8212;&nbsp;$service</p></li>";
            }
        ?>
    </ul>

</div>

  </body>
</html>