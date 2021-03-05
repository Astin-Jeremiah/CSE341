<!DOCTYPE HTML>
<html lang="en-us" class="h-100">

<head>
    <meta charset="utf-8">
    <title>CSE 341 Webpage</title>
    <link href="../bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../style.css" type="text/css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/4e98ed47d3.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
    </header>
    <main class="flex-shrink-0">
        <div class="container text-center">
            <h1 class="text-dark">CSE 341 Portfolio</h1>
            <div class="btn-group gap-5">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Week 1
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="../week1/hello.html">Hello World</a></li>
                    </ul>
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Week 2
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="../week2/02TeamActicity.html">Week 2 Team Activity</a></li>
                    </ul>
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Week 3
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="../week3/teamproject/team03.php">Week 3 Team Activity</a></li>
                    <li><a class="dropdown-item" href="../week3/shopping/items.php">Shopping Cart</a></li>
                    </ul>
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Week 5
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="../week5/week5team.php">Week 5 Team Activity</a></li>
                    <li><a class="dropdown-item" href="../week5/teamstretch.php">Week 5 Team Activity Stretch</a></li>
                    <li><a class="dropdown-item" href="../project1/index.php">Week 5 Database Access</a></li>
                    </ul>
                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Week 7
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="../week7/signup.php">Week 7 Team Activity</a></li>
                    </ul>
                <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Project 1
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="../project1/index.php">Project 1</a></li>
                    </ul>
            </div>
            
            <div class="btn-group gap-5">
                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Week 9
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="https://calm-journey-75190.herokuapp.com/">Postal Rate Calculator</a></li>
                    </ul>
            </div>
        </div>
    </main>
    <footer class="footer mt-auto py-2 bg-dark">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>