<?php
session_start();
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

echo var_dump($_SESSION);
$user = $_SESSION['userid'];
    $pid = htmlspecialchars($_GET['id']);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Details</title>
    <link href="../../bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link href="style.css" rel="stylesheet">
    <script src="script.js"></script>
</head>

<body class="bg-secondary">
<header>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/project1/header.php'; ?>
</header>
<main>
    <div class="py-3 text-center">
      <img class="img-fluid" src="../../images/logo.png" alt="Stream Central Logo">
        <br>
    </div>      
    <div class="container">
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
                <a href='#' class='btn btn-dark' role='button'>Add To Watch List</a>
                <button class='btn btn-dark' onclick='goBack()'>Return To List</button>
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
                <a href='login.php' class='btn btn-dark me-2' role='button'>Login To Write A Review</a>
                </div>
                </div>
                </div>
            </div>
        <br>
        <div class='card col-md-6 offset-md-3'>
        
                <div class='row p-2 g-0'>
                <div class='col-md-4'>
                <h3>Add A Review</h3>
                </div>
                <div class='col-md-8'>
                <div class='card-body'>
                <form action="insertreview.php" method="POST">
                        <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['userid']; ?>">
                        <input type="hidden" id="programid" name="programid" value="<?php echo $_GET['id']; ?>">
                        <textarea class="form-control" placeholder="Review" id="review" name="review"></textarea>
                        <br>
                        <input type="submit" class="btn btn-dark" value="Submit Review">
                </form>
                </div>
                </div>
                </div>
    </div>
    </div>
    </main>
    </body>

</html>