<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['url']);

header("Location: index.php");
die();
?>