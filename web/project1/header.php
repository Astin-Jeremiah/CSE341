<div class="container text-end">
        <a href='login.php'><i class='bi bi-person-circle' id='login'></i></a>
          <?php
    if (isset ($_SESSION['username'])){
        echo "<span id='header'>|</span><a href='logoff.php' title='logout' id='out'><div id='logout'><h4>Logout</h4></div></a>";
    }?>
</div>