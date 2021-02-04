<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

if (!isset($_GET['id']))
{
	die("Error, id not specified...");
}

$sid = htmlspecialchars($_GET['id']);

$db = get_db();

$stmt = $db->prepare('SELECT * FROM content INNER JOIN service ON service.id = content.service_id WHERE content.id = :id');
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
    <link href="../../bootstrap.min.css" rel="stylesheet">
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-secondary">

    <div class="container">
        <h1>Content Details</h1>

        <?php
            foreach ($details as $detail)
            {
                $name = $detail['content_name'];
                $desc = $detail['description'];
                $service = $detail['service_name'];
                $image = $detail['picture'];
                echo "<div class='card text-center'><img src='$image' class='img-fluid card-img-top' alt='$name'>
                <div class='card-body'>
                <h3 class='card-title'>$name</h3>
                <p class='card-text'>$desc</p>
                <p class='card-text'>$service</p>
                <a href='#' class='card-link'>Add To Q</a>
                <a href='#' class='card-link'>Write A Review</a>
                </div>
                </div>";
                
            }
        ?>


    </div>

</body>

</html>