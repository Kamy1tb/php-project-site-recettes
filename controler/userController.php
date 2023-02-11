<?php
require_once('../Model/User.php');
require_once('../view/GestionUser.php');
class User_controler
{
    public function get_AllUser()
    {
        $table = new User();
        $dat = $table->getAllUsers();

        $interface = new GestionUser_view($dat);
        $interface->afficher_acceuil();
        
    }

    public function deleteUser($id_user){
        $table = new User();
        $table->deleteUser($id_user);
        $dat = $table->getAllUsers();
        $interface = new GestionUser_view($dat);
        $interface->afficher_acceuil();
    }

    public function suspendreUser($id_user){
        $table = new User();
        $table->suspendreUser($id_user);
        $dat = $table->getAllUsers();
        $interface = new GestionUser_view($dat);
        $interface->afficher_acceuil();
       
    }

    public function validerUser($id_user){
        $table = new User();
        $table->validerInscription($id_user);
        $dat = $table->getAllUsers();
        $interface = new GestionUser_view($dat);
        $interface->afficher_acceuil();
    }


}