<?php 
require_once('../view/page.php');
class Recette_view extends page_generale 
{

    private $recette;
    private $ingrédiants;
    private $étapes;

  private $avis;
    function __construct($recette,$ingrédiants,$étapes,$avis){
        $this->recette = $recette;
        $this->ingrédiants = $ingrédiants;
        $this->étapes = $étapes;
        $this->avis = $avis;
        
    }

    private function pop_noter(){
      ?>
       <div class="wrapper fadeInDown popup " style="position: fixed; z-index: 999999;">
        <div id="formContent">
    <button id="close" class="btn" style="margin-right: 90%;margin-left:3%;background-color: transparent;
  font-size: 30px;
  color: #1878F3;
  background:transparent;
">&times;</button>
<div class="d-flex justify-content-center" style="height: fit-content;">
    <h2 class="col-12  m-0">Notez la recette</h2>
    </div>
    <div class="d-flex justify-content-center">
        
      <div class="ratings m-0 mb-3 ">
            <i id="starn1" class="fa fa-star "></i>
            <i id="starn2" class="fa fa-star "></i>
            <i id="starn3" class="fa fa-star "></i>
            <i id="starn4" class="fa fa-star "></i>
            <i id="starn5" class="fa fa-star"></i>
            
        </div>

      </div>
    <div class="fadeIn first">

    </div>
    <div class="d-flex justify-content-center mb-3">
    <form action="index.php" method="post">
      <input type="hidden" name="id_recette" value="<?php echo $this->recette['id_recette'] ?>">
      <input id="valeur-note" type="hidden" name="note">
      <input type="submit" name="noter" class="fadeIn fourth btn btn-outline-warning btn-block " value="Noter" style="margin-right: 15%;margin-bottom:5%">
    </form>
    </div>


  </div>
      </div>
      <?php
    }
    private function noter(){
      ?>
      <div class="col-3 mt-1">
          <button id="noter" class="btn btn-outline-warning">Noter</button>
        </div>
      <?php

    }

