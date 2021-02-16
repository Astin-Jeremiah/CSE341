<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';

if ($_SESSION['userlevel'] < 3){
	header("Location: index.php");
    die();
}else {

$showname = htmlspecialchars($_POST['showname']);
$desc = htmlspecialchars($_POST['description']);
$service = htmlspecialchars($_POST['service']);
$link = '../images/';
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Content Suggestion</title>

      <link href="../../bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
      <link href="style.css" rel="stylesheet">
      <script src="script.js"></script>
    </head>
  <body class="bg-secondary">
 <header>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/project1/header.php'; ?>
</header>
      <div class="container">
      <main>
<div class="py-3 text-center">
      <a href="index.php"><img class="img-fluid" src="../../images/logo.png" alt="Stream Central Logo"></a>
    </div>
    
      <div class="card col-md-6 offset-md-3 p-2">
                <h4 class="mb-3">Write To Database</h4>

                <div class="message">
                <?php
                    if (isset($_GET['success']) && $_GET['success'] == 1 ){
                     echo "<h6>Suggestion Submitted</h6>";
                    } else if (isset($_GET['success']) && $_GET['success'] == 2 ){
                     echo "<h6>Title Already In Database</a>.</h6>";
                    }
                ?>
                </div>
                <form action="addtodb.php" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="showname" class="form-label">Show/Move Name</label>
                            <input type="text" class="form-control" id="showname" name="showname" value="<?php echo $showname; ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class='form-control' id='description' name='description'><?php echo $desc; ?></textarea>
                        </div>
                      <div class="col-md-6">
                            <label for="service" class="form-label">Streaming Service</label>
                            <input type="text" class="form-control" id="service" name="service" value="<?php echo $service; ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label for="link" class="form-label">Image Link (Add File Extension)</label>
                            <input type="text" class="form-control" id="link" name="link" value="<?php echo $link; ?>"required>
                        </div>
                    </div><br>
                        <input type="submit" class="btn btn-dark" value="Write To Database">
            </form>    
          </div>   
      </main>
    </div> 
  </body>
</html>