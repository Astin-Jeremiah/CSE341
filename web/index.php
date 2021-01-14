<!DOCTYPE HTML>
<html lang="en-us" class="h-100">

<head>
    <meta charset="utf-8">
    <title>CSE 341 Webpage</title>
    <link href="bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="style.css" type="text/css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/4e98ed47d3.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100">
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/header.php'; ?>
    </header>

    <main class="flex-shrink-0">
        <div class="container text-center">
            <h1 class="m-4 text-dark">Jeremiah Astin <br>CSE 341 Portfolio</h1>
            <img class="img-fluid" src="images/family.jpg" alt="Astin Family Photo" />
            <blockquote class="text-danger">“You're off to great palces!<br>Today is your day!<br>Your mountain is waiting.<br>So...get on your way!"<br><span class="text-primary">Dr.Seuss</span></blockquote>
        </div>
    </main>
    <footer class="footer mt-auto py-2 bg-dark">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
    </footer>

</body>

</html>