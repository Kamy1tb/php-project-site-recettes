<?php
require_once('../Model/Login.php');
require_once("../view/acceuil.php");
require_once("../view/inscription.php");
class LogIn_controler
{
    public function afficher_inscriptions(){
        $formulaire = new Inscription_view();
        $formulaire->afficher_acceuil();
    }
    private function verify_Login($mail,$password)
    {
        $table = new Login();
        $verification = $table->verifyLogin($mail,$password);
        return $verification;
    }

    public function afficher_page($mail,$password){
        if ( $this->verify_Login($mail, $password) == []){
            $home = new Acceuil();
            $home->afficher_loginfailed("mail ou mot de passe incorrect");
        }
        elseif ($this->verify_Login($mail, $password)[0]['valide']== 1) {
        $_SESSION['nom'] = $this->verify_Login($mail, $password)[0]['nom'];
        $_SESSION['prenom'] = $this->verify_Login($mail, $password)[0]['prenom'];
        $_SESSION['id_user'] = $this->verify_Login($mail, $password)[0]['id_user'];
            
        $home = new Acceuil();
        $home->afficher_acceuil();

        }
        elseif($this->verify_Login($mail, $password)[0]['valide']== 0){
            $home = new Acceuil();
            $home->afficher_loginfailed("votre compte n'est pas encore vérifié");
        }
        
    }

    public function validerInscription($nom,$prenom,$mail,$mdp,$date_de_naissance,$sexe){
        $table = new Login();
        $verify = $table->verifymail($mail);
        if ($verify[0]['mail'] == 1){
            $formulaire = new Inscription_view();
            $formulaire->erreur_mail();
        }
        else {
            $table->inscription($nom, $prenom, $mail, $mdp, $date_de_naissance, $sexe);
            $home = new Acceuil();
            $home->afficher_acceuil();
        }
    }
}