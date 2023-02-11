<?php
require_once('../Model/Note.php');
require_once('../controler/recetteController.php');
class Note_controler
{
    public function noter($id_recette,$id_user,$note)
    {
        $table = new Note();
        $dat = $table->verifyNote($id_recette,$id_user);
        if ($dat == []){
            $table->Noter($id_recette, $id_user, $note);
            $controller_recette = new Recette_controler();
            $controller_recette->get_recette($id_recette);
        } else{
            $table->updateNote($id_recette, $id_user, $note);
            $controller_recette = new Recette_controler();
            $controller_recette->get_recette($id_recette);
        }
    }

}