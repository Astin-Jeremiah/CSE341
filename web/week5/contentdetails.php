<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

if (!isset($_GET['id']))
{
	die("Error, id not specified...");
}

$sid = htmlspecialchars($_GET['id']);

$db = get_db();

$stmt = $db->prepare('SELECT content_name, description, service_name, picture, note, first_name, last_name FROM content INNER JOIN service ON service.id = content.service_id INNER JOIN reviews ON reviews.content_id = content.id INNER JOIN account ON  account.id = reviews.account_id WHERE content.id = :id');
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
                $rev = $detail['note'];
                $fn = $detail['first_name'];
                $ln = $detail['last_name'];
                echo "<div class='card col-md-6 offset-md-3'>
                <div class='row g-0'>
                <div class='col-md-4'>
                <img src='$image' class='img-fluid' alt='$name'>
                </div>
                <div class='col-md-8'>
                <div class='card-body'>
                <h3 class='card-title'>$name</h3>
                <p class='card-text'><b>Description:</b> $desc</p>
                <p class='card-text'><b>Streaming Service:</b> $service</p>
                <a href='#' class='card-link'>Add To Q</a>
                <a href='#' class='card-link'>Write A Review</a>
                </div>
                </div>
                </div>
                <h3 class='card-title'>Reviews</h3>
                <p class='card-text-center'><b>$rev</b> &#8212; $fn $ln</p>
                </div>";
                
            }
        ?>


    </div>

</body>

</html>