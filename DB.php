<!DOCTYPE html>
<html lang="dk">
<head>
    <link rel="stylesheet" href="DBstyle.css">
    <title>DB</title>
    <script type="text/javascript" src="Javascript.js"></script>
</head>
<?php
session_start();

require_once ('OutputDB.php');
$outputDB = new OutputDB();

?>
<body>
    <header>
        <Button id="button" onclick="changeForm('gaveForm');">
            Tilføj eller fjern ny gave 
        </Button>
        <Button id="button" onclick="changeForm('reservedelForm')">
            Tilføj eller fjern ny reservedel 
        </Button>
        <Button id="button" onclick="changeForm('lokationForm')">
            Tilføj eller fjern ny lokation 
        </Button>
    </header>
    <main>
        <div>
        <h1>Gaver</h1>
        <?php
        $outputDB->DisplayDB("gaver");//Viser daten indeni databasen 
        ?>
        </div>
        <div>
        <h1>Reservedele</h1>
        <?php
        $outputDB->DisplayDB("reservedele");//Viser daten indeni databasen
        ?>
        </div>
        <div>
        <h1>Lokation</h1>
        <?php
        $outputDB->DisplayDB("lokation");//Viser daten indeni databasen
        ?>
        </div>
        

        <?php 
        require_once ('Forms.php');
        ?>
    </main>
    
    <script> 
        
        
        
    </script>
</body>
</html>