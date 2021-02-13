<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['uname']);
$pword = htmlspecialchars($_POST['password']);

echo $uname;
echo $pword;


/*$hash =  password_hash($pword, PASSWORD_DEFAULT);
$existinguname = checkExistinguname($uname);
$existingemail = checkExistingEmail($email);
$regOutcome = regClient($uname, $email, $hash);*/


?>