<?php 
require_once('../view/pageAdmin.php');
class NewRecette_view extends page_Admin 
{

  private $all_ingr;

    function __construct($all_ingr){
        $this->all_ingr = $all_ingr;    
    }
    public function formEdit(){
        ?>
<p id="titre-recette" class="titre-blue" style="margin-left: 40%;">Ajouter recette</p>
<form action="../rooters/index_admin.php" method="post">

  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
      <label for="inputTitre" ><b>Titre de la recette</b></label>
      <input type="text" name="titre" class="inputs form-control" id="inputTitre" required placeholder="Titre recette" > 
    </div>
  </div>
  <div class="form-row justify-content-center">
  <div class="form-group col-md-5" style="margin-left: 50%;margin-right: 50%;">
       
        <label for="inputImage" class="col-12"><b>Image ( doit figurer dans : /assets/recettes/ )</b></label>
        <img class="col-12" id="img-view"  style="max-width:200px;max-height:200px;margin-left:30%;margin-bottom:3%"></img>
        <input type="hidden"   name="image" class="form-control" id="imgInput" >
        <input type="file"   class="inputs form-control" id="inputImage" required placeholder="image">
  </div>
    </div>
    <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;">
      <label for="inputDescription" ><b>Description</b></label>    
      <textarea  name="description" class="inputs form-control" required id="inputDescription" rows="3"></textarea>
    </div>
  </div>
  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputDifficulté"><b>Difficulté</b></label>
      <select name="difficulté" class="inputs custom-select mr-sm-2" id="inputDifficulté">
              <option selected value="facile">facile</option>
              <option  value="moyen">moyen</option>
              <option value="difficile">difficile</option>
              <option value="chef">chef</option>
      </select>
    </div>
  <div class="row form-row justify-content-center" style="margin-top:3%;">
    <div class="form-group col-2 " >
      <label for="inputTemps_prep" ><b>Temps de préparation</b></label>
      <input required type="time" name="T_prep" class="inputs form-control" id="inputTemps_prep">
    </div>
    <div class="form-group col-2 " >
      <label for="inputTemps_cuis" ><b>Temps de cuisson</b></label>
      <input required type="time" name="T_cuis" class="inputs form-control" id="inputTemps_cui">
    </div>
    <div class="form-group col-2 " >
      <label for="inputTemps_rep" ><b>Temps de repos</b></label>
        <input required type="time" name="T_rep" class="inputs form-control" id="inputTemps_rep">
    </div>
  </div>

  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputCatégorie"><b>Catégorie</b></label>
      <select name="catégorie" class="inputs custom-select mr-sm-2" id="inputCatégorie">
      <option selected value="entrée">entrée</option>
        <option value="plat">plat</option>
        <option value="dessert">dessert</option>
        <option value="boisson">boisson</option>     
      </select>
    </div>
    <div class="form-row justify-content-center">
  <div class="form-group col-md-5" style="margin-left: 50%;margin-right: 50%;">
       <input type="hidden"   name="vidéo" class="form-control" id="vidInput">
       <label for="inputVideo" class="col-12"><b>Vidéo ( doit figurer dans : /assets/vidéo/ )</b></label>
       <input type="file"   class="inputs form-control" id="inputVideo" placeholder="vidéo">
  </div>
    </div>


  <div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
      <label class="mr-sm-2" for="inputValider"><b>Validité</b></label>
      <select name="valider" class="inputs custom-select mr-sm-2" id="inputValider">
            <option selected value="1">Valide</option>
            <option value="0">Non Valide</option>
      </select>
    </div>
    <div class="row">
    <div class="col-6  mt-5 ">
      <p id="titre-recette" class="titre-blue">Ajouter ingrédiants</p>
        <div class="row searc-ingr">
        <?php
        $i = 0;
        
          echo '<select data-live-search="true" name="ingrédiants[]" class="col-5 inputs   mb-5   mr-sm-2"  id="inputIngrédiant"  >';
          foreach ($this->all_ingr as $ingr){
              echo '<option  value="'.$ingr['id_ingrédiant'].'">'.$ingr['nom'].' ('.$ingr['unité'].')</option>';
            
          }
        
          echo '</select>';
          echo '<input class="inputs col-3  form-control m-0 " required name="quantité[]"  id="myInput" type="text"  placeholder="Quantité">';
            echo '<button disabled id="delete" type="button" class="inputs supp col-1 ml-1 btn btn-danger " style="height:80%">delete</button>';
          
        
        echo '<button  id="add" type="button" class="col-3  btn btn-success ml-5">Ajouter</button>';
        ?>
        </div>
        
        </div>
      <div class="col-6  mt-5 ">
      <p id="titre-recette" class="titre-blue">Ajouter étapes</p>
        <div class="row searc-ingr">
          <?php
            echo '<textarea required  name="étapes[]" class=" col-8 mb-2 inputs form-control"  rows="3"></textarea>';
            echo '<button disabled id="delete_et" type="button" class="inputs supp_et col-1 ml-1 mt-4 btn btn-danger " style="height:80%">delete</button>';
            
           
          echo '<button  id="add_et" type="button" class="col-3  btn btn-success ml-5">Ajouter</button>';
          ?>
        </div>
      </div>
      </div>
   <div class="justify-content-center">
   <button id="submitEdit" type="submit" name="add"  class="btn btn-primary" value="valider" style="width: 30%; margin-left: 34%;margin-top:3%">Valider</button>
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
        $this->entete_page("tayebli | ajouter recette");
        $this->menu();
        $this->réseaux();
        $this->formEdit();
        $this->script();
        $this->pied_de_page();
    }
}

?>