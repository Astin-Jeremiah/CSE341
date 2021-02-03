<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$query = 'SELECT public.content.content_name, public.content.description, public.service.service_name FROM public.content INNER JOIN public.userq ON public.content.id = public.userq.content_id INNER JOIN public.service ON public.service.id = public.content.service_id WHERE public.userq.user_id = 1';
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
                $name = $content['content_name'];
                $des = $content['content_descirption'];
                $service = $content['service_name'];
                echo "<li><p>$name&emsp;$des&emsp;$service</p></li>";
            }
        ?>
        <li></li>
    </ul>

</div>

  </body>
</html>