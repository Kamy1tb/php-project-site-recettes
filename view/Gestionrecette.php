<?php 
require_once('../view/pageAdmin.php');
class Gestionrecette_view extends page_Admin 
{

    private $recettes;
    function __construct($recettes){
        $this->recettes = $recettes;
    }

    public function tableauRecettes(){
        ?>
        <div class=" d-flex justify-content-center">
        <div class="col-6  mt-5 ">
        <input class="form-control" id="myInput" type="text" placeholder="Rechercher une recette..">
        </div>
        <div class="col-6  mt-5 pt-1 ">
        <form action="../rooters/index_admin.php" method="GET">
        <input id="ajouter_recette"  type="submit"  name = "add_recette" value="ajouter une recette"  class="btn btn-outline-primary"/>
        </form>
        </div>
        </div>
        <?php
        echo '<div class="col-6   mb-5">';
        echo  '<p> Trier par :</p>';
        echo '<input id="recette-filtre"  type="submit"  name = "submit" value="recette"  class="btn btn-primary filtres mr-3"/>';
        echo '<input id="temps_prep-filtre" type="submit"  name = "submit" value="Temps préparation"  class="btn btn-primary filtres mr-3"/>';
        echo '<input id="temps_cuis-filtre" type="submit"  name = "submit" value="Temps cuisson"  class="btn btn-primary filtres mr-3"/>';
        echo '<input id="temps_rep-filtre" type="submit"  name = "submit" value="Temps Repos"  class="btn btn-primary filtres"/>';
        echo '</div>';
        
        ?>
       
       
        <div class="table-responsive-md">
         <table id="tableau-recettes" class="table table-hover ">
        <thead class="">
          <tr>
           
            <th scope="col" class="text-center">Titre</th>
            <th scope="col" class="text-center">image</th>
            <th scope="col" class="text-center" >description</th>
            <th scope="col" class="text-center">difficulté</th>
            <th scope="col" class="text-center">Temps de préparation</th>
            <th scope="col" class="text-center">Temps de repos</th>
            <th scope="col" class="text-center">Temps de cuisson</th>
            <th scope="col" class="text-center">Catégorie</th>
            <th scope="col" class="text-center">Vidéo</th>
            <th scope="col" class="text-center">Valider</th>
          </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->recettes as $recette){
                echo '<tr>';
                
                echo '<td class="text-center nom-recette" style="max-width: 70px;"><b>'.$recette['titre'].'</b></td>';
                echo '<td class="text-center" style="max-width: 150px;">'.$recette['image'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.substr($recette['description'], 0, 55).'...</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$recette['difficulté'].'</td>';
                echo '<td class="text-center t_prep" style="max-width: 70px;">'.$recette['temps de préparation'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$recette['temps de repos'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$recette['temps de cuisson'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$recette['catégorie'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$recette['vidéo'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$recette['valider'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">
                <form action="../rooters/index_admin.php" method="GET">
                <input type="hidden" class="id_recette" name="id_recette" value="' . $recette['id_recette'] . '" />
                <input  type="submit" name = "submit" value="éditer" class="btn btn-primary" style="background-color : #FFFF2E; color : black; border-color:#FFFF2E"/>
                </form>
                </td>';
                echo '<td class="text-center" style="max-width: 70px;">
                <form action="../rooters/index_admin.php" method="GET">
                <input type="hidden" class="id_recette" name="id_recette" value="' . $recette['id_recette'] . '" />
                <input  type="submit" name = "submit" value="delete" class="btn btn-primary" style="background-color : red; color : white; border-color:red"/>
                </form>
                </td>';
                
               

                echo '</tr>';
            }
            ?>
        </tbody>
      </table>
        </div>
        <?php
    }

    public function script(){
        ?>
        <script>$("#menu-gestion-recette").addClass("active");</script>
        <script src="../view/gestionrecettes.js"></script>
        <?php
    }
    

    public function afficher_acceuil(){
        $this->entete_page("tayebli | Gestion recettes");
        $this->menu();
        $this->réseaux();
        $this->tableauRecettes();
        $this->script();
        $this->pied_de_page();
    }
}

?>