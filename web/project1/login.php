<?php
session_start();

$badLogin = false;

if (isset($_POST['uname']) && isset($_POST['password']))
{
    $name = $_POST['uname'];
    $pword = $_POST['password'];
    
    require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
    $db = get_db();
    $query = 'SELECT password FROM account WHERE user_name =:uname';
    $statement = $db->prepare($query);
	$statement->bindValue(':uname', $name);
    $result = $statement->execute();
    
    if ($result)
	{
		$row = $statement->fetch();
		$password = $row['password'];


		if (password_verify($pword, $password))
		{

			$_SESSION['uname'] = $name;
			header("Location: index.php");
			die(); 
		}
		else
		{
			$badLogin = true;
		}

	}
	else
	{
		$badLogin = true;
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
                <h4 class="mb-3">Login Information:</h4>
                <?php
                if ($badLogin)
                    {
	                   echo "<h6>Incorrect username or password!</h6>";
                    }
                ?>
                <form  action="login.php" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="uname" class="form-label">Username</label>
                            <input type="text" class="form-control" id="uname" name="uname" required>
                        </div>
                      <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>  
                    </div><br>
                        <input type="submit" class="btn btn-dark" value="Login">
                <br><br>
                <h4 class="mb-3">Not Registered Yet?</h4>
                <a class="btn btn-dark" href="register.php" role="button">Register For New Account</a>
            </form>    
          </div>   
      </main>
    </div>      
  </body>
</html>