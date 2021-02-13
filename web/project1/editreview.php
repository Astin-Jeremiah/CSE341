<?php
$userid = htmlspecialchars($_POST['accountid']);
$programid = htmlspecialchars($_POST['contentid']);
$review = htmlspecialchars($_POST['review']); 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Login</title>

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
      <img class="img-fluid" src="../../images/logo.png" alt="Stream Central Logo">
    </div>
    
      <div class="card col-md-6 offset-md-3 p-2">
                <h4 class="mb-3">Edit Review:</h4>
                <form  action="updatereview.php" method="POST">
                    <div class="row g-3">
                        <div class="col-12">
                            <input type='hidden' id='aid' name='aid' value='$userid'>
                            <input type='hidden' id='cid' name='cid' value='$programid'>
                            <textarea class='form-control' placeholder='Review' id='newreview' name='newreview'><?php echo $review; ?></textarea>
                            <br>
                            <input type='submit' class='btn btn-dark' value='Submit Review'>
                            <a href='#' class='btn btn-dark me-2' role='button'>Delete Review</a>
                        </div>
                    </div>
                </form>   
          </div>   
      </main>
    </div>      
  </body>
</html>