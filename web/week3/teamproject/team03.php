<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Team Activity | 03</title>
</head>

    <form action="results.php" method="post">
        
        <p><strong>Name:</strong><br><input type="text" name="name"></p>
        
        <p><strong>E-mail:</strong><br><input type="text" name="email"></p>
        
        <span>
            <strong>Major</strong>
        </span>
        <br>
        
        <?php 
            
            $majors=array("Computer Science", "Web Design And Development", "Computer Infomation Technology", "Computer Engineering"); 
        
            foreach ($majors as $value) {
                echo "<input type='radio' name='major' value='$value'>$value <br>";
            }
        
        ?>
        
        
        
        <p>
            <span><strong>Continents Visited</strong></span><br>
            <input type="checkbox" name="continents[]" value="NA">North America<br>
            <input type="checkbox" name="continents[]" value="SA">South America<br>
            <input type="checkbox" name="continents[]" value="EU">Europe<br>
            <input type="checkbox" name="continents[]" value="AS">Asia<br>
            <input type="checkbox" name="continents[]" value="AU">Australia<br>
            <input type="checkbox" name="continents[]" value="AF">Africa<br>
            <input type="checkbox" name="continents[]" value="AN">Antarctica<br>
        </p>
        
        
        <span>
            <label for="comments"><strong>Comments</strong></label>
        </span>
        <br>
        <textarea rows="10" cols="40" id="comments" name="comments"></textarea>
            
        
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
    
<body>
</body>
</html>
