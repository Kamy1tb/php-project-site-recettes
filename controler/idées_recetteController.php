<?php
require_once('../Model/idées_recette.php');
require_once('../Model/Recette.php');
require_once('../Model/ingrédiant.php');
require_once('../view/catégorie_template.php');
require_once("../view/formulaire_idee.php");
class IdéeeRecette_controler
{
    public function afficher_formulaire(){
        $tab = new Ingrédiant();
        $form = new Formulaire_idée_view($tab->getAllIngrédiants());
        $form->afficher_acceuil();
    }

    public function afficher_page($ids_ingrédiants){
        $tab = new Idée_recette();
        $pourcentage = $tab->get_pourcentage();
        $arr = $tab->getRecette_idée($ids_ingrédiants);
        $len = count($ids_ingrédiants);
        $i = 0;
        $ids = [];
        foreach ($arr as $a){
            $a['nb_ingr'] = $a['nb_ingr'] / $len;
            if ($a['nb_ingr'] < ($pourcentage * 0.01)){
                unset($arr[$i]);
            }
            else{
                array_push($ids,$a['id_recette']);
            }
           $i ++ ;
        }
        if($ids == []){
        $tab = new Ingrédiant();
        $form = new Formulaire_idée_view($tab->getAllIngrédiants());
        $form->afficher_acceuilNoresult();
        }
        else{
        $recettes = new Recette();
        $recettes_data = $recettes->getRecetteIDS($ids);
        $max_cal = $recettes->max_calorieId();
        $interface = new Catégorie_template($recettes_data,$max_cal[0]);
        $interface->afficher_acceuil();
        }
        
    
        
        
    }

}