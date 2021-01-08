<?php

class OutputDB
{
public function DisplayDB($mysqli, $db){


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
        echo "<tr>";
        for ($i = 0; $i< count($row)/2; $i++){
            echo "<td>";
            echo "$row[$i]";
            echo "</td>"; 
        }
        echo "</tr>";   
    }
    echo "</table>";
    
    

}


}