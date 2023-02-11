<?php
require_once('../controler/LoginAdminController.php');
session_start();
$controller = new LogInAdmin_controler();

if (isset($_POST['submit'])) {
    $controller->afficher_page($_POST['login'],$_POST['password']);
}
else{
    
        $controller->afficher_Formulaire();
    
}

?>