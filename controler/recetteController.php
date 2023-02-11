<?php
include('../Model/Recette.php');
include('../view/recette_template.php');
require_once('../Model/Note.php');
include('../view/catégorie_template.php');
class Recette_controler
{
    public function get_recette($id_recette)
    {
        $table = new Recette();
        $tablenote = new Note();
        $avis = $tablenote->getNumbervotes($id_recette);
        $dat = $table->getRecette($id_recette);
        $ingrédiants = $table->getIngrédiantRecette($id_recette);
        $étapes = $table->getEtapesRecette($id_recette);
        $interface = new Recette_view($dat[0],$ingrédiants,$étapes,$avis);
        $interface->afficher_recette();
    }

    

    public function get_catégorie($catégorie){
        $table = new Recette();
        $dat = $table->getRecetteCatégorie($catégorie);
        $interface = new Catégorie_template($dat,$table->max_calorie($catégorie)[0]);
        $interface->afficher_acceuil();
    }


    public function max_calorie($catégorie){
        $table = new Recette();
        $dat = $table->max_calorie($catégorie);
        return $dat;

    }

}