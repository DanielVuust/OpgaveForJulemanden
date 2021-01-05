
<form method="post"  id="gaveForm" class="form" action="AlterDB.php">
    <input type="radio" value="Tilføj" name="TilføjEllerFjern">Tilføj
    <input type="radio" value="Fjern" name="TilføjEllerFjern">Fjern
    <br><br>
    <input type="text" name="gaveNavn" placeholder="Navnet på gaven du vil tilføre eller fjerne">
    <br>
    <input type="text" name="antal" placeholder="Antal">
    <br><br>
    <input type="submit" name="submitGaveForm">
    <br><br>
    <input type="button" id="closeForm" style="float:buttom;width:50px;" value="luk"  onclick="removeForm()">
</form>

<form method="post" id="reservedelForm" class="form" action="AlterDB.php" >
    <input type="radio" value="Tilføj" name="TilføjEllerFjern">Tilføj
    <input type="radio" value="Fjern" name="TilføjEllerFjern">Fjern
    <br><br>
    <input type="text" name="reservedelNavn" placeholder="Navnet på reservedelen du vil tilføre eller fjerne">
    <br>
    <input type="text" name="antal" placeholder="Antal">
    <br><br>
    <input type="submit" name="submitReservedel">
    <br><br>
    <input type="button" id="closeForm" style="float:buttom;width:50px;" value="luk"  onclick="removeForm()">
</form>

<form method="post" id="lokationForm" class="form" action="AlterDB.php" >
    <input type="radio" value="Tilføj" name="TilføjEllerFjern">Tilføj
    <input type="radio" value="Fjern" name="TilføjEllerFjern">Fjern
    <br><br>
    <input type="text" name="lokationNavn" placeholder="Navnet på lokation du vil tilføre eller fjerne" >
    <br><br>
    <input type="submit" name="submitlokationForm" >
    <br><br>
    <input type="button" id="closeForm" style="float:buttom;width:50px;" value="luk" onclick="removeForm()">
</form>


    



    