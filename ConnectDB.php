<?php


 class ConnectDB{
    
    public function GetMysqli(){
        session_start();
        
        return $this->MysqliConnection();

    }
    public function SetMysqli($username, $password){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        
        return $this->MysqliConnection();
        
        
       
    }
    private function MysqliConnection(){
        $mysqli = new mysqli('localhost', $_SESSION['username'], $_SESSION['password'] , 'opgaveforjulemanden'); //Laver en connection til databasen
        $SESSION['mysqli'] = $mysqli;

        //Hvis der er en fejl med a lave en connection med databasen stopper den ellers sender den dig vidre til DB.php
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
       
        return $mysqli;  
    }
   
}