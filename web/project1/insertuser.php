  
<?php

$uname = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$pword = htmlspecialchars($_POST['password']);

require('dbConnect.php');
$db = get_db();

$stmt = $db->prepare('INSERT INTO account(user_name, email, password) VALUES (:username, :email, :password);');
$stmt->bindValue(':username', $uname, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $pword, PDO::PARAM_STR);
$stmt->execute();

$new_page = "login.php";

header("Location: $new_page");
die();

?>