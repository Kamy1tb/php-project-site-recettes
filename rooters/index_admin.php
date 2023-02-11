<?php
include('../controler/gestionRecettes.php');
if (isset($_GET['submit'])) {
    if ($_GET['submit'] == "éditer") {
        $controller = new GestionRecette_controler();
        $controller->afficher_edit_recette($_GET['id_recette']);

    } 
    elseif ($_GET['submit'] == "delete"){
        $controller = new GestionRecette_controler();
        $controller->supprimer_recette($_GET['id_recette']);
    }
}
else{
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST['edit'])){
        $controller = new GestionRecette_controler();
        $controller->editer_recette($_POST['id_recette'],$_POST['titre'],$_POST['description'],$_POST['image'],$_POST['difficulté'],$_POST['T_prep'],$_POST['T_cuis'],$_POST['T_rep'],$_POST['catégorie'],$_POST['valider'],$_POST['vidéo'],$_POST['ingrédiants'],$_POST['quantité'],$_POST["étapes"]);
        } else{
            if (isset($_POST['add'])){
                $controller = new GestionRecette_controler();
                $controller->ajouter_recette($_POST['titre'],$_POST['description'],$_POST['image'],$_POST['difficulté'],$_POST['T_prep'],$_POST['T_cuis'],$_POST['T_rep'],$_POST['catégorie'],$_POST['valider'],$_POST['vidéo'],$_POST['ingrédiants'],$_POST['étapes'],$_POST['quantité']);
                }
        }
        
    }
    else{
        if (isset($_GET['add_recette'])){
            $controller = new GestionRecette_controler();
            $controller->formulaire_new_recette();

        }else{
            $controller = new GestionRecette_controler();
            $controller->get_Allrecettes();
        }
   
    }
    
}

  



?>