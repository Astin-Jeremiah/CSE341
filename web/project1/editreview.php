<?php

$userid = htmlspecialchars($_POST['accountid']);
$programid = htmlspecialchars($_POST['contentid']);
$review = htmlspecialchars($_POST['review']); 

echo $userid;
echo $programid;
echo $review;

/*
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$db = get_db();
$stmt = $db->prepare('UPDATE userq SET enddate = :date WHERE account_id = :userid and content_id = :contentid;');
$stmt->bindValue(':date', $date);
$stmt->bindValue(':userid', $userid);
$stmt->bindValue(':contentid', $programid);
$stmt->execute();
    
$new_page = "accountinfo.php";    
header("Location: $new_page");
    
die();
*/

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
                <h4 class="mb-3">Edit Review:</h4>
                <form  action="login.php" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type='hidden' id='userid' name='userid' value='$user'>
                            <input type='hidden' id='programid' name='programid' value='$pid'>
                            <textarea class='form-control' placeholder='Review' id='review' name='review'><?php echo $review; ?></textarea>
                            <br>
                            <input type='submit' class='btn btn-dark' value='Submit Review'>  
                        </div>
                      <div class="col-12">
                            <label for="pw" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pw" name="pw" required>
                        </div>  
                    </div>
                </form>
                    <br>
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