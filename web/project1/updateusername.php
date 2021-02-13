<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);

echo $uname;
echo $email;


/*$db = get_db();
$stmt = $db->prepare('UPDATE account SET password = :npass WHERE user_name = :username');
$stmt->bindValue(':npass', $newhash);
$stmt->bindValue(':username', $uname);
$stmt->execute();


$new_page = "updateaccountinfo.php?success=1";    
header("Location: $new_page");
    
die();*/

?>