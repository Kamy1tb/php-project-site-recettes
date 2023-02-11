<?php 
require_once('../view/pageAdmin.php');
class Option_view extends page_Admin 
{

    private $diaporama;
    function __construct($diaporama){
        $this->diaporama = $diaporama;
    }
    public function formulaireDiapo(){
        ?>
        <form action="../rooters/index_option.php" method="post">

<div class="form-row justify-content-center">
  <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
    <label for="inputTitre" ><b>Contenu Diaporama</b></label>
    <input type="text" name="contenu" class="inputs form-control" id="inputDiaporama" required placeholder="Contenu diaporama" > 
  </div>
  
</div>
<div class="form-row justify-content-center">
<div class="form-group col-md-5" style="margin-left: 50%;margin-right: 50%;">
     
      <label for="inputImage" class="col-12"><b>Image ( doit figurer dans : /rooters/assets/diaporama/ )</b></label>
      <img class="col-12" id="img-view"  style="max-width:200px;max-height:200px;margin-left:30%;margin-bottom:3%"></img>
      <input type="hidden"   name="image" class="form-control" id="imgInput" >
      <input type="file"   class="inputs form-control" id="inputImage" required placeholder="image">
</div>
  </div>
<div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
    <label class="mr-sm-2" for="inputDifficulté"><b>Type</b></label>
    <select name="id_type" class="inputs custom-select mr-sm-2" id="inputDifficulté">
            <option selected value="id_recette">recette</option>
            <option  value="id_news">news</option>
    </select>
  </div>

  <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
    <label for="inputTitre" class="col-12"><b>Id</b></label>
    <input type="text" name="id" class="inputs form-control" id="inputDiaporama" required placeholder="Id news/recette" > 
  </div>

<div class="col-auto my-1" style="margin-left: 40%;margin-right: 40%;">
    <label class="mr-sm-2" for="inputValider"><b>Validité</b></label>
    <select name="valider" class="inputs custom-select mr-sm-2" id="inputValider">
          <option selected value="1">Valide</option>
          <option value="0">Non Valide</option>
    </select>
  </div>
 <div class="justify-content-center">
 <button id="submitEdit" type="submit" name="add_diapo"  class="btn btn-primary" value="valider" style="width: 30%; margin-left: 34%;margin-top:3%">Valider</button>
 </div>
</form>

        <?php
    }
    public function tableauDiapo(){
        ?>
         <div class=" row d-flex justify-content-center" style="margin-bottom:0%">
        <div class=" col-12 mt-5 " style="margin:0%;">
        <h2 id="valll" class="col-11 ml-5 mr-0" style="color: black;">Changer pourcentage idée recette</h2>
        <form action="../rooters/index_option.php" method="POST" >
        <input style="margin-left: 43.5%;margin-bottom:0%;" id="pourentage-valeur" name="pourcentage" type="range" class="form-range " min="0" max="100" ">
        </div> 
        
        <input id="ajouter_ingrédiant"  type="submit"  name = "subpourcentage" value="changer pourcentage"  class="btn btn-outline-primary"/>
        </form>
        </div>
        




        <div class=" d-flex justify-content-center">
        <div class="col-6  mt-5 " style="margin-bottom: 5%;">
        <input class="form-control" id="myInput" type="text" placeholder="Rechercher un Diaporama..">
        </div>
        <div class="col-6  mt-5 pt-1 ">
        <form action="../rooters/index_option.php" method="POST">
        <input id="ajouter_ingrédiant"  type="submit"  name = "diapo" value="ajouter diaporama"  class="btn btn-outline-primary"/>
        </form>
        </div>
        </div>
        <div class="table-responsive-md">
         <table id="tableau-diaporama" class="table table-hover " style="margin-bottom:20%">
        <thead class="thead-dark">
          <tr>
           
            <th scope="col" class="text-center">id_diaporama</th>
            <th scope="col" class="text-center">image</th>
            <th scope="col" class="text-center" >id_news</th>
            <th scope="col" class="text-center">id_recette</th>
            <th scope="col" class="text-center">contenu</th>
            <th scope="col" class="text-center">valide</th>
          </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->diaporama as $diapo){
                echo '<tr>';
                
                echo '<td class="text-center nom-recette" style="max-width: 70px;"><b>'.$diapo['id_diaporama'].'</b></td>';
                echo '<td class="text-center" style="max-width: 150px;">'.$diapo['image'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$diapo['id_news'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$diapo['id_recette'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$diapo['contenu'].'</td>';
                echo '<td class="text-center" style="max-width: 70px;">'.$diapo['valide'].'</td>';
                if ($diapo['valide'] == 1){
                    echo '<td class="text-center" style="max-width: 50px;">
                <form action="../rooters/index_option.php" method="POST">
                <input type="hidden" class="id_user" name="id_diaporama" value="' . $diapo['id_diaporama'] . '" />
                <input  type="submit" name = "suspendre" value="suspendre" class="btn btn-outline-warning btn-sm" />
                </form>
                </td>';

                } else {
                    echo '<td class="text-center" style="max-width: 50px;">
                <form action="../rooters/index_option.php" method="POST">
                <input type="hidden" class="id_user" name="id_diaporama" value="' . $diapo['id_diaporama'] . '" />
                <input  type="submit" name = "valider" value="valider" class="btn btn-outline-success btn-sm" />
                </form>
                </td>';
                }
                
                echo '<td class="text-center" style="max-width: 50px;">
                <form action="../rooters/index_option.php" method="POST">
                <input type="hidden" class="id_user" name="id_diaporama" value="' . $diapo['id_diaporama'] . '" />
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
        <script src="../view/option.js"></script>
        <?php
    }
    

    public function afficher_acceuil(){
        $this->entete_page("tayebli | Option");
        $this->menu();
        $this->réseaux();
        $this->tableauDiapo();
        $this->script();
        $this->pied_de_page();
    }

    public function afficher_form(){
        $this->entete_page("tayebli | Option");
        $this->menu();
        $this->réseaux();
        $this->formulaireDiapo();
        $this->script();
        $this->pied_de_page();
    }
}

?>