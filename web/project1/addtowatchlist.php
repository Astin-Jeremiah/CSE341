<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php'; 

if (!isset($_SESSION['userid']))
{
	header("Location: login.php");
    die();
} else {

$programid = htmlspecialchars($_POST['proid']);
$uid = htmlspecialchars($_POST['uid']);
$date = date("m/d/Y");
$exists = checkExists($uid, $programid);
$add = addtitle ($uid, $programid, $date);
}

function checkExists($uid, $programid) {
 $db = get_db();
 $stmt2 = $db->prepare('SELECT id FROM userq WHERE account_id = :uid AND content_id = :contentid AND enddate IS null');
 $stmt2->bindValue(':uid', $uid);
 $stmt2->bindValue(':contentid', $programid);
 $stmt2->execute();
 $match = $stmt2->fetch(PDO::FETCH_NUM);
 if($match >= 1){
 $new_page = "programdetails.php?id=$programid&success=1";    
header("Location: $new_page");
    
die();
}
}

function addtitle ($uid, $programid, $date){
$db = get_db();
$stmt = $db->prepare('INSERT INTO userq (account_id, content_id, startdate) VALUES (:acid, :conid, :date);');
$stmt->bindValue(':acid', $uid);
$stmt->bindValue(':conid', $programid);
$stmt->bindValue(':date', $date);
$stmt->execute();
    
$new_page = "programdetails.php?id=$programid&success=2";    
header("Location: $new_page");
    
die();
    
}

?>