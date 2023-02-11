<?php 
require_once('../view/page.php');
class Profil_view extends page_generale {
    private $all_ingr;
    private $recettes;

    private $best;

    function __construct($all_ingr,$recettes,$best){
        $this->all_ingr = $all_ingr;
        $this->recettes = $recettes;
        $this->best = $best;
    }
public function mesrecettes(){
?>
<div class="recettes-suggérées">
<div class="d-flex justify-content-center"><h1>Vos recettes suggérées</h1></div>
<div class="container-cards d-flex justify-content-center ">
    <?php
    foreach ($this->recettes as $recette){
        if ($recette['valider'] == 0){
            echo'<div class="card m-2" style="width: 15rem; max-height: 25rem;"><img src="'.$recette['image'].'" class="card-img-top" style="width:15rem; height:9rem;"><div class="card-body"> <h4 class="card-title">'.$recette['titre'].'</h4><p class="card-text">'.$recette['description'].'</p><p class = "card-text">catégorie :'.$recette['catégorie'].'</p><p class="card-text" style="color:red"> Non validée </p></div></div>';
        }
        else {
            echo'<div class="card m-2" style="width: 15rem; max-height: 25rem;"><img src="'.$recette['image'].'" class="card-img-top" style="width:15rem; height:9rem;"><div class="card-body"> <h4 class="card-title">'.$recette['titre'].'</h4><p class="card-text">'.$recette['description'].'</p><p class = "card-text">catégorie :'.$recette['catégorie'].'</p><p class="card-text" style="color:green"> Validée </p></div></div>';
        }
    }
    ?>
</div>
<div class="d-flex justify-content-center" ><button id="suggest-btn" class="btn btn-outline-primary btn-lg">Suggérer nouvelle recette</button></div>
<div id="formulaire_suggest" class="container-desc" style="margin-left:8%;margin-top:3%">
<form action="../rooters/index_profil.php" method="post">
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
          echo '<button disabled id="delete" type="button" class="inputs supp col-1 ml-1 btn btn-danger btn-sm " style="height:80%">delete</button>';
        
      
      echo '<button  id="add" type="button" class="col-3  btn btn-success ml-5 btn-sm">Ajouter</button>';
      ?>
      </div>
      
      </div>
    <div class="col-6  mt-5 ">
    <p id="titre-recette" class="titre-blue">Ajouter étapes</p>
      <div class="row searc-ingr">
        <?php
          echo '<textarea required  name="étapes[]" class=" col-8 mb-2 inputs form-control"  rows="3"></textarea>';
          echo '<button disabled id="delete_et" type="button" class="inputs supp_et col-1 ml-1 mt-4 btn btn-danger btn-sm " style="height:80%">delete</button>';
          
         
        echo '<button  id="add_et" type="button" class="col-3  btn btn-success ml-5 btn-sm">Ajouter</button>';
        ?>
      </div>
    </div>
    </div>
 <div class="justify-content-center">
 <button id="submitEdit" type="submit" name="add"  class="btn btn-primary" value="valider" style="width: 30%; margin-left: 34%;margin-top:3%,margin-bottom:15%">Valider</button>
 </div>
</form>
</div>
</div>

<?php
}

public function platsfavoris(){
?>
<div class="d-flex justify-content-center" style="margin-top: 10%;"><h1>Vos recettes favorites</h1></div>
<div class=" row">
<?php
foreach ($this->best as $row ){
echo '<div class="card m-2 col-2"style="width: 15rem;">';
echo '<img src="'.$row['image'].'" class="card-img-top" alt="..." style="max-width:15rem; height:9rem;">';
echo '<div class="card-body">';
echo '<h5 class="card-title">'.$row['titre'].'</h5>';
echo '<p class="card-text">'.substr($row['description'], 0, 55).'...</p>';
echo '<form action="index.php" method="POST">';
echo ' <input type="hidden" class="id_recette" name="id_recette" value="'.$row['id_recette'].'" />';
echo '<input  type="submit" name = "submit" class="btn btn-primary"/>';
echo '</form>';
echo '</div>';
echo '</div>';


}
echo '</div>';
}

public function script(){
    ?>
    <script src="../view/profil_template.js"></script>
    <?php
}

public function afficher_profil(){
    $this->entete_page("tayebli | profil");
    $this->menu();
    $this->profil_menu();
    $this->profil_nom();
    $this->réseaux();
    $this->mesrecettes();
    $this->platsfavoris();
    $this->script();
    $this->pied_de_page();
}
}
?>