<?php
include('../Model/Recette.php');
include('../view/recette_template.php');
include('../view/Gestionrecette.php');
include('../view/editRecette.php');
include('../view/new_recette.php');
class GestionRecette_controler
{
    public function get_Allrecettes()
    {
        $table = new Recette();
        $dat = $table->getAllrecettes();
        $interface = new Gestionrecette_view($dat);
        $interface->afficher_acceuil();
        
    }

    public function afficher_edit_recette($id_recette){
        $table = new Recette();
        $dat = $table->getRecetteEdit($id_recette);
        $ingr = $table->getIngrédiantRecette($id_recette);
        $allingr = $table->getAllIngrédiant();
        $étapes = $table->getEtapesRecette($id_recette);
        $interface = new Editrecette_view($dat[0],$ingr,$allingr,$étapes);
        $interface->afficher_acceuil();
    }

    public function editer_recette($id_recette,$titre,$description,$image,$difficulté,$temps_prép,$temps_cuiss,$temps_rep,$catégorie,$valider,$vidéo,$id_ingrédiants,$quantités,$étapes){
        $table = new Recette();
        $table->deleteIngrédiants($id_recette);
        $table->addIngrédiants($id_recette, $id_ingrédiants, $quantités);
        $table->deleteEtapes($id_recette);
        $table->addEtapes($id_recette, $étapes);
        if ($image == "./assets/recettes/"){
            $table->editRecette($id_recette,$titre,$description,"",$difficulté,$temps_prép,$temps_cuiss,$temps_rep,$catégorie,$valider,$vidéo);
        }
        else{
            $table->editRecette($id_recette,$titre,$description,$image,$difficulté,$temps_prép,$temps_cuiss,$temps_rep,$catégorie,$valider,$vidéo);
        }
        
        $dat = $table->getAllrecettes();
        $interface = new Gestionrecette_view($dat);
        $interface->afficher_acceuil();
      
    }

    public function supprimer_recette($id_recette){
        $table = new Recette();
        $table->deleteRecette($id_recette);
        $dat = $table->getAllrecettes();
        $interface = new Gestionrecette_view($dat);
        $interface->afficher_acceuil();
    }

    public function formulaire_new_recette(){
        $table = new Recette();
        $allingr = $table->getAllIngrédiant();
        $interface = new NewRecette_view($allingr);
        $interface->afficher_acceuil();
    }

    public function ajouter_recette($titre,$description,$image,$difficulté,$temps_prép,$temps_cuiss,$temps_rep,$catégorie,$valider,$vidéo,$ingrédiants,$étapes,$quantité){
        $table = new Recette();
        $table->ajoutter_recette($titre, $description, $image, $difficulté, $temps_prép, $temps_cuiss, $temps_rep, $catégorie, $valider, $vidéo);
        $id_recette = $table->getIdRecettebyName($titre);
        $table->addEtapes($id_recette['0']['id_recette'], $étapes);
        $table->addIngrédiants($id_recette['0']['id_recette'], $ingrédiants, $quantité);
        $dat = $table->getAllrecettes();
        $interface = new Gestionrecette_view($dat);
        $interface->afficher_acceuil();
        
    }


}