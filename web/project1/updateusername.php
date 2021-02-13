<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);

$existinguname = checkExistinguname($uname);

function checkExistinguname($uname) {
 $db = get_db();
 $stmt2 = $db->prepare('SELECT user_name FROM account WHERE user_name = :uname');
 $stmt2->bindValue(':uname', $uname, PDO::PARAM_STR);
 $stmt2->execute();
 $matchname = $stmt2->fetch(PDO::FETCH_NUM);
 if($matchname >= 1){
 $new_page = "updateaccountinfo.php?success=2";    
header("Location: $new_page");
    
die();
}
}


/*$db = get_db();
$stmt = $db->prepare('UPDATE account SET password = :npass WHERE user_name = :username');
$stmt->bindValue(':npass', $newhash);
$stmt->bindValue(':username', $uname);
$stmt->execute();


$new_page = "updateaccountinfo.php?success=1";    
header("Location: $new_page");
    
die();*/

?>