<div class="container text-end">
    <a href='index.php'><i class="bi bi-house-door-fill" id='home'></i></a>
          <?php
    if (isset ($_SESSION['username'])){
        echo "<a href='accountinfo.php'><i class='bi bi-person-circle' id='login'></i></a> <a href='logout.php'><i class='bi bi-person-circle' id='login' id='out'></i></a>;
    } else {
        echo " <a href='login.php'><i class='bi bi-person-circle' id='login'></i></a>";
    }
    ?>
</div>