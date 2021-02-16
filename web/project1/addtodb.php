<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$sugname = htmlspecialchars($_POST['showname']);
$name = htmlspecialchars($_POST['newshowname']);
$about = htmlspecialchars($_POST['description']);
$service = htmlspecialchars($_POST['service']);
$link = htmlspecialchars($_POST['link']);
$yes = 'yes';


$db = get_db();
$stmt = $db->prepare('INSERT INTO content (content_name, description, picture, service_id) VALUES (:name, :description, :link, :service)');
$stmt->bindValue(':name', $name);
$stmt->bindValue(':description', $about);
$stmt->bindValue(':link', $link);  
$stmt->bindValue(':service', $service);    
$stmt->execute();

$marksinked = markedsinked($yes, $sugname);
    
$new_page = "index.php";    
header("Location: $new_page");
    
die();


function markedsinked($yes, $sugname) {
$db = get_db();
$stmt2 = $db->prepare('UPDATE suggested_content SET sinked = :true WHERE suggested_content_name = :name');
$stmt2->bindValue(':true', $yes);
$stmt2->bindValue(':name', $sugname);   
$stmt2->execute();
    
}

?>