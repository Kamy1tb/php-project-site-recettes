<?php
include('../controler/gestionIngrédiants.php');

 if (isset($_GET['add_ingrédiant'])){
            $controller = new GestionIngrédiant_controler();
            $controller->formAdd();

        }else{
            if(isset($_POST['add_ingr'])){
                $controller = new GestionIngrédiant_controler();
                $controller->ajouterIngrédiant($_POST['nom'], $_POST['image'], $_POST['healthy'], $_POST['saison'], $_POST['unité'], $_POST['calories']);
            }
            else{
                if (isset($_GET['delete'])){
                    $controller = new GestionIngrédiant_controler();
                    $controller->deleteIngrédiant($_GET['id_ingrédiant']);
                }
                else {
                    if(isset($_GET['submit'])){
                        $controller = new GestionIngrédiant_controler();
                        $controller->formEdit($_GET['id_ingrédiant']);
    
                    } else{
                        if (isset($_POST['edit'])){
                            $controller = new GestionIngrédiant_controler();
                            $controller->updateIngrédiant($_POST['id_ingrédiant'],$_POST['nom'],$_POST['image'],$_POST['healthy'],$_POST['saison'],$_POST['unité'],$_POST['calories']);
                        }
                            else {
                                $controller = new GestionIngrédiant_controler();
                                $controller->get_AllIngrédiants();
                            }
                    }
                    
                    
                }
            }
            
            
        }

  



?>