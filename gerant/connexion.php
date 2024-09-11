<?php
    $user = "root";
    $pass = "";

    //Test de la connexion à la base de données
    try{
        $connexion = new PDO('mysql:host=localhost;dbname=supermarche',$user,$pass);
        $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOEXCEPTION $e){
        print"Erreur !:". $e -> getMessage() .'<br>';
        die();
    }
?>