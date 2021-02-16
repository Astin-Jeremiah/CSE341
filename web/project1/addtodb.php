<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$name = htmlspecialchars($_POST['showname']);
$about = htmlspecialchars($_POST['description']);
$service = htmlspecialchars($_POST['service']);
$link = htmlspecialchars($_POST['link']);

$db = get_db();
$stmt = $db->prepare('INSERT INTO content (content_name, description, picture, service_id) VALUES (:name, :description, :link, :service)');
$stmt->bindValue(':name', $name);
$stmt->bindValue(':description', $about);
$stmt->bindValue(':link', $link);  
$stmt->bindValue(':service', $service);    
$stmt->execute();
    
$new_page = "index.php";    
header("Location: $new_page");
    
die();;

?>