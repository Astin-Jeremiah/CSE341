<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Login</title>

      <link href="../../bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link href="style.css" rel="stylesheet">
      <script src="script.js"></script>
    </head>
  <body class="bg-secondary">
 <header>
    <div class="container text-end">
      <a href="login.php">
        <i class="bi bi-person-circle" id="login"></i>
      </a>
  </div>
</header>
      <div class="container">
      <main>
<div class="py-3 text-center">
      <img class="img-fluid" src="../../images/logo.png" alt="Stream Central Logo">
    </div>
    
      <div class="col-md-6 offset-md-3">
                <h4 class="mb-3">Login Information:</h4>
                <form class="needs-validation" action="" method="" novalidate>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>
                      <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>  
                    </div>
                        <input type="submit" class="btn btn-dark" value="Login">
                </form>
                <h4 class="mb-3">Not Registered Yet?</h4>
                <a class="btn btn-dark" href="register.php" role="button">Register For New Account</a>
          </div>   
      </main>
    </div>      
  </body>
</html>