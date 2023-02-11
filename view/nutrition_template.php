<?php 
require_once('../view/page.php');
class Nutrition_view extends page_generale 
{

  private $all_ingr;

    function __construct($all_ingr){
        $this->all_ingr = $all_ingr;    
    }

    public function filters(){
        ?>
        
        <?php
    }
    public function formNutrition(){
        ?>
    <div class="d-flex justify-content-center">
    <div class="col-6  mt-5 ">
        <input class="form-control" id="myInput" type="text" placeholder="Rechercher un ingrédiant..">
        </div>
    </div>
    <div class="row">
    <div class="col-3">
        <p class="card-title ">Saison :</p>
                <select name="saison" id="saison" class="form-control">
                    <option value="any">Tout</option>
                    <option value="tout">Toute l'année</option>
                    <option>Automne</option>
                    <option>Hiver</option>
                    <option>Printemps</option>
                    <option>été</option>
                </select>
              </div>

              <div class="col-3">
        <p class="card-title ">Healthy :</p>
                <select name="healthy" id="healthy" class="form-control">
                    <option value="any">tout</option>
                    <option value="healthy">Healthy</option>
                    <option>Unhealthy</option>
                </select>
              </div>
    </div>
    
    
      <div class="justify-content-center">
   <div id="container-cards" class="row" style="margin-bottom: 30%;">
        <?php
         foreach ($this->all_ingr as $ingr){
            if ($ingr['healthy'] == "1"){

                echo '<div class="card m-2" style="width: 15rem; max-height: 25rem;"><img src="'.$ingr['image'].'" class="card-img-top" style="max-width:15rem; max-height:11rem;"><div class="card-body"> <h4 class="card-title">'.$ingr['nom'].'('.$ingr['unité'].')</h4><p class="card-text">calories: '.($ingr['calories'] * 100).' kcal </p><p class="card-text" style="color:#1878F3"> Healthy </p><p class="card-text" style="color:#1878F3">saison: '.$ingr['saison'].'</p></div></div>';

            }
            else{

                echo '<div class="card m-2" style="width: 15rem; max-height: 25rem;"><img src="'.$ingr['image'].'" class="card-img-top" style="max-width:15rem; max-height:11rem;"><div class="card-body"> <h4 class="card-title">'.$ingr['nom'].'('.$ingr['unité'].')</h4><p class="card-text" >calories: '.($ingr['calories'] * 100).' kcal </p><p class="card-text" style="color:red"> Unhealthy </p><p class="card-text" style="color:#1878F3">saison: '.$ingr['saison'].'</p></div></div>';

            }
        
         }
        ?>
        
        </div>
        </div>
      

        <?php
    }    

    public function script(){
        ?>
        <script>
            
        </script>

        <script src="../view/nutrition.js"></script>
        <?php
    }    

    public function afficher_acceuil(){
        $this->entete_page("tayebli | Nutrition");
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
        $this->filters();
        $this->formNutrition();
        $this->script();
        $this->pied_de_page();
    }
  
}

?>