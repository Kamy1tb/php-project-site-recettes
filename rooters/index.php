<?php
require_once("../view/acceuil.php");
include('../controler/recetteController.php');
include('../controler/LogIncontroller.php');
include('../controler/NewsControler.php');
include('../controler/noteController.php');
session_start();
if(isset($_POST['logout'])){
    session_destroy();
    $home = new Acceuil();
    $home->afficher_acceuil();  
}
else{
    if (isset($_POST['submit']) == 'submit' ){
        if(isset($_POST['id_recette'])){
        $controller_recette = new Recette_controler();
            
        $controller_recette->get_recette($_POST['id_recette']);
        }
        elseif (isset($_POST['login']) && isset($_POST['password']) ){
            
            $home = new LogIn_controler();
            $home->afficher_page($_POST['login'],$_POST['password']);
        }
        elseif (isset($_POST['catégorie'])){
            $catégorie = new Recette_controler();
            $catégorie->get_catégorie($_POST['catégorie']);
        }
        
        
    
    }
    elseif(isset($_GET['diapo'])){
        if (isset($_GET['id_recette'])){
            $controller_recette = new Recette_controler();
            $controller_recette->get_recette($_GET['id_recette']);
        } else{
            $controller_news = new News_controler();
            $controller_news->get_news($_GET['id_news']);
        }
    }
    elseif(isset($_POST['noter'])){
        $controller = new Note_controler();
        $controller->noter($_POST['id_recette'],$_SESSION['id_user'],$_POST['note']);
    }
    else{
            $home = new Acceuil();
            $home->afficher_acceuil();  
    }
}


?>