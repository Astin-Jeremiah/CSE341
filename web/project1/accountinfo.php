<?php
session_start();
$badLogin = false;

$user = $_SESSION['userid'];

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

stmt2 = $db->prepare('SELECT * FROM account WHERE id = :id');
$stmt2->bindValue(':id', $user, PDO::PARAM_INT);
$stmt2->execute();
$accountinf = $stmt2->fetchAll(PDO::FETCH_ASSOC);

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
                            foreach ($accountinf as $account)
                            {
                                $uname = $service['user_name'];
                                $email = $service['email'];
                            echo "<p class='fs-4'>Username: $uname</p>
                            <br><br>
                            <p class='fs-4'>Email: $email</p>
                            <br><br>";
                            }
                            ?>
                            <a class="btn btn-dark" href="#" role="button">Update Account Information</a>
                        </div>  
                    </div>
                <br><br>
                <hr>
                <h4 class="mb-3">Watch List</h4>
                <p class="fs-4">Watch Item #1</p>
          </div>   
      </main>
    </div>      
  </body>
</html>