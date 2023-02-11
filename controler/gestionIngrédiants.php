<?php
include('../Model/ingrédiant.php');
include('../view/GestionIngrédiant.php');
include('../view/editIngrédiant.php');
include('../view/new_ingrédiant.php');
class GestionIngrédiant_controler
{
    public function get_AllIngrédiants()
    {
        $table = new Ingrédiant();
        $dat = $table->getAllIngrédiants();
        $interface = new GestionIngrédiant_view($dat);
        $interface->afficher_acceuil();
        
    }

    public function deleteIngrédiant($id_ingrédiant){
        $table = new Ingrédiant();
        $table->deleteIngrédiant($id_ingrédiant);
        $dat = $table->getAllIngrédiants();
        $interface = new GestionIngrédiant_view($dat);
        $interface->afficher_acceuil();

    }

    public function formEdit($id_ingrédiant){
        $table = new Ingrédiant();
        $dat = $table->getIngrédiantInfo($id_ingrédiant);
        $interface = new EditIngrédiant_view($dat[0]);
        $interface->afficher_acceuil();
    }

    public function updateIngrédiant($id_ingrédiant,$nom,$image,$healthy,$saison,$unité,$calories){
        $table = new Ingrédiant();
        $table->updateIngrédiant($id_ingrédiant,$nom,$image,$healthy,$saison,$unité,$calories);
        $dat = $table->getAllIngrédiants();
        $interface = new GestionIngrédiant_view($dat);
        $interface->afficher_acceuil();

    }

    public function formAdd(){
        $interface = new NewIngrédiant_view();
        $interface->afficher_acceuil();
    }

    public function ajouterIngrédiant($nom,$image,$healthy,$saison,$unité,$calories){
        $table = new Ingrédiant();
        $table->ajouterIngrédiant($nom, $image, $healthy, $saison, $unité, $calories);
        $dat = $table->getAllIngrédiants();
        $interface = new GestionIngrédiant_view($dat);
        $interface->afficher_acceuil();
    }


}