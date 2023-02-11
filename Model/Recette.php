<?php
require_once('../Model/Database.php');
class Recette extends Database_model
{
    public function getRecette($id_recette){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT recette.id_recette, recette.titre ,recette.catégorie,recette.image,recette.vidéo, recette.description,recette.difficulté,recette.calories ,`recette`.`temps de préparation`,`recette`.`temps de repos`, `recette`.`temps de cuisson`,`recette`.`temps de préparation`+`recette`.`temps de repos`+ `recette`.`temps de cuisson` as `temps total`,SUM(note.note)/ COUNT(note.note) as notes FROM ( SELECT recette.*,SUM(ingrediant.calories * recette_ingrediant.quantité) as calories FROM recette,recette_ingrediant,ingrediant WHERE recette.id_recette = recette_ingrediant.id_recette AND recette_ingrediant.id_ingrédiant= ingrediant.id_ingrédiant AND recette.id_recette= '.$id_recette.' GROUP BY recette.id_recette ) as recette LEFT JOIN note ON recette.id_recette = note.id_recette GROUP BY recette.id_recette ');
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
    public function getAllIngrédiant(){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * FROM ingrediant');
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
    public function getIngrédiantRecette($id_recette){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT ingrediant.*,recette_ingrediant.quantité from recette_ingrediant,recette,ingrediant WHERE recette_ingrediant.id_ingrédiant = ingrediant.id_ingrédiant AND recette_ingrediant.id_recette= recette.id_recette AND recette.id_recette ='.$id_recette.' GROUP BY recette_ingrediant.id_recette,recette_ingrediant.id_ingrédiant');
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

    public function getEtapesRecette($id_recette){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT ordre,contenu FROM `etapes` WHERE id_recette = '.$id_recette.' ORDER BY ordre ASC ');
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


    public function getRecetteCatégorie($catégorie){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT recette.id_recette, recette.titre ,recette.catégorie,recette.image, recette.description,recette.difficulté,recette.calories ,`recette`.`temps de préparation`,`recette`.`temps de repos`, `recette`.`temps de cuisson`,`recette`.`temps de préparation`+`recette`.`temps de repos`+ `recette`.`temps de cuisson` as `temps total`,SUM(note.note)/ COUNT(note.note) as notes FROM ( SELECT recette.*,SUM(ingrediant.calories * recette_ingrediant.quantité) as calories FROM recette,recette_ingrediant,ingrediant WHERE recette.id_recette = recette_ingrediant.id_recette AND recette_ingrediant.id_ingrédiant= ingrediant.id_ingrédiant AND recette.catégorie= "'.$catégorie.'" GROUP BY recette.id_recette ) as recette LEFT JOIN note ON recette.id_recette = note.id_recette GROUP BY recette.id_recette ');
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
    public function getIdRecettebyName($titre){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT id_recette FROM recette WHERE titre = :titre');
            $req->bindParam(':titre',$titre,PDO::PARAM_STR);
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
    public function getRecetteIDS($ids_recette){
        $i = 0;
        foreach ($ids_recette as $id_recette){
                if ($i == 0){
                    $reqPar = 'recette.id_recette = '.$id_recette ;
                }
                else{
                    $reqPar = $reqPar.' OR '.' recette.id_recette = '.$id_recette ;
                }
                $i++;

        }
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT recette.id_recette, recette.titre ,recette.catégorie,recette.image, recette.description,recette.difficulté,recette.calories ,`recette`.`temps de préparation`,`recette`.`temps de repos`, `recette`.`temps de cuisson`,`recette`.`temps de préparation`+`recette`.`temps de repos`+ `recette`.`temps de cuisson` as `temps total`,SUM(note.note)/ COUNT(note.note) as notes FROM ( SELECT recette.*,SUM(ingrediant.calories * recette_ingrediant.quantité) as calories FROM recette,recette_ingrediant,ingrediant WHERE recette.id_recette = recette_ingrediant.id_recette AND recette_ingrediant.id_ingrédiant= ingrediant.id_ingrédiant AND ('.$reqPar.') GROUP BY recette.id_recette ) as recette LEFT JOIN note ON recette.id_recette = note.id_recette GROUP BY recette.id_recette ');
            
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

    public function max_calorie($catégorie){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT MAX(calories.calories)  as cal_max FROM calories,recette WHERE  calories.id_recette = recette.id_recette AND recette.catégorie= "'.$catégorie.'"  ');
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

    public function max_calorieId(){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT MAX(calories.calories)  as cal_max FROM calories,recette WHERE  calories.id_recette = recette.id_recette   ');
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

    public function getAllrecettes(){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * FROM recette');
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

    public function getRecetteEdit($id_recette){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * FROM recette WHERE id_recette = '.$id_recette);
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
    public function ajoutter_recette($titre,$description,$image,$difficulté,$temps_prép,$temps_cuiss,$temps_rep,$catégorie,$valider,$vidéo){
        try {
            $pdo =$this->setBdd();
            $query = 'INSERT INTO `recette` (`id_recette`, `titre`, `image`, `description`, `difficulté`, `temps de préparation`, `temps de repos`, `temps de cuisson`, `catégorie`, `valider`, `vidéo`) VALUES (NULL, "'.$titre.'", "'.$image.'", "'.$description.'", "'.$difficulté.'", "'.$temps_prép.'", "'.$temps_rep.'", "'.$temps_cuiss.'", "'.$catégorie.'", '.$valider.', "'.$vidéo.'");' ;
            $req = $pdo-> prepare($query); 
            $req-> execute();
            $req->closeCursor() ;
            }
            catch(Exception $e)
            {
                echo "Problem" ;
            }
    }
    public function editRecette($id_recette,$titre,$description,$image,$difficulté,$temps_prép,$temps_cuiss,$temps_rep,$catégorie,$valider,$vidéo){
        try {
        $pdo =$this->setBdd();
        $query = 'UPDATE  recette SET titre = "'.$titre.'", description = "'.$description.'", image = "'.$image.'", difficulté = "'.$difficulté.'", `temps de préparation` = "'.$temps_prép.'",  `temps de cuisson` = "'.$temps_cuiss.'",  `temps de repos` = "'.$temps_rep.'", catégorie = "'.$catégorie.'", valider = '.$valider.', vidéo = "'.$vidéo.'" WHERE id_recette = '.$id_recette.'' ;
        $req = $pdo-> prepare($query); 
        $req-> execute();
        $req->closeCursor() ;
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
        
    }

    public function deleteRecette($id_recette){
            
            try {
            $pdo =$this->setBdd();
            $req = $pdo-> prepare("DELETE FROM recette WHERE id_recette = ".$id_recette); 
            $req-> execute();
            $req->closeCursor() ;
                }
                catch(Exception $e)
                {
                    echo "Problem" ;
                }
    }
    public function deleteEtapes($id_recette){
        try {
            $pdo =$this->setBdd();
            $req = $pdo-> prepare("DELETE FROM etapes WHERE id_recette = ".$id_recette); 
            $req-> execute();
            $req->closeCursor() ;
                }
                catch(Exception $e)
                {
                    echo "Problem" ;
                }
    }
    public function deleteIngrédiants($id_recette){
        try {
            $pdo =$this->setBdd();
            $req = $pdo-> prepare("DELETE FROM recette_ingrediant WHERE id_recette = ".$id_recette); 
            $req-> execute();
            $req->closeCursor() ;
                }
                catch(Exception $e)
                {
                    echo "Problem" ;
                }

    }

    public function addEtapes($id_recette,$étapes){
        try {
            $pdo =$this->setBdd();
            $i = 1 ;
            foreach ($étapes as $étape){
            $req = $pdo-> prepare('INSERT INTO etapes (id_recette,contenu,ordre) VALUES ('.$id_recette.',"'.$étape.'",'.$i.')'); 
            $req-> execute();
            $req->closeCursor() ;
            $i++;
            }
            
                }
                catch(Exception $e)
                {
                    echo "Problem" ;
                }

    }

    public function addIngrédiants($id_recette,$id_ingrédiants,$quantités){
        try {
            $pdo =$this->setBdd();
            $i = 0 ;
            foreach ($id_ingrédiants as $id_ingrédiant){
            $req = $pdo-> prepare("INSERT INTO recette_ingrediant (id_recette,id_ingrédiant,quantité) VALUES (".$id_recette.",".$id_ingrédiant.",".$quantités[$i].")"); 
            $req-> execute();
            $req->closeCursor() ;
            $i++;
            }
            
                }
                catch(Exception $e)
                {
                    echo "Problem" ;
                }

    }

    public function insertSuggestion($titre,$description,$image,$difficulté,$temps_prép,$temps_cuiss,$temps_rep,$catégorie,$vidéo){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('INSERT into recette (`id_recette`,titre,description,image,difficulté,`temps de préparation`,`temps de cuisson`,`temps de repos`,`catégorie`,`valider`,`vidéo`) VALUES (NULL,:titre,:description,:image,:difficulte,:temps_prep,:temps_cuis,:temps_rep,:categorie,0,:video);');
            
            $req->bindParam(':titre',$titre,PDO::PARAM_STR);
            $req->bindParam(':description',$description,PDO::PARAM_STR);
            $req->bindParam(':image',$image,PDO::PARAM_STR);
            $req->bindParam(':difficulte',$difficulté,PDO::PARAM_STR);
            $req->bindParam(':temps_prep',$temps_prép,PDO::PARAM_STR);
            $req->bindParam(':temps_cuis',$temps_cuiss,PDO::PARAM_STR);
            $req->bindParam(':temps_rep',$temps_rep,PDO::PARAM_STR);
            $req->bindParam(':categorie',$catégorie,PDO::PARAM_STR);
            $req->bindParam(':video',$vidéo,PDO::PARAM_STR);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function getlastkey(){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT id_recette from recette ORDER BY id_recette DESC LIMIT 1');
            $req->execute();
            $dat = $req->fetch();
            $req->closeCursor();
            $this->closeBdd($pdo);
            return $dat;
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }

    }

    public function setUserSuggestion($id_user,$id_recette){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('INSERT INTO recette_sugg (`id_recette`,`id_user`) VALUES (:id_recette,:id_user)');
            $req->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $req->bindParam(':id_recette',$id_recette,PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }

    }

    public function getUserSuggestions($id_user){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT recette.* from recette,recette_sugg WHERE recette_sugg.id_user = :id_user AND recette.id_recette = recette_sugg.id_recette GROUP BY recette.id_recette');
            $req->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $req->execute();
            $dat = $req->fetchAll();
            $req->closeCursor();
            $this->closeBdd($pdo);
            return $dat;
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

}

?>