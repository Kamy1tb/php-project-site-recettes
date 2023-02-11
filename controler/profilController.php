<?php
require_once('../Model/Recette.php');
require_once('../Model/Note.php');
require_once("../view/profil_template.php");
class Profil_controler
{
    public function afficher_profil(){
        $rec = new Recette();
        $note = new Note();
        $best = $note->getmeilleursnotesUser($_SESSION['id_user']);
        $recettes_sug = $rec->getUserSuggestions($_SESSION['id_user']);
        $formulaire = new Profil_view($rec->getAllIngrédiant(),$recettes_sug,$best);
        $formulaire->afficher_profil();
    }

    public function inserer_suggest($titre,$description,$image,$difficulté,$temps_prép,$temps_cuiss,$temps_rep,$catégorie,$vidéo,$ingrédiants,$étapes,$quantité){
        $rec = new Recette();
        $rec->insertSuggestion($titre,$description,$image,$difficulté,$temps_prép,$temps_cuiss,$temps_rep,$catégorie,$vidéo);
        $id_recette = $rec->getlastkey();
        $rec->addEtapes($id_recette['id_recette'], $étapes);
        $rec->addIngrédiants($id_recette['id_recette'], $ingrédiants, $quantité);
        $rec->setUserSuggestion($_SESSION['id_user'], $id_recette['id_recette']);
        $this->afficher_profil();
    }
   

}