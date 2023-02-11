<?php 
require_once('../view/pageAdmin.php');
class Formulaire_idée_view extends page_generale 
{

  private $all_ingr;

    function __construct($all_ingr){
        $this->all_ingr = $all_ingr;    
    }
    public function formIdee(){
        ?>
   
    
    <div class="row">
    <div class="col-6  mt-5 ">
      <p id="titre-recette" class="titre-blue">Ajouter ingrédiants</p>
        <div class="row searc-ingr">
        <?php
        $i = 0;
        
          echo '<select id="select-ingr" data-live-search="true" name="ingrédiants[]" class="col-12 inputs   mb-5   mr-sm-2"  id="inputIngrédiant"  >';
          foreach ($this->all_ingr as $ingr){
              echo '<option  value="'.$ingr['id_ingrédiant'].'">'.$ingr['nom'].' ('.$ingr['unité'].')</option>';          
          }
          echo '</select>';
        echo '<button  id="add" type="button" class="col-3  btn btn-success ">Ajouter</button>';
        ?>
        </div>
        
        </div>
      </div>
      <div class="justify-content-center">
   <div id="container-cards" class="row">
        <div id="container-card"></div>
        </div>
        </div>
      <form id="form-ingr" method="post" action="../rooters/index_idee.php">
   <button id="submitIdee" disabled type="submit" name="search"  class="btn btn-primary" value="valider" style="width: 30%; margin-left: 34%;margin-top:2%;margin-bottom:30%">Valider</button>
   </div>
</form>

        <?php
    }    

    public function script(){
        ?>
        <script>
            let ingrédiants = [];
            let ids = [];
            <?php
            foreach ($this->all_ingr as $ingr){
                echo 'ingrédiants.push(["'.$ingr['nom'].'","'.$ingr['image'].'",'.($ingr['calories']*100).','.$ingr['healthy'].',"'.$ingr['saison'].'","'.$ingr["unité"].'"]);';
                echo 'ids.push('.$ingr["id_ingrédiant"].');';
            }
            
            ?>
            
        </script>

        <script src="../view/idée_recette.js"></script>
        <?php
    }

    public function no_result(){
        ?>
        <div class="d-flex justify-content-center">
        <h4 id="noresult" style="color:red;font-family: 'inter-semibold';">Pas de résultat trouvé !</h4>
        </div>
        <?php
    }
    

    public function afficher_acceuil(){
       
        $this->entete_page("tayebli | Idées de recette");
        $this->menu();
        if (session_status() == PHP_SESSION_ACTIVE and $_SESSION != []){
            $this->profil_menu();
            $this->profil_nom();
        }
        else{
            $this->boutton_connexion();
        }
        $this->réseaux();
        $this->login();
        $this->formIdee();
        $this->script();
        $this->pied_de_page();
    }
    public function afficher_acceuilNoresult(){
        $this->entete_page("tayebli | Idées de recette");
        $this->menu();
        if (session_status() == PHP_SESSION_ACTIVE and $_SESSION != []){
            $this->profil_menu();
            $this->profil_nom();
        }
        else{
            $this->boutton_connexion();
        }
        $this->réseaux();
        $this->login();
        $this->no_result();
        $this->formIdee();
        $this->script();
        $this->pied_de_page();
    }
}

?>