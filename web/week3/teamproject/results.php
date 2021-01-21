<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Form Results | 03</title>
<link href="team03.css" rel="stylesheet" type="text/css">
</head>
    
    <span>Welcome <?php echo htmlspecialchars($_POST["name"]); ?></span><br>
    
    <br>
    
    <span>Your email address is: <a href="mailto:<?php echo htmlspecialchars($_POST["email"]); ?>"><?php echo $_POST["email"]; ?></a></span><br>
    
    <br>
    
    <span>Your Major is: <?php echo htmlspecialchars($_POST["major"]); ?></span><br>
    
    <br>
    
    <span>You Visited: 
        
        <?php
            $con_map = array(
                "NA" => "North America",
                "SA" => "South America",
                "EU" => "Europe",
                "AS" => "Asia",
                "AU" => "Australia",
                "AF" => "Africa",
                "AN" => "Antarctica"
            );
        
        
        if(isset($_POST['continents']))
        {
            foreach($_POST['continents'] as $id)
            {
                echo $con_map[$id].' ';
            }
        }
        ?>
</span>
    <br>
    <br>
    
    <span>Your comment was: <?php echo htmlspecialchars($_POST["comments"]); ?> </span><br>

<body>
</body>
</html>