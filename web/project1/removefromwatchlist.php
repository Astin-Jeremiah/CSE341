<?php

$userid = htmlspecialchars($_POST['accountid']);
$programid = htmlspecialchars($_POST['contentid']);
$date = date("m/d/Y");

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$db = get_db();
$stmt = $db->prepare('UPDATE userq SET enddate = :date WHERE user_id = :userid and content_id = :contentid;');
$stmt->bindValue(':date', $date);
$stmt->bindValue(':userid', $userid);
$stmt->bindValue(':contentid', $programid);
$stmt->execute();
    
$new_page = "accountinfo.php";    
header("Location: $new_page");
    
die();

?>