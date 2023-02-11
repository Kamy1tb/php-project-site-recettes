<?php
include('../controler/LogIncontroller.php');
    if(isset($_POST['inscription'])){
        $controller = new LogIn_controler();
        $controller->validerInscription($_POST['nom'],$_POST['prénom'],$_POST['mail'],$_POST['password'],$_POST['date_de_naissance'],$_POST['sexe']);

    }
    else{
        $controller = new LogIn_controler();
        $controller->afficher_inscriptions();
    }
    

?>