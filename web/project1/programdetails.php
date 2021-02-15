<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

if (!isset($_GET['id']))
{
	header("Location: index.php");
             die();
}

$sid = htmlspecialchars($_GET['id']);

$db = get_db();

$stmt = $db->prepare('SELECT content_name, description, service_id, service_name, picture FROM content INNER JOIN service ON service.id = content.service_id WHERE content.id = :id');
$stmt->bindValue(':id', $sid, PDO::PARAM_INT);
$stmt->execute();
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $db->prepare('SELECT user_name, note FROM reviews INNER JOIN account ON account.id = reviews.account_id WHERE reviews.content_id = :id');
$stmt2->bindValue(':id', $sid, PDO::PARAM_INT);
$stmt2->execute();
$review = $stmt2->fetchAll(PDO::FETCH_ASSOC);

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
            <a href="index.php"><img class="img-fluid" src="../../images/logo.png" alt="Stream Central Logo"></a>
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
                $serviceid = $detail['service_id'];
                echo "
                <div class='row p-2 g-0'>
                <div class='col-md-4'>
                <img src='$image' class='img-fluid' alt='$name'>
                </div>
                <div class='col-md-8'>
                <div class='card-body'>
                <h3 class='card-title'>$name</h3>
                <p class='card-text'><b>Description:</b> $desc</p>
                <p class='card-text'><b>Streaming Service:</b> $service</p>";
                if (isset ($_SESSION['userid'])){
                    echo "
                <form action='addtowatchlist.php' method='POST'>
                <input type='hidden' id='proid' name='proid' value='$sid'>
                <input type='hidden' id='uid' name='uid' value='$user'>
                <input type='submit' class='btn btn-dark' value='Add To Watch List'>
                <a href='index.php?service=$serviceid' class='btn btn-dark me-2' role='button'>Return To List</a>
                </form>";} else {
                    echo "<a href='login.php?id=$pid' class='btn btn-dark me-2' role='button'>Login To Add To Watch List</a>
                    <a href='index.php?service=$serviceid' class='btn btn-dark me-2' role='button'>Return To List</a>
                </form>";}
                echo "</div>";

                if (isset($_GET['success']) && $_GET['success'] == 1 ){
                     echo "<h6>Already On Your Watch List</h6>";
                    } else if (isset($_GET['success']) && $_GET['success'] == 2 ){
                     echo "<h6>Title Added To Watch List</h6>";
                    }
                echo "
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
            <br>
            <div class='card col-md-6 offset-md-3'>

                <div class='row p-2 g-0'>
                    <div class='col-md-4'>
                        <h3>Add A Review</h3>
                    </div>
                    <div class='col-md-8'>
                        <div class='card-body'>
                            <?php
                    if (isset ($_SESSION['userid'])){
                        echo "<form action='insertreview.php' method='POST'>
                        <input type='hidden' id='userid' name='userid' value='$user'>
                        <input type='hidden' id='programid' name='programid' value='$pid'>
                        <textarea class='form-control' placeholder='Review' id='review' name='review'></textarea>
                        <br>
                        <input type='submit' class='btn btn-dark' value='Submit Review'>    
                        </form>";} else {
                        echo "<a href='login.php?id=$pid' class='btn btn-dark me-2' role='button'>Login To Write A Review</a>";}
                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
