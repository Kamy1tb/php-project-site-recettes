<?php
require_once("../controler/userController.php");
$controller = new User_controler();
if (isset($_POST['suspendre'])){
    $controller->suspendreUser($_POST['id_user']);
}elseif(isset($_POST['valider'])){
    $controller->validerUser($_POST['id_user']);
}elseif(isset($_POST['supprimer'])){
    $controller->deleteUser($_POST['id_user']);
} else{
    
    $controller->get_AllUser();
}

?>