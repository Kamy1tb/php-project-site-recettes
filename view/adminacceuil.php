<?php 
require_once('../view/pageAdmin.php');
class Adminacc_view extends page_Admin 
{
    public function acceuil(){
        ?>
 <div class="d-flex justify-content-center"><h1 class="mt-5" style="font-size: 30px;">Bienvenu dans l'espace admin de Tayebli</h1></div>
 <div class="row m-5">
  <div class="col-sm-3">
    <div class="card" style="height:fit-content;">
      <div class="card-body">
        <h5 class="card-title">Gestion des recettes</h5>
        <p class="card-text">Gérez les différentes recettes du site </p>
        <a href="./index_admin.php" class="btn btn-primary">Entrer</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card" style="height:fit-content;">
      <div class="card-body" >
        <h5 class="card-title">Gestion des news</h5>
        <p class="card-text">Ajoutez du contenu à la une au site</p>
        <a href="#" class="btn btn-primary">Entrer</a>
      </div>
    </div>
  </div>
</div>


<div class="row m-5">
  <div class="col-sm-3">
    <div class="card" style="height:fit-content;">
      <div class="card-body">
        <h5 class="card-title">Gestion des utilisateurs</h5>
        <p class="card-text">Gérez les utilisateurs et validez les inscriptions</p>
        <a href="./index_gestion_user.php" class="btn btn-primary" >Entrer</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3" >
    <div class="card" style="height:fit-content;">
      <div class="card-body">
        <h5 class="card-title">Gestion de nutrition</h5>
        <p class="card-text">Gerez les inrédiants présents dans le site</p>
        <a href="./index_admin_ingrédiant.php" class="btn btn-primary">Entrer</a>
      </div>
    </div>
  </div>
  
</div>
<div class="row m-5">
<div class="col-sm-3" >
    <div class="card" style="height:fit-content;">
      <div class="card-body">
        <h5 class="card-title">Options</h5>
        <p class="card-text">Réglez le diaporama du site et configurez le pourcentage d'ingrédiants de idée recette</p>
        <a href="#" class="btn btn-primary">Entrer</a>
      </div>
    </div>
  </div>
  </div>
  <script>$("#menu-acceuil").addClass("active");</script>
<?php

    }
    public function afficher_acceuil(){
        $this->entete_page("tayebli | éditer recette");
        $this->menu();
        $this->réseaux();
        $this->acceuil();
        $this->pied_de_page();
    }
 

}

?>