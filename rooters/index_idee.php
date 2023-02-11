<?php
include('../controler/idées_recetteController.php');
session_start();
    if (isset($_POST['search'])){
        $controller = new IdéeeRecette_controler();
        $controller->afficher_page($_POST['id_ingrédiants']);
    }
    else{
        $controller = new IdéeeRecette_controler();
        $controller->afficher_formulaire();
    }

    



?>