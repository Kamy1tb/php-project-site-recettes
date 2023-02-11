<?php
require_once('../Model/Database.php');
class Diaporama extends Database_model
{
    public function getDiaporama(){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * FROM diaporama');
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
    public function getDiaporamavalide(){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * FROM diaporama WHERE valide = 1');
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
    public function setDiaporamaNews($id_news,$image,$contenu,$valide){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('INSERT INTO diaporama (`id_news`,`contenu`,`valide`,`image`) VALUES (:id_news,:contenu,:valide,:image)');
            $req->bindParam(":id_news", $id_news, PDO::PARAM_INT);
            $req->bindParam(":contenu", $contenu, PDO::PARAM_STR);
            $req->bindParam(":valide", $valide, PDO::PARAM_INT);
            $req->bindParam(":image", $image, PDO::PARAM_STR);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function setDiaporamaRecette($id_recette,$image,$contenu,$valide){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('INSERT INTO diaporama (`id_recette`,`contenu`,`valide`,`image`) VALUES (:id_recette,:contenu,:valide,:image)');
            $req->bindParam(":id_recette", $id_recette, PDO::PARAM_INT);
            $req->bindParam(":contenu", $contenu, PDO::PARAM_STR);
            $req->bindParam(":valide", $valide, PDO::PARAM_INT);
            $req->bindParam(":image", $image, PDO::PARAM_STR);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function unsetDiaporama($id_diaporama){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('UPDATE diaporama SET valide = 0 WHERE id_diaporama = :id_diaporama');
            $req->bindParam(":id_diaporama", $id_diaporama, PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }

    }

    public function setDiaporama($id_diaporama){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('UPDATE diaporama SET valide = 1  WHERE id_diaporama = :id_diaporama');
            $req->bindParam(":id_diaporama", $id_diaporama, PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }

    }

    public function deleteDiaporama($id_diaporama){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('DELETE from diaporama  WHERE id_diaporama = :id_diaporama');
            $req->bindParam(":id_diaporama", $id_diaporama, PDO::PARAM_INT);
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