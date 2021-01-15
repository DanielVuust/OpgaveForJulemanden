
<form method="post"  id="gaveForm" class="form" action="AlterDB.php" autocomplete="off">
    <input type="radio" value="Tilføj" name="TilføjEllerFjern">Tilføj
    <input type="radio" value="Fjern" name="TilføjEllerFjern">Fjern
    <br><br>
    <input type="text" name="gaveNavn" placeholder="Navnet på gaven du vil tilføre eller fjerne">
    <br>
    <input type="number" name="antal" placeholder="Antal">
    <br><br>
    <input type="submit" name="submitGaveForm">
    <br><br>
    <input type="button" id="closeForm" style="float:buttom;width:50px;" value="luk"  onclick="removeForms()">
</form>

<form method="post" id="reservedelForm" class="form" action="AlterDB.php" autocomplete="off">
    <input type="radio" value="Tilføj" name="TilføjEllerFjern">Tilføj
    <input type="radio" value="Fjern" name="TilføjEllerFjern">Fjern
    <br><br>
    <input type="text" name="reservedelNavn" placeholder="Navnet på reservedelen du vil tilføre eller fjerne">
    <br>
    <input type="number" name="antal" placeholder="Antal">
    <br><br>
    <input type="submit" name="submitReservedelForm">
    <br><br>
    <input type="button" id="closeForm" style="float:buttom;width:50px;" value="luk"  onclick="removeForms()">
</form>


<form method="post" id="lokationForm" class="form" action="AlterDB.php" autocomplete="off">
    <input type="radio" value="Tilføj" name="TilføjEllerFjern">Tilføj
    <input type="radio" value="Fjern" name="TilføjEllerFjern">Fjern
    <br><br>
    <input type="text" name="adresse" placeholder="Adressem på lokation du vil tilføre eller fjerne" >
    <br><br>
<?php
    $sqlquery = "SELECT gave FROM gaver";
    $result = $mysqli->query($sqlquery);
    while ($row = mysqli_fetch_array($result)){
    
        echo "$row[0]";
        echo "<input type='number' name='$row[0]' placeholder='Antal'>";
        echo "<br>";
    }
        
    
?>
    <br><br>
    <input type="submit" name="submitLokationForm" >
    <br><br>
    <input type="button" id="closeForm" style="float:buttom;width:50px;" value="luk" onclick="removeForms()">
</form>


    



    