<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . '/modules/dbConnect.php';
$db = get_db();

$query2 = 'SELECT * FROM service';
$stmt2 = $db->prepare($query2);
$stmt2->execute();
$serv = $stmt2->fetchAll(PDO::FETCH_ASSOC);

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
                <h4 class="mb-3">Suggest New Account</h4>
                <p>Suggest your favorite streaming movie or television series to be added to our site.</p>
                <div class="message">
                <?php
                    if (isset($_GET['success']) && $_GET['success'] == 1 ){
                     echo "<h6>Suggestion Submitted</h6>";
                    } else if (isset($_GET['success']) && $_GET['success'] == 2 ){
                     echo "<h6>Title Already In Database</a>.</h6>";
                    }
                ?>
                </div>
                <form action="suggestcontent.php" method="post">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="showname" class="form-label">Show/Move Name</label>
                            <input type="text" class="form-control" id="showname" name="showname" required <?php if(isset($username)){echo "value='$username'";}  ?>>
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class='form-control' id='description' name='description'><?php if(isset($email)){echo "value='$email'";}  ?></textarea>
                        </div>
                      <div class="col-12">
                            <label for="select">Streaming Service</label>
                            <select class="form-select" name="service" id="service">
                            <?php
                            foreach ($serv as $service)
                            {
                            $id2 = $service['id'];
                            $servicename = $service['service_name'];
                            echo "<option value='$id2'>$servicename</option>";
                            }
                            ?>
                            </select>
                        </div>  
                    </div><br>
                        <input type="submit" class="btn btn-dark" value="Create Account">
            </form>    
          </div>   
      </main>
    </div> 
  </body>
</html>