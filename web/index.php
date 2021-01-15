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
            <h1 class="m-4 text-dark">About Me</h1>
            <figure class="col1">
                    <img src="images/jeremiah.jpg" alt="Jeremiah Astin"/>
                    <figcaption>Jeremiah Alan Astin</figcaption>
            </figure>
            <p>Hello!  My name is Jeremiah Astin.  I am currently an applied technologies student at Brigham Young University Idaho Online.  I have always been interested in computers and the internet and I have really enjoyed learning how to design and develop websites.</p>
            <p>I was born in Anchorage, Alaska, but my father was in the AirForce so we moved all around the country.  I currently reside in Dayton, Ohio where I have lived for the last 15 years.  I am married to my lovely wife Ashley and we have a baby girl named Karleigh and pit bull named Emma.  In 2010 I graduated with a bachelor’s degree in Marketing from Wright State University.  I currently work as the Director of Ticketing <a href="https://www.daytonlive.org/" target="new">Dayton Live</a>, a local performing arts organization.</p>
            <p>In my spare time I enjoy reading, watching movies, and spending time with my family.  I also enjoy traveling and visiting amusement parks.</p>
        </div>
    </main>
    <footer class="mt-1 footer mt-auto py-2 bg-dark">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/modules/footer.php'; ?>
    </footer>

</body>

</html>