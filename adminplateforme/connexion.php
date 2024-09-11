<?php
    $user = "root";
    $pass = "";

    //Test de la connexion à la base de données
    try{
        $conn = new PDO('mysql:host=localhost;dbname=supermarche',$user,$pass);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOEXCEPTION $e){
        print"Erreur !:". $e -> getMessage() .'<br>';
        die();
    }
    $fuseau_horaire = new DateTimeZone("Africa/Porto-Novo");
    $date_actuelle = new DateTime("now",$fuseau_horaire);
?>