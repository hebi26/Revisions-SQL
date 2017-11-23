<?php

function getResult( $select ){

    try{
        $pdo = new PDO('mysql:host=localhost;dbname=base_etudiants','root','root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

    }
    catch(PDOException $e){
        echo 'Connexion impossible';
    }

    $sql = $pdo->query($select);
    $reponse = $sql->fetchAll();
//    var_dump($reponse);
    return $reponse;
}


//-------------------- Connexion a la base de donnée-----------------//

