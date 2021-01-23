<?php

session_start();

if(isset($_POST['number']))
                    {
                    $index = array_search($_POST['number'],$_SESSION["cart"]);
                    unset($_SESSION["cart"][$index]);
                    }

            $price = array(
                "Stitch Funko Pop" => 13.99,
                "Bill Nye Funko Pop" => 9.99,
                "Forky Funko Pop" => 15.99,
                "Winifred Sanderson Funko Pop" => 16.99,
                "Mary Sanderson Funko Pop" => 13.99,
                "Sarah Sanderson Funko Pop" => 13.99,
                "Frozone Funko Pop" => 7.99,
                "Jim Henson Funko Pop" => 17.99,
                "Little Green Alien Funko Pop" => 8.99
            );

        if (isset($_GET["destroy"])){
    session_destroy();
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Confirmation</title>

    <link href="../../bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet">

</head>

<body class="bg-light">
    <header>
        <div class="container text-end">
            <form action="items.php" method="post">
                <button type="submit" class="special" name="destroy" value="true"><i class="bi bi-house-door" style="font-size: 35px; color: black;" id="cart"></i></button>
            </form>
        </div>
    </header>

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="img-fluid" src="../../images/pop.png" alt="Pop Culture Vinyl Logo">
                <br>
                <h1>Order Confirmation</h1>
            </div>

            <div class="row g-3">
                <div class="col-md-6 offset-md-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span><strong><u>Shipping Information</u></strong>
                                <br>
                                <?php echo htmlspecialchars($_POST["firstname"])." ".htmlspecialchars($_POST["lastname"])."<br>".htmlspecialchars($_POST["address1"])."<br>".htmlspecialchars($_POST["city"])." ".htmlspecialchars($_POST["state"])." ".htmlspecialchars($_POST["zip"])."<br>".htmlspecialchars($_POST["email"]);?>
                            </span>
                        </li>
                        <span class="list-group-item">
                            <strong><u>Items</u></strong>
                            <?php   
        if(isset($_SESSION['cart']))
        {
            $money = array();
            foreach($_SESSION['cart'] as $id)
            {
                echo "<li class='d-flex justify-content-between lh-sm'>
                <div>
                <p class='my-0'>";
                echo $id;
                echo "</p>
                    </div>
                    <span>";
                echo '$'.$price[$id].'</span></li>';
                array_push($money, $price[$id]);
                $key = (int)$id-1;
            }
        }
        ?>
                        </span>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><strong>Total</strong></span>
                            <strong><?php echo '$'.array_sum($money);?></strong>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="form-validation.js"></script>
</body>

</html>
