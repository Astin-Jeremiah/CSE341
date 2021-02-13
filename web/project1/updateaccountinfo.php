<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$username = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Registration</title>

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
                <h4 class="mb-3">Update Account Information</h4>
                <div class="message">
                <?php
                    if (isset($_GET['success']) && $_GET['success'] == 1 ){
                     echo "<h6>Username Already Exists</h6>";
                    } else if (isset($_GET['success']) && $_GET['success'] == 2 ){
                     echo "<h6>Email Already Exists Please <a href='login.php'>Login</a>.</h6>";
                    }
                ?>
                </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <form action="updateusername.php" method="post">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="username" name="username" required <?php if(isset($username)){echo "value='$username'";}  ?>>
                            <input type='submit' class='btn btn-dark' value='Update User Name'>
                            </form>    
                        </div>
                        <div class="col-12">
                            <form action="updateemail.php" method="post">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required <?php if(isset($email)){echo "value='$email'";}  ?>>
                            <input type='submit' class='btn btn-dark' value='Update Email'>
                            </form>
                        </div>
                      <div class="col-12">
                            <form action="updatepword.php" method="post">
                            <label for="password" class="form-label">Password - At least 8 characters containing 1 number, 1 capital letter and 1 special character.</label>
                            <input type="password" class="form-control" id="password" name="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                            <input type='submit' class='btn btn-dark' value='Update Password'>
                          </form>
                        </div>  
                    </div><br>
          </div>   
      </main>
    </div> 
  </body>
</html>