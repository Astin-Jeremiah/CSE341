<?php
session_start();
$badLogin = false;

if (isset($_POST['user']) && isset($_POST['pw']))
{
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pw']);
    
    
    
    require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
    $db = get_db();
    $query = 'SELECT password FROM team_user WHERE user_name =:uname';
    $statement = $db->prepare($query);
	$statement->bindValue(':uname', $username);
    $result = $statement->execute();

    if ($result)
	{
		$row = $statement->fetch();
		$hash = $row['password'];

        
        if (password_verify($password, $hash)) {
            $_SESSION['username'] = $username;
            $new_page = "welcome.php";    
            header("Location: $new_page");
             die();
        }else {
            $badLogin = true;
        }
                   }

}

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
  <body class="bg-light">

      <div class="container">
      <main>
    
      <div class="card col-md-6 offset-md-3 p-2">
                <h4 class="mb-3">Login Information:</h4>
                <?php
                if ($badLogin)
                    {
	                   echo "<h6>Incorrect username or password! $id</h6>";

                    }
                ?>
                <?php
                    if (isset($_GET['success']) && $_GET['success'] == 1 ){
                     echo "<h6>Thank You For Creating An Account Please Log In</h6>";
                    } 
                ?>
                <form  action="login.php" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="user" class="form-label">Username</label>
                            <input type="text" class="form-control" id="user" name="user" required>
                        </div>
                      <div class="col-12">
                            <label for="pw" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pw" name="pw" required>
                        </div>  
                    </div><br>
                        <input type="submit" class="btn btn-dark" value="Login">
                <br><br>
                <h4 class="mb-3">Not Registered Yet?</h4>
                <a class="btn btn-dark" href="signup.php" role="button">Register For New Account</a>
            </form>    
          </div>   
      </main>
    </div>      
  </body>
</html>