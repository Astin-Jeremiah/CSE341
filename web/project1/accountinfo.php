<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$user = $_SESSION['userid'];

$db = get_db();
$stmt = $db->prepare('SELECT user_name, email FROM account WHERE id = :id');
$stmt->bindValue(':id', $user, PDO::PARAM_INT);
$stmt->execute();
$info = $stmt->fetchAll(PDO::FETCH_ASSOC);

$user2 = $_SESSION['userid'];
$db = get_db();
$stmt2 = $db->prepare ('SELECT content_id, content_name, account_id FROM content INNER JOIN userq ON userq.content_id = content.id WHERE account_id = :id and enddate IS null');
$stmt2->bindValue(':id', $user2, PDO::PARAM_INT);
$stmt2->execute();
$ques = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$user3 = $_SESSION['userid'];
$db = get_db();
$stmt3 = $db->prepare ('SELECT content_id, content_name, note FROM content INNER JOIN reviews ON reviews.content_id = content.id WHERE account_id = :id');
$stmt3->bindValue(':id', $user3, PDO::PARAM_INT);
$stmt3->execute();
$reviews = $stmt3->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Information</title>

      <link href="../../bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link href="style.css" rel="stylesheet">
      <script src="script.js"></script>
    </head>
  <body class="bg-secondary">
 <header>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/project1/header.php'; ?>
</header>
      <div class="container">
      <main>
<div class="py-3 text-center">
      <img class="img-fluid" src="../../images/logo.png" alt="Stream Central Logo">
    </div>
    
      <div class="card col-md-6 offset-md-3 p-2">
                <h4 class="mb-3">Account Information:</h4>
                    <div class="row g-3">
                        <div class="col-12">
                            <?php
                            foreach ($info as $inf)
                            {
                                $uname = $inf['user_name'];
                                $email = $inf['email'];
                            echo "<p class='fs-4'>Username: $uname</p>
                            <p class='fs-4'>Email: $email</p>";
                            }
                            ?>
                            <a class="btn btn-dark" href="#" role="button">Update Account Information</a>
                        </div>  
                    </div>
                <hr>
                <div>
                <h4 class="mb-3">Watch List</h4>
                <ul>
                <?php
                    foreach ($ques as $que)
                        {
                        $proname = $que['content_name'];
                        $showid = $que['content_id'];
                        $accid = $que['account_id'];
                        echo "<li><a href='programdetails.php?id=$showid' class='link-dark'>$proname</a> 
                        <form action='removefromwatchlist.php' method='POST'>
                        <input type='hidden' id='accountid' name='accountid' value='$accid'>
                        <input type='hidden' id='contentid' name='contentid' value='$showid'>
                        <input type='submit' id='special' value='<i class='bi bi-trash-fill' title='Remove From Watch List'></i>'></form>
                        </li>";
                        }
                ?>
                </ul>
                </div>
                <hr>
                <div>
                <h4 class="mb-3">My Reviews</h4>
                <ul>
                <?php
                    foreach ($reviews as $rev)
                        {
                        $showname = $rev['content_name'];
                        $review = $rev['note'];
                        echo "<li><b>$showname</b> - $review</li>";
                        }
                ?>
                </ul>
                </div>
          </div>   
      </main>
    </div>      
  </body>
</html>