<!DOCTYPE html>
<html lang="dk">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fraunces">
    <title>DB</title>
    <script type="text/javascript" src="Javascript.js"></script>
</head>
<?php
global $mysqli;




require_once('ConnectDB.php');
$connectDB = new ConnectDB();
$mysqli = $connectDB->getMysqli();


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
        $outputDB->DisplayDB($mysqli, "gaver");//Shows the current data in the database 
        ?>
        </div>
        <div>
        <h1>Reservedele</h1>
        <?php
        $outputDB->DisplayDB($mysqli, "reservedele");//Shows the current data in the database 
        ?>
        </div>
        <div>
        <h1>Lokation</h1>
        <?php
        $outputDB->DisplayDB($mysqli, "lokation");//Shows the current data in the database 
        ?>
        </div>
        

        <?php        
        require_once ('Forms.php');
        ?>
    </main>

</body>
</html>