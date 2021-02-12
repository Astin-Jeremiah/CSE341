  
<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$pword = password_hash($password, PASSWORD_DEFAULT);
$existinguname = checkExistinguname($uname);
$existingemail = checkExistingEmail($email);
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
 $message = '<p class="message">That username already exists.</p>';
        include 'register.php';
    exit;
}
}



if($existingemail){
        $message = '<p class="message">That email address already exists.</p>';
        include 'register.php';
    exit;
    }

if($existinguname){
        $message = '<p class="message">That username already exists.</p>';
        include 'register.php';
    exit;
    }


function regClient($uname, $email, $pword) {
$db = get_db();
$stmt = $db->prepare('INSERT INTO account (user_name, email, password) VALUES (:user_name, :email, :password);');
$stmt->bindValue(':user_name', $uname, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $pword);
$stmt->execute();


$new_page = "login.php";

header("Location: $new_page");
die();
}

?>