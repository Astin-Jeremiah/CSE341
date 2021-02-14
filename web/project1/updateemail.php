<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['uname']);
$email = htmlspecialchars($_POST['email']);

$existingemail = checkExistingEmail($email);

$regOutcome = updateuser($uname, $email);

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


function updateuser($uname, $email) {
$db = get_db();
$stmt = $db->prepare('UPDATE account SET email = :newemail WHERE user_name = :uname');
$stmt->bindValue(':newemail', $email);
$stmt->bindValue(':uname', $uname);
$stmt->execute();
    
$new_page = "updateaccountinfo.php?success=5";    
header("Location: $new_page");
    
die();;

}


?>