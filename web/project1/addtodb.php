<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$name = htmlspecialchars($_POST['showname']);
$about = htmlspecialchars($_POST['description']);
$service = htmlspecialchars($_POST['service']);
$link = htmlspecialchars($_POST['link']);
$date = date("m/d/Y");


$db = get_db();
$stmt = $db->prepare('INSERT INTO content (content_name, description, picture, service_id) VALUES (:name, :description, :link, :service)');
$stmt->bindValue(':name', $name);
$stmt->bindValue(':description', $about);
$stmt->bindValue(':link', $link);  
$stmt->bindValue(':service', $service);    
$stmt->execute();

$marksinked = markedsinked($date);
    
$new_page = "index.php";    
header("Location: $new_page");
    
die();


function markedsinked($date) {
$db = get_db();
$stmt2 = $db->prepare('INSERT INTO suggested_content (sinked) VALUES (:date)');
$stmt2->bindValue(':date', $date);   
$stmt2->execute();
    
}

?>