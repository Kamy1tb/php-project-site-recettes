<?php
require_once('../Model/Database.php');
class Login extends Database_model
{
    public function verifymail($mail){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT EXISTS(SELECT * from user WHERE mail = :mail ) AS mail');
            $req->bindParam(':mail',$mail,PDO::PARAM_STR);
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
    public function verifyLogin($mail,$password){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT id_user,nom,prenom,valide from user WHERE mail = :mail AND mot_de_passe = :password ');
            $req->bindParam(':mail',$mail,PDO::PARAM_STR);
            $req->bindParam(':password',$password,PDO::PARAM_STR);
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

    public function inscription($nom,$prenom,$mail,$mdp,$date_de_naissance,$sexe){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('INSERT INTO user (`nom`,`prenom`,`mail`,`sexe`,`date_naissance`,`mot_de_passe`,`valide`) VALUES (:nom,:prenom,:mail,:sexe,:datenaissance,:mdp,0)');
            $req->bindParam(':nom',$nom,PDO::PARAM_STR);
            $req->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $req->bindParam(':mail',$mail,PDO::PARAM_STR);
            $req->bindParam(':sexe',$sexe,PDO::PARAM_STR);
            $req->bindParam(':datenaissance',$date_de_naissance,PDO::PARAM_STR);
            $req->bindParam(':mdp',$mdp,PDO::PARAM_STR);
            $req->execute();
            $req->closeCursor();
            $this->closeBdd($pdo);
        }
        catch(Exception $e)
        {
            echo "Problem" ;
        }

    }

    public function verifyLoginAdmin($pseudo,$password){
        try {
            $pdo = $this->setBdd();
            $req = $pdo->prepare('SELECT id_admin,nom,prenom from admin WHERE pseudo = :pseudo AND mot_de_passe = :password ');
            $req->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
            $req->bindParam(':password',$password,PDO::PARAM_STR);
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