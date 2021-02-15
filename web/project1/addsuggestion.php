<?php
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$name = htmlspecialchars($_POST['showname']);
$about = htmlspecialchars($_POST['description']);
$service = htmlspecialchars($_POST['service']);


$existinguname = checkExistinguname($name);

$addsugestion = addsuggestion($name, $about, $service);

function checkExistinguname($name) {
 $db = get_db();
 $stmt2 = $db->prepare('SELECT content_name FROM content WHERE content_name = :name');
 $stmt2->bindValue(':name', $name, PDO::PARAM_STR);
 $stmt2->execute();
 $matchname = $stmt2->fetch(PDO::FETCH_NUM);
 if($matchname >= 1){
 $new_page = "suggestion.php?success=2";    
header("Location: $new_page");
    
die();
}
}

function addsuggestion($name, $about, $service) {
$db = get_db();
$stmt = $db->prepare('INSERT INTO suggested_content (suggested_content_name, suggested_description, service_id) VALUES (:name, :description, :service)');
$stmt->bindValue(':name', $name);
$stmt->bindValue(':description', $about);
$stmt->bindValue(':service', $service);    
$stmt->execute();
    
$new_page = "suggestion.php?success=1";    
header("Location: $new_page");
    
die();;

}


?>