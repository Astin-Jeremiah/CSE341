<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$user = $_SESSION['userid'];

$db = get_db();
$stmt = $db->prepare('SELECT user_name, email, password FROM account WHERE id = :id');
$stmt->bindValue(':id', $user, PDO::PARAM_INT);
$stmt->execute();
$info = $stmt->fetchAll(PDO::FETCH_ASSOC);

$user2 = $_SESSION['userid'];
$db = get_db();
$stmt2 = $db->prepare ('SELECT content_id, content_name, account_id FROM content INNER JOIN userq ON userq.content_id = content.id WHERE account_id = :id and enddate IS null ORDER BY content_name ASC');
$stmt2->bindValue(':id', $user2, PDO::PARAM_INT);
$stmt2->execute();
$ques = $stmt2->fetchAll(PDO::FETCH_ASSOC);

$user3 = $_SESSION['userid'];
$db = get_db();
$stmt3 = $db->prepare ('SELECT account_id, content_id, content_name, note FROM content INNER JOIN reviews ON reviews.content_id = content.id WHERE account_id = :id ORDER BY content_name ASC');
$stmt3->bindValue(':id', $user3, PDO::PARAM_INT);
$stmt3->execute();
$reviews = $stmt3->fetchAll(PDO::FETCH_ASSOC);

$db = get_db();
$stmt4 = $db->prepare ('SELECT suggested_content_name, suggested_description, service_id FROM suggested_content WHERE sinked IS null ORDER BY suggested_content_name ASC');
$stmt4->execute();
$suggestion = $stmt4->fetchAll(PDO::FETCH_ASSOC);

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
      <a href="index.php"><img class="img-fluid" src="../../images/logo.png" alt="Stream Central Logo"></a>
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
                                $pw = $inf['password'];
                                $level = inf['level'];
                            echo "<p class='fs-4'>Username: $uname</p>
                            <p class='fs-4'>Email: $email</p>";
                            }
                            ?>
                            <form action="updateaccountinfo.php" method="POST">
                            <input type='hidden' id='username' name='username' value='<?php echo $uname; ?>'>
                            <input type='hidden' id='email' name='email' value='<?php echo $email; ?>'>
                            <input type='submit' class='btn btn-dark' value='Update Account Information'>
                            </form>
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
                        echo "
                        <form id='specialform' action='removefromwatchlist.php' method='POST'>
                        <li><a href='programdetails.php?id=$showid' class='link-dark'> $proname</a>
                        <input type='hidden' id='accountid' name='accountid' value='$accid'>
                        <input type='hidden' id='contentid' name='contentid' value='$showid'>
                        <button type='submit' id='special'><i class='bi bi-trash-fill' id='trash' title='Remove From Watch List'></i></button>
                        </form></span>
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
                        $accid = $rev['account_id'];
                        $conid = $rev['content_id'];
                        $showname = $rev['content_name'];
                        $review = $rev['note'];
                        echo "
                        <form id='specialform2' action='editreview.php' method='POST'>
                        <li><button type='submit' id='special' title='Edit Review'><b>$showname</b> - $review </button><i class='bi bi-pencil-fill'> </i></li>
                        <input type='hidden' id='accountid' name='accountid' value='$accid'>
                        <input type='hidden' id='contentid' name='contentid' value='$conid'>
                        <input type='hidden' id='contentid' name='review' value='$review'>
                        </form>";
                        }
                ?>
                </ul>
                </div>
            
                <?php 

                    if (isset ($_SESSION['userlevel']) && $_SESSION['userlevel'] == 3){
                        echo "
                        <hr>
                        <div>
                        <h4 class='mb-3'>Admin: User Suggestions</h4>
                        <ul>";
                        foreach ($suggestion as $sug){
                            $sname = $sug['suggested_content_name'];
                            $desc = $sug['suggested_description'];
                            $serv = $sug['service_id'];
                            echo "
                            <form id='specialform' action='sendtodb.php' method='POST'>
                            <li><button type='submit' id='special'><b> $sname</b> - $desc <i class='bi bi-check2-square'> </i></button></li>
                            <input type='hidden' id='showname' name='showname' value='$sname'>
                            <input type='hidden' id='description' name='description' value='$desc'>
                            <input type='hidden' id='service' name='service' value='$serv'>
                            </form>";
                        }
                        echo "
                        </ul>
                        </div>
                        ";
                    }
                ?>

          </div> 
          <br><br>
      </main>
    </div>      
  </body>
</html>