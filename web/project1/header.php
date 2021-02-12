<div class="container text-end">
        <a href='login.php'><i class='bi bi-person-circle' id='login'></i></a>
          <?php
    if (isset ($_SESSION['username'])){
        echo "<sppanid='header'>|</span><a href='logoff.php' title='logout' id='out'><h4>Logout</h4></a>";
    }?>
</div>