<?php
require_once('../controler/diaporamacontroler.php');
try{
$controller = new Diaporama_controler();
$data = $controller->getDiaporama_valide_Controler();
$i = 0 ;
echo '<div class="carousel-inner">';
foreach ($data as $row) {
    if ($i == 0){
      
        ?>
        
        <div class="carousel-item active" style = "background-image: url('<?php
                echo  $row['image'];?>');height: 47vh;">
        <div class="d-flex justify-content-center align-items-center h-100 mt-5" style="">
              <div class="text-white text-center" >
                <?php
                echo '<h1 class=" mb-5" >'.$row['contenu'].'</h1>';
                echo '<form method="GET" action="../rooters/index.php">';
                if ($row["id_news"] != ""){
                    echo '<input name="id_news" type = "hidden" value ="'.$row['id_news'].'"></input>';
                }
                else{
                    echo '<input name="id_recette" type = "hidden" value ="'.$row['id_recette'].'"></input>';
                }
                echo '<input  class="btn btn-lg btn-light btn-lg m-2" type="submit" name="diapo" value="consulter" rel="nofollow"></input>';
                echo '</form>';
                
                ?>
              </div>
            </div>
          </div>
        <?php


    }
    else{
        ?>
        <div class="carousel-item " style = "background-image: url('<?php
                echo $row['image'];?>');height: 47vh;">
        <div class="d-flex justify-content-center align-items-center h-100 mt-5" style="">
              <div class="text-white text-center" >
                <?php
                echo '<h1 class=" mb-5" >'.$row['contenu'].'</h1>';
                echo '<form method="GET" action="../rooters/index.php">';
                if ($row["id_news"] != ""){
                    echo '<input name="id_news" type = "hidden" value ="'.$row['id_news'].'"></input>';
                }
                else{
                    echo '<input name="id_recette" type = "hidden" value ="'.$row['id_recette'].'"></input>';
                }
                echo '<input  class="btn btn-lg btn-light btn-lg m-2" type="submit" name="diapo" value="consulter" rel="nofollow"></input>';
                echo '</form>';
                
                ?>
              </div>
            </div>
          </div>
        <?php

    }
        $i++;
}

}
catch(Exception $e) {echo 'erreur'.$e->getMessage();}
?>