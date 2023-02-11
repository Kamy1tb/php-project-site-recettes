<?php
require_once('../Model/Login.php');
require_once('../view/adminacceuil.php');
require_once('../view/formulaireAdmin.php');

class LogInAdmin_controler
{
 
    private function verify_Login($pseudo,$password)
    {
        $table = new Login();
        $verification = $table->verifyLoginAdmin($pseudo,$password);
        return $verification;
    }

    public function afficher_page($pseudo,$password){
        if ( $this->verify_Login($pseudo, $password) == []){
            $this->afficher_Formulaire();
        }
        else {
    
        $interface = new Adminacc_view();
        $interface->afficher_acceuil();

        }
    }

    public function connected(){
        $interface = new Adminacc_view();
        $interface->afficher_acceuil();
    }

    public function afficher_Formulaire(){
        $form = new AdminForm_view();
        $form->afficher_acceuil();
    }
}