<?php
require_once('../Model/diaporama.php');
require_once('../view/option.php');
require_once('../Model/idées_recette.php');
class Optioncontroler
{
    private function getDiaporama()
    {
        $table = new Diaporama();
        $data = $table->getDiaporama();
        return $data;
    }

    public function insertDiaporama($id_type,$id,$image,$contenu,$valide){

        $tab = new Diaporama();
        if ($id_type == "id_recette"){
            $tab->setDiaporamaRecette($id, $image, $contenu, $valide);

        } else{
            $tab->setDiaporamaNews($id, $image, $contenu, $valide);
        }

        $this->afficherDiapo();

    }

    public function deleteDiaporama($id_diaporama){
        $tab = new Diaporama();
        $tab->deleteDiaporama($id_diaporama);
        $this->afficherDiapo();

    }

    public function unsetDiaporama($id_diaporama){
        $tab = new Diaporama();
        $tab->unsetDiaporama($id_diaporama);
        $this->afficherDiapo();

    }


    public function setDiaporama($id_diaporama){
        $tab = new Diaporama();
        $tab->setDiaporama($id_diaporama);
        $this->afficherDiapo();

    }

    public function afficherDiapo(){
        $dat = $this->getDiaporama();
        $interface = new Option_view($dat);
        $interface->afficher_acceuil();
    }

    public function afficher_form(){
        $dat = $this->getDiaporama();
        $interface = new Option_view($dat);
        $interface->afficher_form();
    }

    public function set_pourcentage($pourcentage){
        $tab = new Idée_recette();
        $tab->set_pourcentage($pourcentage);
        $dat = $this->getDiaporama();
        $interface = new Option_view($dat);
        $interface->afficher_acceuil();
    }
}