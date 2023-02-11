<?php 
require_once('../view/page.php');
class Inscription_view extends page_generale
{

    public function textdebut(){
      ?>
      <div class="flex justify-content-center mt-3">
        <div class="row col-12"><h1 id="" > Bienvenu dans Tayebli !</h1></div>
         <div class="row col-12 mb-1"><h4 id="" >Incrivez-vous afin de bénéficier de plusieurs fonctionnalités qui vont rendre votre exprérience culinaire unique</h4></div>
        </div>
      <?php
    }

    public function logerror(){
      ?>
      <div class="d-flex justify-content-center">
      <h5 id="log" style="color: red;">Mail deja existant !</h5>
    </div>
      <?php
    }
    public function formInscription(){
        ?>
        
     
      <div class="container-desc mb-5" style="margin-left: 25%;margin-right: 23%;">
    <form  action="../rooters/index_inscription.php" method="post">
  
    
      <label for="inputTitre" class="col-12 mt-5"><b>Nom</b></label>
         <input required  type="text" name="nom" class="inputs form-control" id="inputNom" placeholder="Nom" >
  
      <label for="inputTitre" class="col-12"><b>Prénom</b></label>
         <input required  type="text" name="prénom" class="inputs form-control" id="inputPrénom" placeholder="Prénom" >
  
  
  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 50%;margin-right: 50%;margin-top: 3%;">
      <label for="inputTitre" class="col-12"><b> Date de naissance</b></label>
         <input required  type="date" name="date_de_naissance" class="inputs form-control" id="inputDate"  >
    </div>
  </div>
  <div class="form-row justify-content-center">
    <div class="form-group col-md-5 " style="margin-left: 30%;margin-right: 30%;margin-top: 3%;">
      <label for="inputSexe" class="col-12"><b>Sexe</b></label>
  <select name="sexe" class="inputs custom-select mr-sm-2" id="inputSexe" >
           <option selected value="masculin">Masculin</option>
           <option value="féminin">Féminin</option>
      </select>
      </div>
      </div>

      <label for="inputTitre" class="col-12"><b>Adresse mail</b></label>
         <input required  type="text" name="mail" class="inputs form-control col-11" id="inputMail" placeholder="exemple@yourmail.com" >
    
  
    <div class="form-group " style="">
      <label for="inputPassword" class="col-12"><b>Mot de passe</b></label>
         <input required  type="password" name="password" class="inputs form-control col-11" id="inputPassword" placeholder="Mot de passe" >
    </div>
  
 
  
   <div class="justify-content-center ">
   <button id="submitEdit" type="submit" name="inscription"  class="btn btn-primary mb-5" value="valider" style="width: 30%; margin-left: 34%;margin-top:3%">Valider</button>
   </div>
  
</form>
</div>
        <?php
    }    

    public function script(){
        ?>
        <script>
        $(".popup").css("display", "none");
        $("#menu-connexion").on("click", function () {
       $(".popup").css("display", "flex");
       $("#contenu").css("filter", "blur(5px)");
    });
    $("#close").on("click", function () {
       $(".popup").css("display", "none");
    });
        </script>
        
        <?php
    }


    public function mailexist(){
      ?>
      <script>
        
        $("#inputMail").css("border-style", "solid");
        $("#inputMail").css("border-width", "1px");
        $("#inputMail").css("border-color", "red");
        $("#inputMail").css("background-color", "white");

        $("#inputMail").on("click", function () {
          $("#inputMail").css("border-width", "0px");
          $("#inputMail").css("background-color", "#f6f6f6");
          $("#log").remove();
          
        });

      </script>
      <?php
    }
    

    public function afficher_acceuil(){
        $this->entete_page("tayebli | Inscription");
        $this->menu();
        $this->boutton_connexion();
        $this->réseaux();
        $this->login();
        $this->textdebut();
        $this->formInscription();
        $this->script();
        $this->pied_de_page();
    }


    public function erreur_mail(){
      $this->entete_page("tayebli | Inscription");
        $this->menu();
        $this->boutton_connexion();
        $this->réseaux();
        $this->login();
        $this->textdebut();
        $this->logerror();
        $this->formInscription();
        $this->script();
        $this->mailexist();
        $this->pied_de_page();
      
    }
}

?>