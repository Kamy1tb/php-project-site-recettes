<?php
require_once('../Model/Database.php');
class User extends Database_model
{
    public function getAllUsers(){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT * FROM user');
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

    public function validerInscription($id_user){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('UPDATE user SET `valide` = 1 WHERE id_user = :id_user');
            $req->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }

    }

    public function suspendreUser($id_user){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('UPDATE user SET `valide` = 0 WHERE id_user = :id_user');
            $req->bindParam(':id_user',$id_user,PDO::PARAM_INT);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }
    }

    public function deleteUser($id_user){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('DELETE FROM user  WHERE id_user = :id_user');
            $req->bindParam(':id_user',$id_user,PDO::PARAM_INT);
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