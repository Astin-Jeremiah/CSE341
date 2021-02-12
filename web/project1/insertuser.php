  
<?php

require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$pword = password_hash($password, PASSWORD_DEFAULT);
$existinguname = checkExistinguname($uname);



function checkExistinguname($uname) {
 $db = get_db();
 $stmt2 = $db->prepare('SELECT user_name FROM account WHERE user_name = :uname');
 $stmt2->bindValue(':uname', $uname, PDO::PARAM_STR);
 $stmt2->execute();
 $matchname = $stmt2->fetch(PDO::FETCH_NUM);
 if($matchname >= 1){
 $pageerror = "register.php?success=1";    
 header("Location: $pageerror");
     end;
} else {
    $existingemail = checkExistingEmail($email);
 }
}

function checkExistingEmail($email) {
 $db = get_db();
$stmt3 = $db->prepare('SELECT email FROM account WHERE email = :email');
 $stmt3->bindValue(':email', $email, PDO::PARAM_STR);
 $stmt3->execute();
 $matchEmail = $stmt3->fetch(PDO::FETCH_NUM);
 if($matchEmail >= 1){
 $pageerror = "register.php?success=2";    
 header("Location: $pageerror");
     end;
} else {
     $regOutcome = regClient($uname, $email, $pword); 
 }
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