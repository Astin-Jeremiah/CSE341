<?php
echo ($_POST["accountid"]);
echo ($_POST["programid"]);


/*require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$userid = htmlspecialchars($_POST['userid']);
$programid = htmlspecialchars($_POST['programid']);
$review = htmlspecialchars($_POST['review']);

$db = get_db();
$stmt = $db->prepare('INSERT INTO reviews (account_id, content_id, note) VALUES (:acid, :conid, :rev);');
$stmt->bindValue(':acid', $userid);
$stmt->bindValue(':conid', $programid);
$stmt->bindValue(':rev', $review);
$stmt->execute();
    
$new_page = "programdetails.php?id=$programid";    
header("Location: $new_page");
    
die();*/

?>