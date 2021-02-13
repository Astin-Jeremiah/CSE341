<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['uname']);
$pword = htmlspecialchars($_POST['password']);
$newhash =  password_hash($pword, PASSWORD_DEFAULT);

echo $uname;
echo $pword;
echo $newhash;

$db = get_db();
$stmt = $db->prepare('UPDATE account SET password = :npass WHERE user_name = :username');
$stmt->bindValue(':npass', $newhash);
$stmt->bindValue(':username', $uname);
$stmt->execute();


$new_page = "updateaccountinfo.php?success=1";    
header("Location: $new_page");
    
die();

?>