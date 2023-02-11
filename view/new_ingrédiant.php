<?php 
require_once('../view/pageAdmin.php');
class NewIngrédiant_view extends page_Admin 
{

    public function formEdit(){
        ?>
        <p id="titre-recette" class="titre-blue" style="margin-left: 30%;">Ajouter nouvel ingrédiant</p>
    <form action="../rooters/index_admin_ingrédiant.php" method="post">

  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
      <label for="inputTitre" ><b>Nom de l'ingrédiant</b></label>
          <input type="hidden"   name="id_ingrédiant" class="form-control" id="id_Input" >
         <input required  type="text" name="nom" class="inputs form-control" id="inputTitre" placeholder="Nom Ingrédiant" >
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
      <label for="inputTitre" style="margin-right:100%"><b>Unité</b></label>
        <input required type="text" name="unité" class=" col-12 inputs form-control" id="inputTitre" placeholder="Unité" >
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
      <label for="inputTitre" style="margin-right:70%"><b>Calories (pour 1g)</b></label>
       <input required type="text" name="calories" class=" col-12 inputs form-control" id="inputTitre" placeholder="Calories" > 
    </div>
  </div>
  <div class="form-row justify-content-center">
  <div class="form-group col-md-5" style="margin-left: 50%;margin-right: 50%;">
       <label for="inputImage" class="col-12"><b>Image ( doit figurer dans : /assets/ingrédiants/ )</b></label>
       <img class="col-12" id="img-view"  style="max-width:200px;max-height:200px;margin-left:30%;margin-bottom:3%"></img>
       <input type="hidden"   name="image" class="form-control" id="imgInput" >
       <input type="file"  required  class="inputs form-control" id="inputImage"  placeholder="image">
  </div>
    </div>
  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputDifficulté"><b>Saison</b></label>
      <select required name="saison" class="inputs custom-select mr-sm-2" id="inputSaison">
              <option selected value="tout">tout</option>
              <option value="hiver">hiver</option>
              <option value="printemps">printemps</option>
              <option value="été">été</option>
              <option value="automne">automne</option>
      </select>
    </div>

  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputValider"><b>Healthy</b></label>
      <select name="healthy" class="inputs custom-select mr-sm-2" id="inputValider">
           <option selected value="1">Healthy</option>
           <option value="0">Unhealthy</option>
      </select>
    </div>
    
   <div class="justify-content-center">
   <button id="submitEdit" type="submit" name="add_ingr"  class="btn btn-primary mb-5" value="valider" style="width: 30%; margin-left: 34%;margin-top:3%">Valider</button>
   </div>
  
</form>
        <?php
    }    

    public function script(){
        ?>
        <script>
            $("#inputImage").on("change", function () {
                $("#img-view").attr("src", "./assets/ingrédiants/"+$("#inputImage").val().substring(12));
                $("#imgInput").attr("value", "./assets/ingrédiants/"+$("#inputImage").val().substring(12));
            });
        </script>
        <script src="../view/gestionrecettes.js"></script>
        <?php
    }
    

    public function afficher_acceuil(){
        $this->entete_page("tayebli | ajouter recette");
        $this->menu();
        $this->réseaux();
        $this->formEdit();
        $this->script();
        $this->pied_de_page();
    }
}

?>