<div class="container text-end">
          <?php
    if (isset ($_SESSION['username'])){
        echo "<a href='accountinfo.php'><i class='bi bi-person-circle' id='login'></i></a><span id='header'>|</span><a href='logoff.php' title='logout' id='out'><span class='fs-4 fw-bold'>Logout</span></a>";
    } else {
        echo "<a href='login.php'><i class='bi bi-person-circle' id='login'></i></a>";
    }
    ?>
</div>