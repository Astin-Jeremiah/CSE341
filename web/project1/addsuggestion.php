<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$name = htmlspecialchars($_POST['showname']);
$about = htmlspecialchars($_POST['description']);
$service = htmlspecialchars($_POST['service']);

echo $name;
echo $about;
echo $service;

/*$existinguname = checkExistinguname($uname);

$regOutcome = updateuser($uname, $email);

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

function updateuser($uname, $email) {
$db = get_db();
$stmt = $db->prepare('UPDATE account SET user_name = :newname WHERE email = :email');
$stmt->bindValue(':newname', $uname);
$stmt->bindValue(':email', $email);
$stmt->execute();
    
$new_page = "updateaccountinfo.php?success=3";    
header("Location: $new_page");
    
die();;

}*/


?>