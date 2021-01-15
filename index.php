<!DOCTYPE html>
<html lang="dk">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
    <form method="post" autocomplete="off" class="form" id="loginForm">
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Brugernavn">
        <input type="password" name="password" placeholder="Kode">
        <input type="submit" name="submit">
    </form>
    
    <?php
        

        if(isset($_POST['submit'])){
            //Her gemmer de brugernavnet og koden så vi kan bruge vores connection til databasen senere 
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            
            require_once('ConnectDB.php');
            $connectDB = new ConnectDB();
            $connectDB->SetMysqli($username, $password);  //Denne laver en connection to databasen 
            
            
            header('location:DB.php?');
        }
    ?>

</body>
</html>