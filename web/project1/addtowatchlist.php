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
    
echo $programid;
echo $uid;
echo $date;

}
?>