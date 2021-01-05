<?php


 class ConnectDB{
    
    function GetDBConnection(){
    
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        
        $mysqli = new mysqli('localhost', $username, $password, 'opgaveforjulemanden'); //Laver en connection til databasen
        

        //Hvis der er en fejl med a lave en connection med databasen stopper den ellers sender den dig vidre til DB.php
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
       
        return $mysqli;  
        
        
       
    }
}