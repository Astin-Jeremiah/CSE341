<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

if (isset($_POST['username']) && isset($_POST['password']))
{
$uname = htmlspecialchars($_POST['username']);
$pword = htmlspecialchars($_POST['password']);
$pword2 = htmlspecialchars($_POST['password2']);
$checkpword = checkpassword($pword, $pword2);  
$check2 =  checkpword($pword);  
$hash =  password_hash($pword, PASSWORD_DEFAULT);
$regOutcome = regClient($uname, $hash);
    
$existinguname = checkExistinguname($uname);

}

function checkpassword($pword, $pword2) {
    if ($pword == $pword2) {
        
    } else {
        $pageerror = "signup.php?success=2";  
        header("Location: $pageerror");
        die();
    }
}

function checkpword($pword) {
   
    if (strlen($pword) <= 7){
        $pageerror = "signup.php?success=3";  
        header("Location: $pageerror");
        die();
    } else if (!preg_match("#[0-9]+#",$pword)){
        $pageerror = "signup.php?success=4";  
        header("Location: $pageerror");
        die();
    } 
}

function checkExistinguname($uname) {
 $db = get_db();
 $stmt2 = $db->prepare('SELECT user_name FROM team_user WHERE user_name = :uname');
 $stmt2->bindValue(':uname', $uname, PDO::PARAM_STR);
 $stmt2->execute();
 $matchname = $stmt2->fetch(PDO::FETCH_NUM);
 if($matchname >= 1){
 $pageerror = "signup.php?success=2";    
 header("Location: $pageerror");
die();
}
}

function regClient($uname, $hash) {
$db = get_db();
$stmt = $db->prepare('INSERT INTO team_user (user_name, password) VALUES (:user_name, :password);');
$stmt->bindValue(':user_name', $uname);
$stmt->bindValue(':password', $hash);
$stmt->execute();
    
$new_page = "login.php";    
header("Location: $new_page");
    
die();
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>

      <link href="../../bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link href="style.css" rel="stylesheet">
      <script src="script.js"></script>
    </head>
  <body class="bg-light">
 
      <div class="container">
      <main>
    
      <div class="card col-md-6 offset-md-3 p-2">
                <h4 class="mb-3">Create New Account</h4>
                <div class="message">
                <?php
                    if (isset($_GET['success']) && $_GET['success'] == 1 ){
                     echo "<h6>Username Already Exists</h6>";
                    } else if (isset($_GET['success']) && $_GET['success'] == 2 ){
                     echo "<h6 class='text-danger'>Passwords Do Not Match</h6>";}
                    else if (isset($_GET['success']) && $_GET['success'] == 3 ){
                     echo "<h6 class='text-danger'>Passwords Must Be At Least 7 Characters </h6>";}
                    else if (isset($_GET['success']) && $_GET['success'] == 4 ){
                     echo "<h6 class='text-danger'>Passwords Must Contain A Number</h6>";}
                ?>
                </div>
                <form action="signup.php" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                      <div class="col-12">
                            <label for="password" class="form-label">Password</label>
                            <?php if (isset($_GET['success']) && $_GET['success'] == 2 ){
                            echo "<span class='text-danger'>*</span>";}?><input type="password" class="form-control" id="password" name="password" required >
                        </div> 
                        <div class="col-12">
                            <label for="password" class="form-label">Retype Password</label>
                            <?php if (isset($_GET['success']) && $_GET['success'] == 2 ){
                            echo "<span class='text-danger'>*</span>";}?><input type="password" class="form-control" id="password2" name="password2" required >
                        </div>  
                    </div><br>
                        <input type="submit" class="btn btn-dark" value="Create Account">
            </form>    
          </div>   
      </main>
    </div> 
  </body>
</html>