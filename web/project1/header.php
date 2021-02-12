<div class="container text-end">
    <a href='index.php'><i class="bi bi-house-door-fill"></i></a>
          <?php
    if (isset ($_SESSION['username'])){
        echo "<span id='header'>|</span><a href='accountinfo.php'><i class='bi bi-person-circle' id='login'></i></a><span id='header'>|</span><a href='logoff.php' title='logout' id='out'><span class='fs-4 fw-bold'>Logout</span></a>";
    } else {
        echo " <a href='login.php'><i class='bi bi-person-circle' id='login'></i></a>";
    }
    ?>
</div>