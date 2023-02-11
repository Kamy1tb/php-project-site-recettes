<?php 
require_once('../view/pageAdmin.php');
class GestionIngrédiant_view extends page_Admin 
{

    private $ingrédiants;
    function __construct($ingrédiants){
        $this->ingrédiants = $ingrédiants;
    }

    public function tableauIngrédiants(){
        ?>
        <div class=" d-flex justify-content-center">
        <div class="col-6  mt-5 ">
        <input class="form-control" id="myInput" type="text" placeholder="Rechercher un ingrédiant..">
        </div>
        <div class="col-6  mt-5 pt-1 ">
        <form action="../rooters/index_admin_ingrédiant.php" method="GET">
        <input id="ajouter_ingrédiant"  type="submit"  name = "add_ingrédiant" value="ajouter un ingrédiant"  class="btn btn-outline-primary"/>
        </form>
        </div>
        </div>
        <?php
        echo '<div class="col-6   mb-5">';
        echo  '<p> Trier par :</p>';
        echo '<input id="recette-filtre"  type="submit"  name = "submit" value="ingrédiant"  class="btn btn-primary filtres mr-3"/>';
        echo '<input id="temps_prep-filtre" type="submit"  name = "submit" value="Temps préparation"  class="btn btn-primary filtres mr-3"/>';
        echo '<input id="temps_cuis-filtre" type="submit"  name = "submit" value="Temps cuisson"  class="btn btn-primary filtres mr-3"/>';
        echo '<input id="temps_rep-filtre" type="submit"  name = "submit" value="Temps Repos"  class="btn btn-primary filtres"/>';
        echo '</div>';
        
        ?>
       
       
        <div class="table-responsive-md">
         <table id="tableau-recettes" class="table table-hover ">
        <thead class="">
          <tr>
           
            <th scope="col" class="text-center">nom</th>
            <th scope="col" class="text-center">image</th>
            <th scope="col" class="text-center" >saison</th>
            <th scope="col" class="text-center">unité</th>
            <th scope="col" class="text-center">calories (100g)</th>
            <th scope="col" class="text-center">Healthy</th>
          </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->ingrédiants as $ingrédiant){
                echo '<tr>';
                
                echo '<td class="text-center nom-recette" style="max-width: 70px;"><b>'.$ingrédiant['nom'].'</b></td>';
                echo '<td class="text-center" style="max-width: 150px;">'.$ingrédiant['image'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$ingrédiant['saison'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$ingrédiant['unité'].'</td>';
                echo '<td class="text-center t_prep" style="max-width: 70px;">'.($ingrédiant['calories'] * 100).'</td>';
                if ($ingrédiant['healthy'] == "0"){

                    echo '<td class="text-center" style="max-width: 70px;">Unhealthy</td>';

                } else{

                    echo '<td class="text-center" style="max-width: 70px;">Healthy</td>';

                }
                echo '<td class="text-center" style="max-width: 70px;">
                <form action="../rooters/index_admin_ingrédiant.php" method="GET">
                <input type="hidden" class="id_ingrédiant" name="id_ingrédiant" value="' .$ingrédiant['id_ingrédiant']. '" />
                <input  type="submit" name = "submit" value="éditer" class="btn btn-primary" style="background-color : #FFFF2E; color : black; border-color:#FFFF2E"/>
                </form>
                </td>';
                echo '<td class="text-center" style="max-width: 70px;">
                <form action="../rooters/index_admin_ingrédiant.php" method="GET">
                <input type="hidden" class="id_ingrédiant" name="id_ingrédiant" value="' .$ingrédiant['id_ingrédiant']. '" />
                <input  type="submit" name = "delete" value="delete" class="btn btn-primary" style="background-color : red; color : white; border-color:red"/>
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
        <script>
             $("#menu-gestion-nutrition").addClass("active");
        </script>
        <script src="../view/gestionrecettes.js"></script>
        <?php
    }
    

    public function afficher_acceuil(){
        $this->entete_page("tayebli | Gestion Ingrédiants");
        $this->menu();
        $this->réseaux();
        $this->tableauIngrédiants();
        $this->script();
        $this->pied_de_page();
    }
}

?>