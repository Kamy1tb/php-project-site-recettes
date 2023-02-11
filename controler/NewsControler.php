<?php
require_once('../Model/news.php');
require_once('../view/news.php');
require_once('../view/news_template.php');
class News_controler
{
    public function get_allnews()
    {
        $table = new News();
        $dat = $table->getAllnews();
        $interface = new News_acceuil($dat);
        $interface->afficher_acceuil();
    }


    public function get_news($id_news){
        $table = new News();
        $dat = $table->getnews($id_news);
        $interface = new Newstemplate_view($dat[0]);
        $interface->afficher_acceuil();
    }

}