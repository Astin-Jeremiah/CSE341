<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['uname']);
$pword = htmlspecialchars($_POST['password']);
$newhash =  password_hash($pword, PASSWORD_DEFAULT);

echo $uname;
echo $pword;
echo $newhash;


/*$hash =  password_hash($pword, PASSWORD_DEFAULT);
$existinguname = checkExistinguname($uname);
$existingemail = checkExistingEmail($email);
$regOutcome = regClient($uname, $email, $hash);*/


?>