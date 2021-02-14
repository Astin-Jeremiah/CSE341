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

$exists = checkexistingtitle($programid, $uid);
    
function checkexistingtitle($programid, $uid) {
 $db = get_db();
 $stmt2 = $db->prepare('SELECT content_id FROM userq WHERE account_id = :uid AND content_id = :contentid AND enddate IS null');
 $stmt2->bindValue(':uid', $uid, PDO::PARAM_STR);
 $stmt2->bindValue(':contentid', $programid, PDO::PARAM_STR);
 $stmt2->execute();
 $matchname = $stmt2->fetch(PDO::FETCH_NUM);
 if($matchname >= 1){
 $new_page = "programdetails.php?id=$programid&success=1";    
header("Location: $new_page");
    
die();
}
}
    
    
/*$db = get_db();
$stmt = $db->prepare('INSERT INTO userq (account_id, content_id, startdate) VALUES (:acid, :conid, :date);');
$stmt->bindValue(':acid', $uid);
$stmt->bindValue(':conid', $programid);
$stmt->bindValue(':date', $date);
$stmt->execute();
    
$new_page = "programdetails.php?id=$programid";    
header("Location: $new_page");
die(); */   

}
?>