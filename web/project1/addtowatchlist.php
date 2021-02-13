<?php
session_start();
if (!isset($_SESSION['userid']))
{
	header("Location: login.php");
    die();
} else {

$programid = htmlspecialchars($_POST['proid']);
$uid = $_SESSION['userid'];
$date = date("m/d/Y");

$db = get_db();
$stmt = $db->prepare('INSERT INTO userq (account_id, content_id, date) VALUES (:acid, :conid, :date);');
$stmt->bindValue(':acid', $programid);
$stmt->bindValue(':conid', $uid);
$stmt->bindValue(':date', $date);
$stmt->execute();
}
?>