<!DOCTYPE html>
<html lang="dk">
<head>
    <title>Document</title>
</head>
<body>
    
    <form method="post" >
        <input type="text" name="username" placeholder="Brugernavn">
        <input type="password" name="password" placeholder="Kode">
        <input type="submit" name="submit">
    </form>
    
    <?php
        

        if(isset($_POST['submit'])){
            //Her gemmer de brugernavnet og koden så vi kan bruge vores connection til databasen senere 
            session_start();
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];

            
            require_once('ConnectDB.php');
            $connectDB = new ConnectDB();
            $connectDB->GetDBConnection();  //Denne laver en connection to databasen 
            

            header('location:DB.php');
        }
    ?>

</body>
</html>