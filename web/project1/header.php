<div class="container text-end">
    <a href='index.php'><i class="bi bi-house-door-fill" id='home' title='Home'></i></a>
          <?php
    if (isset ($_SESSION['userid'])){
        echo "<a href='accountinfo.php'><i class='bi bi-person-circle' id='login' title='Account Information'></i></a> <a href='logoff.php'><i class='bi bi-door-closed-fill' id='out' title='Logout'></i></a>";
    } else {
        echo " <a href='login.php'><i class='bi bi-person-circle' id='login' title='Login'></i></a>";
    }
    ?>
</div>