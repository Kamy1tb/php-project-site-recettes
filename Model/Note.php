<?php
require_once('../Model/Database.php');

class Note extends Database_model
{
    public function verifyNote($id_recette,$id_user){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT note FROM note WHERE id_recette = :id_recette AND id_user = :id_user');
            $req->bindParam(':id_recette',$id_recette,PDO::PARAM_INT);
            $req->bindParam(':id_user',$id_user,PDO::PARAM_INT);
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

    public function getNumbervotes($id_recette){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT COUNT(id_user) as nb_vote FROM note WHERE id_recette = :id_recette GROUP BY id_recette');
            $req->bindParam(':id_recette',$id_recette,PDO::PARAM_INT);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            $req->closeCursor();
            $this->closeBdd($pdo);
            if($data != []){
                return $data[0]['nb_vote'];
            } else{
                return 0;
            }
            
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function updateNote($id_recette,$id_user,$note){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('UPDATE note SET note = :note  WHERE id_recette = :id_recette AND id_user = :id_user');
            $req->bindParam(':id_recette',$id_recette,PDO::PARAM_INT);
            $req->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $req->bindParam(':note',$note,PDO::PARAM_STR);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function Noter($id_recette,$id_user,$note){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('INSERT INTO note (`id_recette`,`id_user`,`note`) VALUES (:id_recette,:id_user,:note)');
            $req->bindParam(':id_recette',$id_recette,PDO::PARAM_INT);
            $req->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $req->bindParam(':note',$note,PDO::PARAM_STR);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function getmeilleursnotesUser($id_user){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT recette.* FROM note,recette WHERE note.id_user = :id_user AND recette.id_recette = note.id_recette AND (note.note = 4 OR note.note = 5)  GROUP BY recette.id_recette');
            $req->bindParam(':id_user',$id_user,PDO::PARAM_INT);
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
