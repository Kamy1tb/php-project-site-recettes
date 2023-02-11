<?php
require_once('../Model/Database.php');
class Idée_recette extends Database_model
{
    public function getRecette_idée($ids_ingrédiants){
        try {
            $pdo = $this->setBdd();
            $i = 0;
            foreach ($ids_ingrédiants as $id_ingrédiants){
                if ($i == 0){
                    $reqPar = 'id_ingrédiant = '.$id_ingrédiants ;
                }
                else{
                    $reqPar = $reqPar.' OR '.' id_ingrédiant = '.$id_ingrédiants ;
                }
                $i++;
            }
            $req = $pdo->prepare('SELECT table_nb.id_recette,table_nb.nb_ingr from ( SELECT COUNT(id_ingrédiant) as nb_ingr, recette.* from recette_ingrediant,recette WHERE recette.id_recette= recette_ingrediant.id_recette and ('.$reqPar.') GROUP By id_recette ) as table_nb');
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

    public function get_pourcentage(){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * from idee_recette_value');
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            $req->closeCursor();
            $this->closeBdd($pdo);
            return $data["pourcentage"];
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function set_pourcentage($pourcentage){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('UPDATE  `idee_recette_value` SET pourcentage= '.$pourcentage.' WHERE 1');
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    
}

?>