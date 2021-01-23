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
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>

    <link href="../../bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="img-fluid" src="../../images/pop.png" alt="Pop Culture Vinyl Logo">
                <br>
                <h1>Your Cart</h1>
            </div>

            <div class="row g-3">
                <div class="col-md-6 offset-md-3">
                    <ul class="list-group mb-3">
                        <?php   
        if(isset($_SESSION['cart']))
        {
            $money = array();
            foreach($_SESSION['cart'] as $id)
            {
                echo "<li class='list-group-item d-flex justify-content-between lh-sm'>
                <div>
                <h6 class='my-0'> <form action='' method='post'><input type='hidden' name='number' value='$id'><button type='submit' class='btn btn-link' value='Remove'><i class='bi bi-x-circle'></i></button>";
                echo $id;
                echo "</form>
                    </h6>
                    </div>
                    <span>";
                echo '$'.$price[$id].'</span></li>';
                array_push($money, $price[$id]);
                $key = (int)$id-1;
            }
        }
        ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span><strong>Total</strong></span>
                            <strong><?php echo '$'.array_sum($money);?></strong>
                        </li>
                    </ul>
                    <div class="text-center">
                        <a class="btn btn-outline-danger btn-lgy" href="items.php" role="button">Continue Shopping</a>
                        <a class="btn btn-outline-danger btn-lgy" href="checkout.php" role="button">Complete Checkout</a>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="form-validation.js"></script>
</body>

</html>
