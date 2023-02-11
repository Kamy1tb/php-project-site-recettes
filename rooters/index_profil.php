<?php
include('../controler/profilController.php');
session_start();
$controller = new Profil_controler();
if(isset($_POST['add'])){
    $controller->inserer_suggest($_POST['titre'],$_POST['description'],$_POST['image'],$_POST['difficulté'],$_POST['T_prep'],$_POST['T_cuis'],$_POST['T_rep'],$_POST['catégorie'],$_POST['vidéo'],$_POST['ingrédiants'],$_POST['étapes'],$_POST['quantité']);
}
else{
    $controller->afficher_profil();
}





?>