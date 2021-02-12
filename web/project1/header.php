<div class="container text-end">
        <i class="bi bi-person-circle" id="login"></i>
          <?php
    if (isset ($_SESSION['loggedin'])){
        echo "<a href='login.php'><i class='bi bi-person-circle' id='login'></i></a>|</p><span><a href='#' title='logout'>Logout</a></span>";
    } else {
        echo "<a href='login.php'><i class='bi bi-person-circle' id='login'></i></a>";
    }?>
      
</div>