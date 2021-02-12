<?php
echo ($_POST["userid"]);
echo ($_POST["programid"]);
echo ($_POST["review"]);

/*require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

$uname = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$pword = htmlspecialchars($_POST['password']);
$hash =  password_hash($pword, PASSWORD_DEFAULT);
$existinguname = checkExistinguname($uname);
$existingemail = checkExistingEmail($email);
$regOutcome = regClient($uname, $email, $hash);

function checkExistinguname($uname) {
 $db = get_db();
 $stmt2 = $db->prepare('SELECT user_name FROM account WHERE user_name = :uname');
 $stmt2->bindValue(':uname', $uname, PDO::PARAM_STR);
 $stmt2->execute();
 $matchname = $stmt2->fetch(PDO::FETCH_NUM);
 if($matchname >= 1){
 $pageerror = "register.php?success=1";    
 header("Location: $pageerror");
die();
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
     die();
}
}


function regClient($uname, $email, $hash) {
$db = get_db();
$stmt = $db->prepare('INSERT INTO account (user_name, email, password) VALUES (:user_name, :email, :password);');
$stmt->bindValue(':user_name', $uname);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $hash);
$stmt->execute();
    
$new_page = "login.php";    
header("Location: $new_page");
    
die();

}*/

?>