<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$user = $_SESSION['userid'];
$pword = htmlspecialchars($_POST['password']);
$newhash =  password_hash($pword, PASSWORD_DEFAULT);



$db = get_db();
$stmt = $db->prepare('UPDATE account SET password = :npass WHERE id = :id');
$stmt->bindValue(':npass', $newhash);
$stmt->bindValue(':id', $user);
$stmt->execute();


$new_page = "updateaccountinfo.php?success=1";    
header("Location: $new_page");
    
die();

?