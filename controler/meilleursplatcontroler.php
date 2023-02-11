<?php
require_once('../Model/Meilleursplats.php');
class Meilleurplat_controler
{
    public function get_catégorie($catégorie)
    {
        $table = new MeilleursPlats();
        $data = $table->getCatégorie($catégorie);
        return $data;
    }

}