  public function recetteinfo()
  {
    ?>
        
  <div class="row">
    <div class="container-image col-6">
      <div class="text-image row">
        
        <div class="col-6">
        
          <?php
          echo '<p id="titre-recette" >' . $this->recette['titre'] . '</p>';
          ?>
          
        </div>
        <div class="ratings col-3">
            <?php
            echo '<input id="notes" type="hidden" value ="' . $this->recette['notes'] . '"/>';
            ?>
            <i id="star1" class="fa fa-star "></i>
            <i id="star2" class="fa fa-star "></i>
            <i id="star3" class="fa fa-star "></i>
            <i id="star4" class="fa fa-star "></i>
            <i id="star5" class="fa fa-star"></i>
            <h5 class="card-text " ><?php echo $this->avis ?> avis</h5>
        </div>
        
      <?php
  }
      public function suiterecetteinfo(){
       ?>
       
       
      </div>
      
      <div class="image-recette">
        <?php
        echo '<img id="recette-image" src="'.$this->recette['image'].'" alt="" style="width:35rem;max-height:25rem;">' ;
        ?>
      </div>
    </div>
    <div class="container-information col-6">
      <div class="row">
      <div class="row">
        <p id="titre-description" class="titre-blue col-12" >Fiche de la recette</p>
      </div>
      <div class="container-desc col-12">
      <div class=" container-temps col-4 m-1">
          <p class="titre-temps ">Catégorie</p>
          <p id="valeur-catégorie" class="valeur-temps">
            <?php
            echo $this->recette['catégorie'];;
            ?>
          </p>
        </div>
        <div class="container-temps m-1 col-4">
          <p class="titre-temps">Difficulté</p>
          <p id="valeur-difficulté" class="valeur-temps">
          <?php
            echo $this->recette['difficulté'];;
            ?>
          </p>
        </div>
        <div class="container-temps m-1 col-4">
          <p class="titre-temps">Calories</p>    
          <p id="valeur-calories" class="valeur-temps">
          <?php
            echo $this->recette['calories'];;
            ?>
          </p>   
        </div>
      </div>
      <div class="row">
        <p id="titre-description" class="titre-blue" >Description</p>
      </div>
      <div class="container-desc col-12">
        <?php
        echo '<p id="text-description" class="col-10">'.$this->recette["description"].'</p>';
        ?>
      </div>
      <div class="container-icon col-12">
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#1878F3" class="bi bi-clock-history" viewBox="0 0 20 20">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
</svg>
      </div>
      <div class=" container-desc col-12">
        
        <div class=" container-temps col-4 m-1">
          <p class="titre-temps ">Temps de préparation</p>
          <p id="valeur-preparation" class="valeur-temps">
            <?php
            echo $this->recette['temps de préparation'];;
            ?>
          </p>
        </div>
        <div class="container-temps m-1 col-4">
          <p class="titre-temps">Temps de cuisson</p>
          <p id="valeur-cuisson" class="valeur-temps">
          <?php
            echo $this->recette['temps de cuisson'];;
            ?>
          </p>
        </div>
        <div class="container-temps m-1 col-4">
          <p class="titre-temps">Temps de repos</p>    
          <p id="valeur-repos" class="valeur-temps">
          <?php
            echo $this->recette['temps de repos'];;
            ?>
          </p>   
        </div>
    
      </div>

      <div class="container col-12">
      <p id="valeur-total" class="valeur-temps"> </p>   
      </div>
       

    </div>
    </div>
  </div>
   

 
   
   <div class="row">
   <div class="container-ingr col-4 " style="margin-left:6.5% ; height: fit-content;">
      <p id="titre-description" class="titre-blue" style="margin-left: 20%;" >Liste des Ingrédiants</p>
      <?php
      foreach ($this->ingrédiants as $row){
        echo '<div class="valeur-temps row">';
        echo '<div class="titre-temps col-4">'.$row['nom'].'</div>';
        echo '<div class="nom-ingrédiant col-4 pl-5 pb-5 ">'.$row['quantité'].' '.$row['unité'].'</div>';
        echo '<div class="titre-temps col-4 pl-5 pt-1">'.$row['quantité']*$row['calories'].' kcal</div>';
        echo '</div>';
      }
      ?>
    </div>


    <div class="container-ingr  col-4 ml-5">
    <p id="titre-description" class="titre-blue" style="margin-left: 20%; height: fit-content;" >étapes de préparation</p>
      <?php
      foreach ($this->étapes as $row){
        echo '<div class="valeur-temps ">';
        echo '<div id="text-description"><b>'.$row['ordre'].'</b>. '.$row['contenu'].'</div>';
        echo '</div>';
      }
      ?>
    </div>
   </div>
   

        <?php
         if ($this->recette['vidéo'] != ""){
           echo '<div class="container-vid  row" style="margin-right: 30%;margin-left: 30%;margin-top:3%">';
           echo '<div class="col-12" style="margin-left:70%">';
           echo '<p id="titre-description" class="col-12 titre-blue" style="margin-top:2%;" >Vidéo</p>';
           echo '</div>';
           echo '<div class=" col-12 d-flex justify-content-center">';
           echo '<video id="vidéo" class="mb-5" src="'.$this->recette['vidéo'] .'" preload="auto" loop width="400" height="400" controls autoplay></video>';
           echo '</div>';
           echo '</div>';
         }
         
         
    }

    public function script(){
        ?>
        <script src="../view/recette.js"></script>
        <?php
    }

    private function script_note(){
      ?>
        <script src="../view/note.js"></script>
        <?php
    }

    public function afficher_recette(){
        $this->entete_page("tayebli | recette");
        $this->menu();
        if (session_status() == PHP_SESSION_ACTIVE  and $_SESSION != []){
          $this->profil_menu();
          $this->profil_nom();
          $this->réseaux();
          $this->pop_noter();
        $this->recetteinfo();
        $this->noter();
      
      $this->suiterecetteinfo();
      $this->script_note();
      }
      else{
          $this->boutton_connexion();
          $this->réseaux();
          $this->login();
        $this->recetteinfo();
        $this->suiterecetteinfo();
      }
        
        $this->script();
        $this->pied_de_page();
    }
}

?>