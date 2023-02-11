<?php
require_once('../Model/Database.php');
class MeilleursPlats extends Database_model
{
    public function getCatégorie($catégorie){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT recette.id_recette,recette.titre ,recette.image, recette.description, SUM(note) / COUNT(note) as notes FROM note,recette WHERE note.id_recette= recette.id_recette AND recette.catégorie = "'.$catégorie.'" AND recette.valider = 1 GROUP BY note.id_recette ORDER BY notes DESC LIMIT 10');
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