<?php 
require_once('../view/pageAdmin.php');
class GestionUser_view extends page_Admin 
{

    private $users;
    function __construct($users){
        $this->users = $users;
    }

    public function tableauIngrédiants(){
        ?>
        <div class=" d-flex justify-content-center">
        <div class="col-6  mt-5 ">
        <input class="form-control" id="myInput" type="text" placeholder="Rechercher un Utilisateur..">
        </div>
        
        </div>
        <?php
        echo '<div class="col-6   mb-5">';
        echo  '<p> Trier par :</p>';
        echo '<input id="recette-filtre"  type="submit"  name = "submit" value="Nom"  class="btn btn-primary filtres mr-3"/>';
        echo '<input id="temps_prep-filtre" type="submit"  name = "submit" value="Prénom"  class="btn btn-primary filtres mr-3"/>';
        echo '<input id="temps_cuis-filtre" type="submit"  name = "submit" value="mail"  class="btn btn-primary filtres mr-3"/>';
        echo '<input id="temps_rep-filtre" type="submit"  name = "submit" value="sexe"  class="btn btn-primary filtres"/>';
        echo '</div>';
        
        ?>
       
       
        <div class="table-responsive-md">
         <table id="tableau-recettes" class="table table-hover " style="margin-bottom:20%">
        <thead class="thead-dark">
          <tr>
           
            <th scope="col" class="text-center">nom</th>
            <th scope="col" class="text-center">prénom</th>
            <th scope="col" class="text-center" >mail</th>
            <th scope="col" class="text-center">sexe</th>
            <th scope="col" class="text-center">naissance</th>
            <th scope="col" class="text-center">mot de passe</th>
          </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->users as $user){
                echo '<tr>';
                
                echo '<td class="text-center nom-recette" style="max-width: 70px;"><b>'.$user['nom'].'</b></td>';
                echo '<td class="text-center" style="max-width: 150px;">'.$user['prenom'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$user['mail'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$user['sexe'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$user['date_naissance'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$user['mot_de_passe'].'</td>';
                if ($user['valide'] == 1){
                    echo '<td class="text-center" style="max-width: 50px;">
                <form action="../rooters/index_gestion_user.php" method="POST">
                <input type="hidden" class="id_user" name="id_user" value="' . $user['id_user'] . '" />
                <input  type="submit" name = "suspendre" value="suspendre" class="btn btn-outline-warning btn-sm" />
                </form>
                </td>';

                } else {
                    echo '<td class="text-center" style="max-width: 50px;">
                <form action="../rooters/index_gestion_user.php" method="POST">
                <input type="hidden" class="id_user" name="id_user" value="' . $user['id_user'] . '" />
                <input  type="submit" name = "valider" value="valider" class="btn btn-outline-success btn-sm" />
                </form>
                </td>';
                }
                
                echo '<td class="text-center" style="max-width: 50px;">
                <form action="../rooters/index_gestion_user.php" method="POST">
                <input type="hidden" class="id_user" name="id_user" value="' . $user['id_user'] . '" />
                <input  type="submit" name = "supprimer" value="supprimer" class="btn btn-outline-danger btn-sm " />
                </form>
                </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
      </table >
        </div>
        <?php
    }

    public function script(){
        ?>
        <script src="../view/gestionutilisateur.js"></script>
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