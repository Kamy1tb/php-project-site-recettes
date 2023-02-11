<?php 
require_once('../view/page.php');
class Newstemplate_view extends page_generale 
{

    private $news;
    function __construct($news){
        $this->news = $news;

        
    }

    public function newsinfo()
    {
        ?>
        
  <div class="row">
    <div class="container-image col-12">
      <div class="text-image row">
        <div class=" news-titre col-8">
          <?php
            echo '<p id="titre-news" >'.$this->news['titre'].'</p>';
                   ?>
        </div>
       
      </div>
      <div class="image-recette">
        <?php
        echo '<img id="recette-image" src="'.$this->news['image'].'" alt="" ">' ;
        ?>
      </div>
    </div>
    
  </div>
  <div class="row">
  <div class="container-information col-8">
      <div class="row">
      <?php
        echo '<p id="titre-description" class="titre-blue" >'.$this->news["description"].'</p>';
        ?>
      </div>
      <div class="container-desc col-12">
        <?php
        echo '<p id="text-description" class="col-10">'.$this->news["contenu"].'</p>';
        ?>
      </div>
    
    </div>
  </div>
        <?php
    }

    public function script(){
        ?>
        <script >
            $(document).ready(function () {
             $("#menu-news").addClass("active");
             $(".popup").css("display", "none");
             $("#menu-connexion").on("click", function () {
      $(".popup").css("display", "flex");
      $("#contenu").css("filter", "blur(5px)");
   });
   $("#close").on("click", function () {
      $(".popup").css("display", "none");
   });
                });
        </script>
        <br>
        <br>
        <br>
        <?php
    }

    public function afficher_acceuil(){
        $this->entete_page("tayebli | news");
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
        $this->newsinfo();
        $this->script();
        $this->pied_de_page();
    }
   
}

?>