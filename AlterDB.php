<?php
echo "<br>";


if(isset($_POST['submit'])){
    echo "yooooooo";
    $username=$_POST['username'];
    $password=$_POST['password'];

    
}
    session_start();
    require_once('ConnectDB.php');
    $connectDB = new ConnectDB();
    $mysqli = $connectDB->GetDBConnection();

    require_once('AlterDBClass.php');
    $alterDBClass = new AlterDBClass();
    

if (isset($_POST['submitGaveForm'])){
    $gaveNavn = $_POST['gaveNavn'];
    $TilføjEllerFjern = $_POST['TilføjEllerFjern'];
    if (isset($_POST['antal'])){
        $antal = $_POST['antal'];
    }
    else{
    $antal = 0;
    }
    $alterDBClass->addGave($TilføjEllerFjern, $gaveNavn, $antal,$mysqli);
    
}
elseif (isset($_POST['submitReservedel'])){
    $reservedelNavn = $_POST['reservedelNavn'];
    $TilføjEllerFjern = $_POST['TilføjEllerFjern'];
    if (isset($_POST['antal'])){
        $antal = ($_POST['antal']);
    }
    else{
        $antal = 10;
    }

    $alterDBClass->addReservedel($TilføjEllerFjern, $reservedelNavn, $antal,$mysqli);

}
elseif (isset($_POST['submitLokation'])){

}
header('location:DB.php');



