<? php   
session_start();
if (isset($_SESSION['url2'])) {
            $url = $_SESSION['url2'];
            header("Location: $url");
             die();
}
?>