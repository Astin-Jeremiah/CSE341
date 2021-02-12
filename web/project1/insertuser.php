  
<?php

$uname = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$pword = password_hash($password, PASSWORD_DEFAULT);
$existingemail = checkExistingEmail($email);
$existinguname = checkExistinguname($uname);

if($existingemail){
        $message = '<p class="message">That email address already exists.</p>';
    exit;
    }

if($existinguname){
        $message = '<p class="message">That username already exists.</p>';
    exit;
    }

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$stmt = $db->prepare('INSERT INTO account (user_name, email, password) VALUES (:user_name, :email, :password);');
$stmt->bindValue(':user_name', $uname, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $pword);
$stmt->execute();


$new_page = "login.php";

header("Location: $new_page");
die();

// Check for an existing email address
function checkExistingEmail($email) {
 $db = get_db();
 $sql = 'SELECT email FROM account WHERE email = :email';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
 $stmt->execute();
 $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
 $stmt->closeCursor();
 if(empty($matchEmail)){
 return 0;

} else {
 return 1;

}
}

function checkExistinguname($uname) {
 $db = get_db();
 $sql = 'SELECT user_name FROM account WHERE user_name = :user_name';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':email', $clientEmail, PDO::PARAM_STR);
 $stmt->execute();
 $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
 $stmt->closeCursor();
 if(empty($matchEmail)){
 return 0;

} else {
 return 1;

}
}

?>