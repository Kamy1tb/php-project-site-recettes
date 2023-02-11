<?php
require_once('../Model/Database.php');
class Ingrédiant extends Database_model
{

    public function getAllIngrédiants(){
        try {
            $pdo = $this->setBdd();
          
            $req = $pdo->prepare('SELECT * from ingrediant ');
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
    public function getIngrédiantInfo($id_ingrédiant){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * from ingrediant WHERE id_ingrédiant = '.$id_ingrédiant);
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

    public function ajouterIngrédiant($nom,$image,$healthy,$saison,$unité,$calories){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('INSERT INTO ingrediant (nom,image,healthy,saison,unité,calories) VALUES (:nom,:image,:healthy,:saison,:unite,:calories)');
            $req->bindParam(':nom',$nom,PDO::PARAM_STR);
            $req->bindParam(':image',$image,PDO::PARAM_STR);
            $req->bindParam(':healthy',$healthy,PDO::PARAM_INT);
            $req->bindParam(':saison',$saison,PDO::PARAM_STR);
            $req->bindParam(':unite',$unité,PDO::PARAM_STR);
            $req->bindParam(':calories',$calories,PDO::PARAM_STR);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function updateIngrédiant($id_ingrédiant,$nom,$image,$healthy,$saison,$unité,$calories){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('UPDATE ingrediant SET nom = :nom ,image = :img,healthy = :healthy ,saison = :saison ,unité = :unite ,calories = :calories WHERE id_ingrédiant = :id_ingrediant');
            $req->bindParam(':nom',$nom,PDO::PARAM_STR);
            $req->bindParam(':img',$image,PDO::PARAM_STR);
            $req->bindParam(':healthy',$healthy,PDO::PARAM_INT);
            $req->bindParam(':saison',$saison,PDO::PARAM_STR);
            $req->bindParam(':unite',$unité,PDO::PARAM_STR);
            $req->bindParam(':calories',$calories,PDO::PARAM_STR);
            $req->bindParam(':id_ingrediant',$id_ingrédiant,PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
            
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }
    public function deleteIngrédiant($id_ingrédiant){
            
        try {
        $pdo =$this->setBdd();
        $req = $pdo-> prepare("DELETE FROM ingrediant WHERE id_ingrédiant = ".$id_ingrédiant); 
        $req-> execute();
        $req->closeCursor() ;
            }
            catch(Exception $e)
            {
                echo "Problem" ;
            }
}
}

?>