<?php
echo "<br>";


if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    
}
    session_start();
    require_once('AlterDBClass.php');
    $alterDBClass = new AlterDBClass();
    $alterDBClass->setMysqli();

if (isset($_POST['submitGaveForm'])){
    
    $alterDBClass->addGave();
    
}
elseif (isset($_POST['submitReservedelForm'])){

    $alterDBClass->addReservedel();

}
elseif (isset($_POST['submitLokationForm'])){

    $alterDBClass->addLokation();
    }

//echo "<br> <a  href='DB.php'> yo </a>";
header('location:DB.php');

