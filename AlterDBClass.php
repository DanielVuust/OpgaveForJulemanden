<?php

class AlterDBClass{
    private $mysqli;
    
    public function addGave($TilføjEllerFjern, $gaveNavn, $antal, $mysqli){
        if($TilføjEllerFjern=='Tilføj'){
            
            
            //Hvis gaven allerede er tilføjet ændre den bare antallet af gaver 
            $sqlquery = "SELECT antal FROM gaver WHERE gave='$gaveNavn'";
            $result = $mysqli->query($sqlquery);
            if ($result->num_rows >0){
                $num;
                while ($row = $result->fetch_assoc()){
                    $num = $row['antal'];
                    $num += $antal;
                $sqlquery = "UPDATE gaver SET antal='$num' WHERE gave='$gaveNavn'";
                }
                $mysqli->query($sqlquery);
            }
            else {
            //Indsætter en to række i gaver 
            $sqlquery = "INSERT INTO gaver (gave, antal) VALUES ('$gaveNavn', '$antal')";
            $mysqli->query($sqlquery);
            //Ændrer lokations 
            $sqlquery = "ALTER TABLE lokation ADD $gaveNavn INT(6)";
            $mysqli->query($sqlquery);
            }
            
        }
        elseif($TilføjEllerFjern=='Fjern'){
            //Hvis antallet er nul eller under slettes alle gaverne som har der navn man skrev
            if ($antal<=0 ){
                $sqlquery = "DELETE FROM gaver WHERE gave='$gaveNavn'";
                $mysqli->query($sqlquery);
                $sqlquery = "ALTER TABLE lokation DROP COLUMN $gaveNavn";
                $mysqli->query($sqlquery);
            }
            //Ellers fjernes der bare nogle 
            else{    
                $sqlquery = "SELECT antal FROM gaver WHERE gave='$gaveNavn'";
                $result = $mysqli->query($sqlquery);
    
                if ($result->num_rows > 0 ){
                    while ($row = $result->fetch_assoc()){
                    $num = $row['antal'];
                    }
                }
                //Hvis antallet af en gave er 0 eller under slettes den 
                $num = $num - $antal;
                if($num <= 0){
                    $sqlquery = "DELETE FROM gaver WHERE gave='$gaveNavn'";
                    $mysqli->query($sqlquery);
                    $sqlquery = "ALTER TABLE lokation DROP COLUMN $gaveNavn";
                    $mysqli->query($sqlquery);
                }
                else {
                    $sqlquery = "UPDATE gaver SET antal='$num' WHERE gave='$gaveNavn'";
                    $mysqli->query($sqlquery);
                }
            }
        
        }
    }
    public function addReservedel($TilføjEllerFjern, $reservedelNavn, $antal, $mysqli){
        if($TilføjEllerFjern=='Tilføj'){

            $sqlquery = "INSERT INTO reservedele (reservedel, antal) VALUES ('$reservedelNavn', '$antal')";
            $mysqli->query($sqlquery);
            
        }
        elseif($TilføjEllerFjern=='Fjern'){
            if ($antal >= 0){
                $sqlquery = "DELETE FROM reservedele WHERE reservedel='$reservedelNavn'";
                $mysqli->query($sqlquery);
            }
            else{
                $sqlquery = "SELECT antal FROM reservedele WHERE reservedel='$reservedelNavn'";
                $result = $mysqli->query($sqlquery);
                echo "y0";
                if ($result->num_rows > 0 ){
                    while ($row = $result->fetch_assoc()){
                    $num = $row['antal'];
                    }
                }
                $num = $num - $antal;
                if($num <= 0){
                    $sqlquery = "DELETE FROM reservedele WHERE reservedel='$reservedelNavn'";
                    $mysqli->query($sqlquery);
                }
                else {
                    $sqlquery = "UPDATE reservedele SET antal='$num' WHERE reservedele='$reservedelNavn'";
                    $mysqli->query($sqlquery);
                }
            }
    
        }
    }



}