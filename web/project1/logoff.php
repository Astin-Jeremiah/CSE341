<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['userlevel']);
unset($_SESSION['url']);
unset($_SESSION['url2']);
header("Location: index.php");
die();
?>