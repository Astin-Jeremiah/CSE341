<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

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
                <h4 class="mb-3">Create New Account</h4>
                <form action="insertuser.php" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="username" name="username" required <?php if(isset($username)){echo "value='$username'";}  ?>>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required <?php if(isset($email)){echo "value='$email'";}  ?>>
                        </div>
                      <div class="col-12">
                            <label for="password" class="form-label">Password - Must be at least 8 characters and contain 1 number, 1 capital letter and 1 special character.</label>
                            <input type="password" class="form-control" id="password" name="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                        </div>  
                    </div><br>
                        <input type="submit" class="btn btn-dark" value="Create Account">
            </form>    
          </div>   
      </main>
    </div> 
  </body>
</html>