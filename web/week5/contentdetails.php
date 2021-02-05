<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

if (!isset($_GET['id']))
{
	die("Error, id not specified...");
}

$sid = htmlspecialchars($_GET['id']);

$db = get_db();

$stmt = $db->prepare('SELECT content_name, description, service_name, picture FROM content INNER JOIN service ON service.id = content.service_id WHERE content.id = :id');
$stmt->bindValue(':id', $sid, PDO::PARAM_INT);
$stmt->execute();
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $db->prepare('SELECT user_name, note FROM reviews INNER JOIN account ON account.id = reviews.account_id WHERE reviews.content_id = :id');
$stmt2->bindValue(':id', $sid, PDO::PARAM_INT);
$stmt2->execute();
$review = $stmt2->fetchAll(PDO::FETCH_ASSOC);



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

        <div class='card col-md-6 offset-md-3'>
        <?php
            foreach ($details as $detail)
            {
                $name = $detail['content_name'];
                $desc = $detail['description'];
                $service = $detail['service_name'];
                $image = $detail['picture'];
                echo "
                <div class='row p-2 g-0'>
                <div class='col-md-4'>
                <img src='$image' class='img-fluid' alt='$name'>
                </div>
                <div class='col-md-8'>
                <div class='card-body'>
                <h3 class='card-title'>$name</h3>
                <p class='card-text'><b>Description:</b> $desc</p>
                <p class='card-text'><b>Streaming Service:</b> $service</p>
                <a href='#' class='btn btn-outline-dark' role='button'>Add To Q</a>
                <a href='#' class='btn btn-outline-dark' role='button'>Write A Review</a>
                </div>
                </div>
                </div>
                ";
                
            }
        ?>
        
                <div class='row p-2 g-0'>
                <div class='col-md-4'>
                <h3>&emsp;Reviews</h3>
                </div>
                <div class='col-md-8'>
                <div class='card-body'>
                <?php
                foreach ($review as $reviews)
                {
                $uname = $reviews['user_name'];
                $note = $reviews['note'];
                echo "<p class='card-text'><b>$note</b> &#8212; $uname</p>";
                }
                ?>    
                </div>
                </div>
                </div>
            </div>
    </div>
</body>

</html>