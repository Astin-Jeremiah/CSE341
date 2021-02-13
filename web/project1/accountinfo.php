<?php
session_start();
$badLogin = false;


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
                            <p class="fs-4">Username:</p>
                        </div>
                      <div class="col-12">
                            <p class="fs-4">Email:</p>
                        </div>  
                    </div><br>
                        <a class="btn btn-dark" href="#" role="button">Update Account Information</a>
                <br><br>
                <hr>
                <h4 class="mb-3">Watch List</h4>
                <p class="fs-4">Watch Item #1</p>
          </div>   
      </main>
    </div>      
  </body>
</html>