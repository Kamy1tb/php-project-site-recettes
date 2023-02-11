<?php
include('../Model/ingrédiant.php');
include('../view/nutrition_template.php');
class Nutrition_controler
{
    public function get_ingrédiants()
    {
        $table = new Ingrédiant();
        $dat = $table->getAllIngrédiants();
        $interface = new Nutrition_view($dat);
        $interface->afficher_acceuil();
    }

}