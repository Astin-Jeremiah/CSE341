<?php
session_start();

if (!isset($_SESSION['userid']))
{
	header("Location: login.php");
    die();
} else {

$programid = htmlspecialchars($_POST['proid']);
$uid = htmlspecialchars($_POST['uid']);
$date = date("m/d/Y");


$exists = checktitle($uid, $programid);
    
function checktitle($uid, $programid) {
 require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php'; 
 $db = get_db();
 $stmt2 = $db->prepare('SELECT content_id FROM userq WHERE account_id = :uid AND content_id = :contentid AND enddate IS null');
 $stmt2->bindValue(':uid', $uid);
 $stmt2->bindValue(':contentid', $programid);
 $stmt2->execute();
 $matchname = $stmt2->fetch(PDO::FETCH_NUM);
 if($matchname >= 1){
 $new_page = "programdetails.php?id=$programid&success=1";    
header("Location: $new_page");
    
die();
}
}
   

}
?>