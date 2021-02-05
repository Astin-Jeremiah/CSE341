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
                echo "
                <div class='card col-md-6 offset-md-3'>
                <div class='row g-0'>
                <div class='col-md-4'>
                <img src='../images/man.jpg' class='img-fluid' alt='The Mandalorian'>
                </div>
                <div class='col-md-8'>
                <div class='card-body'>
                <h3 class='card-title'>The Mandalorian</h3>
                <p class='card-text'><b>Description:</b> The travels of a lone bounty hunter in the outer reaches of the galaxy, far from the authority of the New Republic.</p>
                <p class='card-text'><b>Streaming Service:</b> Disney Plus</p>
                <a href='#' class='card-link'>Add To Q</a>
                <a href='#' class='card-link'>Write A Review</a>
                </div>
                </div>
                </div>
                <div class='row g-0'>
                <div class='col-md-4'>
                <br><br>
                <h3 class='card-title'>Reviews</h3>
                </div>
                <div class='col-md-8'>
                <div class='card-body'>
                <p class='card-text'><b>Best thing to happen to Star Wars since the original trilogy!</b> &#8212; Jeremiah Astin</p>
                </div> 
                </div>
                </div>

                </div>
                ";
                
            }
        ?>


    </div>

</body>

</html>