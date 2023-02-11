<?php 
require_once('../view/pageAdmin.php');
class EditIngrédiant_view extends page_Admin 
{

    private $ingrédiant;
    function __construct($ingrédiant){
        $this->ingrédiant = $ingrédiant;
    }

    public function formEdit(){
        echo '<p id="titre-recette" class="titre-blue" style="margin-left: 30%;">Modifier : '.$this->ingrédiant['nom'].'</p>';
        ?>
        
<form action="../rooters/index_admin_ingrédiant.php" method="post">

  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
      <label for="inputTitre" ><b>Nom de l'ingrédiant</b></label>
      <?php
          echo '<input type="hidden"   name="id_ingrédiant" class="form-control" id="id_Input" value= "'.$this->ingrédiant['id_ingrédiant'].'">';
          echo '<input type="text" name="nom" class="inputs form-control" id="inputTitre" placeholder="Nom Ingrédiant" value = "'.$this->ingrédiant['nom'].'">';
      ?>
      
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
      <label for="inputTitre" style="margin-right:100%"><b>Unité</b></label>
      <?php
          echo '<input type="text" name="unité" class=" col-12 inputs form-control" id="inputTitre" placeholder="Unité" value = "'.$this->ingrédiant['unité'].'">';
      ?>
      
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
      <label for="inputTitre" style="margin-right:70%"><b>Calories (pour 1g)</b></label>
      <?php
          echo '<input type="text" name="calories" class=" col-12 inputs form-control" id="inputTitre" placeholder="Calories" value = "'.$this->ingrédiant['calories'].'">';
      ?>
      
    </div>
  </div>
  <div class="form-row justify-content-center">
  <div class="form-group col-md-5" style="margin-left: 50%;margin-right: 50%;">
    <?php
       
        echo '<label for="inputImage" class="col-12"><b>Image ( doit figurer dans : /assets/ingrédiants/ )</b></label>';
        echo '<img class="col-12" id="img-view" src= "'.$this->ingrédiant['image'].'" style="max-width:200px;max-height:200px;margin-left:30%;margin-bottom:3%"></img>';
        echo '<input type="hidden"   name="image" class="form-control" id="imgInput" value= "'.$this->ingrédiant['image'].'">';
        echo '<input type="file"   class="inputs form-control" id="inputImage" value= "'.$this->ingrédiant['image'].'" placeholder="image"">';
      ?>
  </div>
    </div>
  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputDifficulté"><b>Saison</b></label>
      <select name="saison" class="inputs custom-select mr-sm-2" id="inputDifficulté">
      <?php

    
         if ($this->ingrédiant['saison'] == 'tout'){

              echo '
              <option selected value="tout">tout</option>
              <option  value="hiver">hiver</option>
              <option value="printemps">printemps</option>
              <option value="été">été</option>
              <option value="automne">automne</option>';

         } elseif($this->ingrédiant['saison'] == 'hiver'){
            echo '
              <option  value="tout">tout</option>
              <option  selected value="hiver">hiver</option>
              <option value="printemps">printemps</option>
              <option value="été">été</option>
              <option value="automne">automne</option>';

         } elseif($this->ingrédiant['saison'] == 'printemps'){
            echo '
            <option  value="tout">tout</option>
            <option  value="hiver">hiver</option>
            <option selected value="printemps">printemps</option>
            <option value="été">été</option>
            <option value="automne">automne</option>';

         } elseif($this->ingrédiant['saison'] == 'automne'){
            echo '
              <option selected value="tout">tout</option>
              <option  value="hiver">hiver</option>
              <option value="printemps">printemps</option>
              <option value="été">été</option>
              <option selected value="automne">automne</option>';
         }
         elseif($this->ingrédiant['saison'] == 'été'){
            echo '
              <option selected value="tout">tout</option>
              <option  value="hiver">hiver</option>
              <option value="printemps">printemps</option>
              <option selected value="été">été</option>
              <option value="automne">automne</option>';
         }
      ?>
        
      </select>
    </div>

  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputValider"><b>Healthy</b></label>
      <select name="healthy" class="inputs custom-select mr-sm-2" id="inputValider">
        <?php
        if ($this->ingrédiant['healthy'] == '1'){
         
            echo '
            <option selected value="1">Healthy</option>
           <option value="0">Unhealthy</option>';
   
       } else{
        echo '
       <option selected value="1">Healthy</option>
       <option selected value="0">Unhealthy</option>';
       }
        ?>
      </select>
    </div>
    
   <div class="justify-content-center">
   <button id="submitEdit" type="submit" name="edit"  class="btn btn-primary mb-5" value="valider" style="width: 30%; margin-left: 34%;margin-top:3%">Valider</button>
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
        $this->entete_page("tayebli | éditer recette");
        $this->menu();
        $this->réseaux();
        $this->formEdit();
        $this->script();
        $this->pied_de_page();
    }
}

?>