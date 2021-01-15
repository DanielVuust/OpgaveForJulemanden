<?php

class AlterDBClass{
    private $mysqli;
    public function setMysqli(){
        require_once('ConnectDB.php');
        $connectDB = new ConnectDB();
        $this->mysqli = $connectDB->GetMysqli();
    }
    public function addGave(){
        $gaveNavn = $_POST['gaveNavn'];
        $TilføjEllerFjern = $_POST['TilføjEllerFjern'];
        if (isset($_POST['antal'])){
            $antal = $_POST['antal'];
        }
        else{
            $antal = 0;
        }
        if($TilføjEllerFjern=='Tilføj'){
            
            
            //Hvis gaven allerede er tilføjet ændre den bare antallet af gaver 
            $sqlquery = "SELECT antal FROM gaver WHERE gave='$gaveNavn'";
            $result = $this->mysqli->query($sqlquery);
            if ($result->num_rows >0){
                
                while ($row = $result->fetch_assoc()){
                    $sqlquery = "UPDATE gaver SET antal=antal + $antal WHERE gave='$gaveNavn'";
                }
                $this->mysqli->query($sqlquery);
            }
            else {
                //Indsætter en række i gaver 
                $sqlquery = "INSERT INTO gaver (gave, antal) VALUES ('$gaveNavn', '$antal')";
                $reslut = $this->mysqli->query($sqlquery);
                
                //Ændrer lokationer
                $sqlquery = "ALTER TABLE lokation ADD $gaveNavn int(6)";
                $result = $this->mysqli->query($sqlquery);
                $this->updateDB();
            }
            
        }
        elseif($TilføjEllerFjern=='Fjern'){
            //Hvis antallet er nul eller under slettes alle gaverne som har der navn man skrev
            if ($antal<=0 ){
                $sqlquery = "DELETE FROM gaver WHERE gave='$gaveNavn'";
                $this->mysqli->query($sqlquery);
                $sqlquery = "ALTER TABLE lokation DROP COLUMN $gaveNavn";
                $this->mysqli->query($sqlquery);
            }
            //Ellers fjernes der bare nogle 
            else{    
                $sqlquery = "SELECT antal FROM gaver WHERE gave='$gaveNavn'";
                $result = $this->mysqli->query($sqlquery);
    
                if ($result->num_rows > 0 ){
                    while ($row = $result->fetch_assoc()){
                        $num = $row['antal'];
                        //Hvis antallet af en gave er 0 eller under slettes den 
                        if($num - $antal<= 0){
                            $sqlquery = "DELETE FROM gaver WHERE gave='$gaveNavn'";
                            $this->mysqli->query($sqlquery);
                            $sqlquery = "ALTER TABLE lokation DROP COLUMN $gaveNavn";
                            $this->mysqli->query($sqlquery);
                        }
                        else {
                            $sqlquery = "UPDATE gaver SET antal=antal -$antal WHERE gave='$gaveNavn'";
                            $this->mysqli->query($sqlquery);
                        }
                    }
                }
                
                
            }
        
        }
    }
    public function addReservedel(){
        $reservedelNavn = $_POST['reservedelNavn'];
        $TilføjEllerFjern = $_POST['TilføjEllerFjern'];
        
        if (isset($_POST['antal'])){
            $antal = $_POST['antal'];
        }
        else{
            $antal = 9;
        }
        if($TilføjEllerFjern=='Tilføj'){
            $sqlquery = "SELECT antal FROM reservedele WHERE reservedel='$reservedelNavn'";
            $result = $this->mysqli->query($sqlquery);
            if ($result->num_rows > 0){
                $sqlquery = "UPDATE reservedele SET antal= antal+ $antal WHERE reservedel='$reservedelNavn'";
                $this->mysqli->query($sqlquery);
            }
            else {
            $sqlquery = "INSERT INTO reservedele (reservedel, antal) VALUES ('$reservedelNavn', '$antal')";
            $this->mysqli->query($sqlquery);
            }
        }
        elseif($TilføjEllerFjern=='Fjern'){
            if ($antal <= 0){
                $sqlquery = "DELETE FROM reservedele WHERE reservedel='$reservedelNavn'";
                $this->mysqli->query($sqlquery);
            }
            else{
                $sqlquery = "SELECT antal FROM reservedele WHERE reservedel='$reservedelNavn'";
                $result = $this->mysqli->query($sqlquery);
                if ($result->num_rows > 0 ){
                    while ($row = $result->fetch_assoc()){
                    $num = $row['antal'];
                    }
                }
                $num = $num -$antal;
                if($num <= 0){
                    $sqlquery = "DELETE FROM reservedele WHERE reservedel='$reservedelNavn'";
                    $this->mysqli->query($sqlquery);
                }
                else {
                    $sqlquery = "UPDATE reservedele SET antal=$num WHERE reservedel='$reservedelNavn'";
                    $this->mysqli->query($sqlquery);
                }
            }
    
        }
    }
    public function addLokation(){
        
        
        $adresse = $_POST['adresse'];
        
        if ($_POST['TilføjEllerFjern'] == 'Tilføj'){
            $sqlquery = "SELECT adresse FROM lokation WHERE adresse='$adresse'";
            $result = $this->mysqli->query($sqlquery);
            
            
            if ($result->num_rows == 0){
                $sqlquery = "INSERT INTO lokation (adresse) VALUE ('$adresse')";
                $this->mysqli->query($sqlquery);
            }
            
            $sqlquery ="SHOW COLUMNS FROM lokation";
            $columns = $this->mysqli->query($sqlquery);
            
            

            while ($column = mysqli_fetch_array($columns)){
                echo "<br>--------------------------<br><br>$column[0]<br>";
                if ($column[0]=='id' || $column[0] == 'adresse'){
                    continue;
                }
                if (empty($_POST[$column[0]])){
                    $antal = 0;
                }
                else{
                    $antal = $_POST[$column[0]];
                }
                $sqlquery = "SELECT * FROM lokation WHERE adresse='$adresse'";
            $result = $this->mysqli->query($sqlquery);
                while ($row = $result->fetch_assoc()){
                    if (is_null($row[$column[0]])){
                        $sqlquery = "UPDATE lokation SET $column[0]=  $antal WHERE adresse='$adresse'";
                    }
                    else{
                        $sqlquery = "UPDATE lokation SET $column[0]=  $column[0] + $antal WHERE adresse='$adresse'";
                    }
                }
                echo $sqlquery;
                $result = $this->mysqli->query($sqlquery);
                if ($result){
                    echo "success";
                }
                else{
                    echo "no success ):";
                }
            }
        }
        elseif ($_POST['TilføjEllerFjern'] == "Fjern"){
            
            $sqlquery ="SHOW COLUMNS FROM lokation";
            $columns = $this->mysqli->query($sqlquery);
            while ($column = mysqli_fetch_array($columns)){
                if ($column[0] == 'id' || $column[0] == 'adresse'){
                    continue;
                }
                $antal = $_POST[$column[0]];
                if ($antal == 0){
                    continue;
                }
                $sqlquery = "UPDATE lokation SET $column[0]=$column[0]-$antal WHERE adresse='$adresse'";
                $this->mysqli->query($sqlquery);
            }            
        }
    }

    private function updateDB(){
        $sqlquery = "SHOW COLUMNS FROM lokation";
        $columns = $this->mysqli->query($sqlquery);
        while ($column = mysqli_fetch_array($columns)){
            
            $sqlquery = "SELECT * from lokation WHERE id>'0'";
            $result = $this->mysqli->query($sqlquery);
            while ($row = mysqli_fetch_array($result)){
                if (is_null($row[$column[0]])){
                    $sqlquery = "UPDATE lokation SET $column[0] = 0" ;
                    $this->mysqli->query($sqlquery);
                }         
            }
        }
    }



}