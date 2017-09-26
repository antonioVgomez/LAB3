<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="favicon/favicon.ico" type="image/png">
        <title>
            Silver Jack
        </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <?php
            include 'functions.php';
        ?>
    </head>
    <body>
        <h1 id="title">Silver Jack</h1>
        <hr id="sj">
        <div id="main">
            <?php 
                
                echo "<div id='p1'>";  
                        randomPeople();
                echo "</div>";
                
                echo "<div id='win'>";
                determineWinner($people);
                echo "</div>";
            ?>
        </div>
        
        <hr id="ft">
        <footer>
            CST336 2017&copy; Hutt, Solomon, Kirn, Villagomez
        </footer>
    </body>
</html>