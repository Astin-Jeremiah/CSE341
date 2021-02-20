<?php

$nrev = htmlspecialchars($_POST['newreview']);
$userid2 = htmlspecialchars($_POST['aid']);
$programid2 = htmlspecialchars($_POST['cid']);
$result = htmlspecialchars($_POST['result']);
$update = "Update Review";
$delete = "Delete Review";

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

if ($result == $update){
$db = get_db();
$stmt = $db->prepare('UPDATE reviews SET note = :review WHERE account_id = :userid AND content_id = :programid');
$stmt->bindValue(':review', $nrev);
$stmt->bindValue(':userid', $userid2);
$stmt->bindValue(':programid', $programid2);
$stmt->execute();

$new_page = "accountinfo.php";    
header("Location: $new_page");
die();
}

if ($result == $delete){
$db = get_db();
$stmt = $db->prepare('DELETE FROM reviews WHERE account_id = :userid AND content_id = :programid');
$stmt->bindValue(':userid', $userid2);
$stmt->bindValue(':programid', $programid2);
$stmt->execute();

$new_page = "accountinfo.php";    
header("Location: $new_page");
die();  
?>