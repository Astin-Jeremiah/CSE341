<div class="container text-end">
        <a href='login.php'><i class='bi bi-person-circle' id='login'></i></a>
          <?php
    if (isset ($_SESSION['loggedin'])){
        echo "|</p><span><a href='#' title='logout'>Logout</a></span>";
    }?>
</div>