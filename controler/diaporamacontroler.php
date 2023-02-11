<?php
require_once('../Model/diaporama.php');
class Diaporama_controler
{
    public function getDiaporama_valide_Controler()
    {
        $table = new Diaporama();
        $data = $table->getDiaporamavalide();
        return $data;
    }
}