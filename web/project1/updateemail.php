<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$email = htmlspecialchars($_POST['email']);
$user = $_SESSION['userid'];

$existingemail = checkExistingEmail($email);

$regOutcome = updateuser($user, $email);

function checkExistingEmail($email) {
 $db = get_db();
$stmt3 = $db->prepare('SELECT email FROM account WHERE email = :email');
 $stmt3->bindValue(':email', $email, PDO::PARAM_STR);
 $stmt3->execute();
 $matchEmail = $stmt3->fetch(PDO::FETCH_NUM);
 if($matchEmail >= 1){
$new_page = "updateaccountinfo.php?success=4";    
header("Location: $new_page");
    
die();
;
}
}


function updateuser($user, $email) {
$db = get_db();
$stmt = $db->prepare('UPDATE account SET email = :newemail WHERE id = :id');
$stmt->bindValue(':newemail', $email);
$stmt->bindValue(':id', $user);
$stmt->execute();
    
$new_page = "updateaccountinfo.php?success=5";    
header("Location: $new_page");
    
die();;

}


?>