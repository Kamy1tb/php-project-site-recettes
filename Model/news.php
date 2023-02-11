<?php
require_once('../Model/Database.php');
class News extends Database_model
{
    public function getAllnews(){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * FROM `news` WHERE valide = 1');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            $this->closeBdd($pdo);
            return $data;
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function getnews($news){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * FROM `news` WHERE news.id_news='.$news);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            $this->closeBdd($pdo);
            return $data;
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }
}

?>
