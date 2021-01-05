<?php

class OutputDB
{
public function DisplayDB($db){

    require_once('ConnectDB.php');
    $connectDB = new ConnectDB();
    $mysqli = $connectDB->GetDBConnection();


    $sqlquery = "SELECT * from $db";

    $result = $mysqli->query($sqlquery);

    $sqlquery ="SHOW COLUMNS FROM $db";
    $columns = $mysqli->query($sqlquery);
    
    echo "<table>";
    echo "<tr>";
    while ($row = mysqli_fetch_array($columns)){
        echo "<th>";
        echo $row[0]." ";
        echo "</th>";
    }
    echo "</tr>";
    while($row = mysqli_fetch_array($result)) {
    $id = $row[0];
    $gave = $row[1];
    $antal = $row[2];

    echo "<tr><td>".$id."</td><td>".$gave."</td><td>". $antal."</td><tr>";
    }
    echo "</table>";
    
    

}


}