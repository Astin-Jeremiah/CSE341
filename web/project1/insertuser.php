  
<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$pword = password_hash($password, PASSWORD_DEFAULT);
$existinguname = checkExistinguname($uname);

$regOutcome = regClient($uname, $email, $pword);

function checkExistinguname($uname) {
 $stmt2 = $db->prepare('SELECT user_name FROM account WHERE user_name = :uname');
 $stmt2->bindValue(':uname', $uname, PDO::PARAM_STR);
 $stmt2->execute();
 $matchname = $stmt->fetch(PDO::FETCH_NUM);
 $stmt2->closeCursor();
 if(empty($matchname)){
 return 0;

} else {
     echo "User Name Taken";
}
}


function regClient($uname, $email, $pword) {
$db = get_db();
$stmt = $db->prepare('INSERT INTO account (user_name, email, password) VALUES (:user_name, :email, :password);');
$stmt->bindValue(':user_name', $uname, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $pword);
$stmt->execute();

}

header("Location: $new_page");
die();

?>