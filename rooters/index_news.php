<?php
include('../controler/NewsControler.php');
include('../controler/recetteController.php');

session_start();
if (isset($_GET['submit']) == 'submit' ){
    if(isset($_GET['id_recette'])){
    $controller_recette = new Recette_controler();
    $controller_recette->get_recette($_GET['id_recette']);
    }
    else{
        if(isset($_GET['id_news'])){
            $controller_news = new News_controler();
            $controller_news->get_news($_GET['id_news']);
        }
    }
    

}
else{

    $controller = new News_controler();

    $controller->get_allnews();

}

?>