<!DOCTYPE html>
<html>
    <head>
        
        <title>
            Silver Jack
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <?php
            include 'functions.php';
        ?>
    </head>
    <body>
        <h1>Silver Jack</h1>
        <div id="main">
            <?php 
            
                echo "<div id='p1'>";  
                        displayPerson($person1);
                echo "</div>";
                
                echo "<div id='p2'>";  
                        displayPerson($person2);
                echo "</div>";
                
                echo "<div id='p3'>";  
                        displayPerson($person3);
                echo "</div>";
                
                echo "<div id='p4'>";  
                        displayPerson($person4);
                echo "</div>";
                // play(); 
            ?>
        </div>
        
        <hr>
        <footer>
            CST336 2017&copy; Hutt, Solomon, Kirn, Villagomez
        </footer>
    </body>
</html>