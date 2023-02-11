<?php 
require_once('../view/pageAdmin.php');
class Editrecette_view extends page_Admin 
{

    private $recette;
    private $ingrédiants;

  private $all_ingr;

  private $étapes;
    function __construct($recette,$ingrédiants,$all_ingr,$étapes){
        $this->recette = $recette;
        $this->ingrédiants = $ingrédiants;
        $this->all_ingr = $all_ingr;
        $this->étapes = $étapes;
    }

    public function formEdit(){
        echo '<p id="titre-recette" class="titre-blue" style="margin-left: 30%;">Modifier : '.$this->recette['titre'].'</p>';
        ?>
        
<form action="../rooters/index_admin.php" method="post">

  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
      <label for="inputTitre" ><b>Titre de la recette</b></label>
      <?php
          echo '<input type="hidden"   name="id_recette" class="form-control" id="id_Input" value= "'.$this->recette['id_recette'].'">';
          echo '<input required type="text" name="titre" class="inputs form-control" id="inputTitre" placeholder="Titre recette" value = "'.$this->recette['titre'].'">';
      ?>
      
    </div>
  </div>
  <div class="form-row justify-content-center">
  <div class="form-group col-md-5" style="margin-left: 50%;margin-right: 50%;">
    <?php
       
        echo '<label for="inputImage" class="col-12"><b>Image ( doit figurer dans : /assets/recettes/ )</b></label>';
        echo '<img class="col-12" id="img-view" src= "'.$this->recette['image'].'" style="max-width:200px;max-height:200px;margin-left:30%;margin-bottom:3%"></img>';
        echo '<input type="hidden"   name="image" class="form-control" id="imgInput" value= "'.$this->recette['image'].'">';
        echo '<input type="file"  class="inputs form-control" id="inputImage" value= "'.$this->recette['image'].'" placeholder="image"">';
      ?>
  </div>
    </div>
    <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;">
      <label for="inputDescription" ><b>Description</b></label>
      <?php
          
          echo '<textarea required  name="description" class="inputs form-control" id="inputDescription" rows="3">'.$this->recette['description'].'</textarea>';
          
      ?>
      
    </div>
  </div>
  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputDifficulté"><b>Difficulté</b></label>
      <select name="difficulté" class="inputs custom-select mr-sm-2" id="inputDifficulté">
      <?php

    
         if ($this->recette['difficulté'] == 'facile'){
              
              echo '
              <option selected value="facile">facile</option>
              <option  value="moyen">moyen</option>
              <option value="difficile">difficile</option>
              <option value="chef">chef</option>';

         } elseif($this->recette['difficulté'] == 'moyen'){
            echo '<option value="facile">facile</option>
              <option selected value="moyen">moyen</option>
              <option value="difficile">difficile</option>
              <option value="chef">chef</option>';

         } elseif($this->recette['difficulté'] == 'difficile'){
            echo '<option  value="facile">facile</option>
              <option value="moyen">moyen</option>
              <option selected value="difficile">difficile</option>
              <option value="chef">chef</option>';

         } elseif($this->recette['difficulté'] == 'chef'){
            echo '<option  value="facile">facile</option>
              <option value="moyen">moyen</option>
              <option value="difficile">difficile</option>
              <option selected value="chef">chef</option>';
         }
      ?>
        
      </select>
    </div>
  <div class="row form-row justify-content-center" style="margin-top:3%;">
    <div class="form-group col-2 " >
      <label for="inputTemps_prep" ><b>Temps de préparation</b></label>
      <?php
          echo '<input required type="time" name="T_prep" class="inputs form-control" id="inputTemps_prep" value="'.substr($this->recette['temps de préparation'],0,5).'" >';
      ?>
    </div>
    <div class="form-group col-2 " >
      <label for="inputTemps_cuis" ><b>Temps de cuisson</b></label>
      <?php
          echo '<input  required type="time" name="T_cuis" class="inputs form-control" id="inputTemps_cui"   value="'.substr($this->recette['temps de cuisson'],0,5).'" >';
      ?>
    </div>
    <div class="form-group col-2 " >
      <label for="inputTemps_rep" ><b>Temps de repos</b></label>
      <?php
          echo '<input required type="time" name="T_rep" class="inputs form-control" id="inputTemps_rep" value="'.substr($this->recette['temps de repos'],0,5).'" >';
      ?>
      
    </div>
  </div>

  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputCatégorie"><b>Catégorie</b></label>
      <select name="catégorie" class="inputs custom-select mr-sm-2" id="inputCatégorie">
      <?php
    if ($this->recette['catégorie'] == 'entrée'){
         
         echo '
         <option selected value="entrée">entrée</option>
        <option value="plat">plat</option>
        <option value="dessert">dessert</option>
        <option value="boisson">boisson</option>';

    } elseif($this->recette['catégorie'] == 'plat'){
        echo '
         <option  value="entrée">entrée</option>
        <option selected value="plat">plat</option>
        <option value="dessert">dessert</option>
        <option value="boisson">boisson</option>';

    } elseif($this->recette['catégorie'] == 'dessert'){
        echo '
         <option  value="entrée">entrée</option>
        <option value="plat">plat</option>
        <option selected value="dessert">dessert</option>
        <option value="boisson">boisson</option>';

    } elseif($this->recette['catégorie'] == 'boisson'){
        echo '
         <option  value="entrée">entrée</option>
        <option slected value="plat">plat</option>
        <option value="dessert">dessert</option>
        <option selected value="boisson">boisson</option>';
    }
 ?>
        
      </select>
    </div>

    <div class="form-row justify-content-center">
  <div class="form-group col-md-5" style="margin-left: 50%;margin-right: 50%;">
    <?php
        echo '<input type="hidden"   name="vidéo" class="form-control" id="vidInput" value= "'.$this->recette['vidéo'].'">';
        echo '<label for="inputVideo" class="col-12"><b>Vidéo ( doit figurer dans : /assets/vidéo/ )</b></label>';
        echo '<input type="file"   class="inputs form-control" id="inputVideo" placeholder="vidéo"">';
      ?>
  </div>
    </div>


  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputValider"><b>Validité</b></label>
      <select name="valider" class="inputs custom-select mr-sm-2" id="inputValider">
        <?php
        if ($this->recette['valider'] == '1'){
         
            echo '
            <option selected value="1">Valide</option>
           <option value="0">Non Valide</option>';
   
       } else{
        echo '
       <option selected value="1">Valide</option>
       <option selected value="0">Non Valide</option>';
       }
        ?>
      </select>
    </div>
    <div class="row">
    <div class="col-6  mt-5 ">
      <p id="titre-recette" class="titre-blue">Modifier ingrédiants</p>
        <div class="row searc-ingr">
        <?php
        $i = 0;
        foreach ($this->ingrédiants as $ingrédiant){
          echo '<select data-live-search="true" name="ingrédiants[]" class="col-5 inputs   mb-5   mr-sm-2"  id="inputIngrédiant"  >';
          foreach ($this->all_ingr as $ingr){

            if ($ingrédiant['nom'] == $ingr['nom']){
              echo '<option selected value="'.$ingrédiant['id_ingrédiant'].'">'.$ingrédiant['nom'].' ('.$ingr['unité'].')</option>';
            } else{
              echo '<option  value="'.$ingr['id_ingrédiant'].'">'.$ingr['nom'].' ('.$ingr['unité'].')</option>';
            }
          }
        
          echo '</select>';
          echo '<input required class="inputs col-3 required form-control m-0 " name="quantité[]"  id="myInput" type="text" value ="'.$ingrédiant['quantité'].'" placeholder="Quantité">';
          if ($i != 0){
            echo '<button id="delete" type="button" class="inputs supp col-1 ml-1 btn btn-danger " style="height:80%">delete</button>';
          }
          else{
            echo '<button disabled id="delete" type="button" class="inputs supp col-1 ml-1 btn btn-danger " style="height:80%">delete</button>';
          }
          $i++;
        }
        echo '<button  id="add" type="button" class="col-3  btn btn-success ml-5">Ajouter</button>';
        ?>
        </div>
        
        </div>
      <div class="col-6  mt-5 ">
      <p id="titre-recette" class="titre-blue">Modifier étapes</p>
        <div class="row searc-ingr">
          <?php
          $i = 0;
          foreach ($this->étapes as $étape){
            echo '<textarea  required name="étapes[]" class=" col-8 mb-2 inputs form-control"  rows="3">'.$étape['contenu'].'</textarea>';
            if ($i != 0){
              echo '<button id="delete_et" type="button" class="inputs supp_et col-1 ml-1 mt-4 btn btn-danger " style="height:80%">delete</button>';
            }
            else{
              echo '<button disabled id="delete_et" type="button" class="inputs supp_et col-1 ml-1 mt-4 btn btn-danger " style="height:80%">delete</button>';
            }
            $i++;
          }
          echo '<button  id="add_et" type="button" class="col-3  btn btn-success ml-5">Ajouter</button>';
          ?>
        </div>
      </div>
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
          $(document).on("DOMNodeInserted", ".supp", function() {
            $(this).addClass("inputs");
          $(this).click(function() {
            $($(this).prev().prev()).remove();
              $($(this).prev()).remove();
              $($(this)).remove();
              });
            });
            $(document).on("DOMNodeInserted", ".supp_et", function() {
            $(this).addClass("inputs");
             $(this).click(function() {
              $($(this).prev()).remove();
              $($(this)).remove();
              });
            });

          $(document).on("DOMNodeInserted", ".searc-ingr select", function() {
            $(this).attr("name", "ingrédiants[]");
            });
            $(document).on("DOMNodeInserted", ".searc-ingr textarea", function() {
            $(this).attr("name", "étapes[]");
            });

            
            $("#inputImage").on("change", function () {
                $("#img-view").attr("src", "./assets/recettes/"+$("#inputImage").val().substring(12));
                $("#imgInput").attr("value", "./assets/recettes/"+$("#inputImage").val().substring(12));
            });
            $("#inputVideo").on("change", function () {
                $("#vidInput").attr("value", "./assets/vidéo/"+$("#inputVideo").val().substring(12));
            });

            $('.searc-ingr select').selectpicker();
            $("#add").on("click", function () {
              let $select = $(".searc-ingr select").clone();
              let $input = "<input required class='col-3 form-control m-0 ' name='quantité[]'  id='myInput' type='text'  placeholder='Quantité'>";
              let $butt = "<button id='delete' type='button' class='supp col-1 ml-1 btn btn-danger ' style='height:80%'>delete</button>";
              $($select[0]).insertBefore("#add");
              $($input).insertBefore("#add");
              $($butt).insertBefore("#add");
              $('.searc-ingr select').selectpicker();
             
            });
            $("#add_et").on("click", function () {
              let $input = '<textarea required  name="étapes[]" class=" col-8 mb-2 inputs form-control"  rows="3"></textarea>';
              let $butt = '<button id="delete_et" type="button" class="inputs supp_et col-1 ml-1 mt-4 btn btn-danger " style="height:80%">delete</button>';
              $($input).insertBefore("#add_et");
              $($butt).insertBefore("#add_et");
              $('.searc-ingr select').selectpicker();
             
            });
            $(".supp").on("click", function () {
              $($(this).prev().prev()).remove();
              $($(this).prev()).remove();
              $($(this)).remove();
            });
            $(".supp_et").on("click", function () {
              $($(this).prev()).remove();
              $($(this)).remove();
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