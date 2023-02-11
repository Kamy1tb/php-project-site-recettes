<?php
require_once('../controler/optionController.php');

$controller = new Optioncontroler();
if(isset($_POST['add_diapo'])){
    $controller->insertDiaporama($_POST['id_type'],$_POST['id'],$_POST['image'],$_POST['contenu'],$_POST['valider']);

}elseif(isset($_POST['diapo'])) {
    $controller->afficher_form();
} elseif(isset($_POST['supprimer'])){
    $controller->deleteDiaporama($_POST['id_diaporama']);
}
elseif(isset($_POST['valider'])){
    $controller->setDiaporama($_POST['id_diaporama']);
}
elseif(isset($_POST['suspendre'])){
    $controller->unsetDiaporama($_POST['id_diaporama']);
}
elseif(isset($_POST['subpourcentage'])){
    $controller->set_pourcentage($_POST['pourcentage']);
}
else{
    $controller->afficherDiapo();
}


  



?>