<?php
include('../controler/nutrition_controller.php');

session_start();
    $controller = new Nutrition_controler();

    $controller->get_ingrédiants();


?>