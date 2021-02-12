<div class="container text-end">
        <a href='login.php'><i class='bi bi-person-circle' id='login'></i></a>
          <?php
    if (isset ($_SESSION['username'])){
        echo "<h4 id='header'>| <a href='logoff.php' title='logout'>Logout</a></h4>";
    }?>
</div>