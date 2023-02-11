<?php
require_once('../view/page.php');
class Acceuil extends page_generale{

    public function diaporama(){
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <?php
        require('../view/diaporamadata.php');
        ?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
        <?php
    }
    public function découverte(){
        ?>
        <div id="decouverte">
        <p>Découvrez des plats spécialement conçus pour vous !</p>
      </div>
      </body>
        <?php
    }

    public function catégorieData($catégorie){
require_once('../controler/meilleursplatcontroler.php');
try{
$controller = new Meilleurplat_controler();
$data = $controller->get_catégorie($catégorie);

$i = 0 ;

foreach ($data as $row) {
    if ($i == 0){
        echo '<div class="carousel-item active carousel-item-cards">';
        echo '<div class="cards-wrapper" style="background-color:#F7F7F7; border-radius: 16px;">';
        echo '<div class="card m-2"style="width: 15rem;">';
        echo '<img src="'.$row['image'].'" class="card-img-top" alt="..." style="width:15rem;height:9rem;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row['titre'].'</h5>';
        echo '<p class="card-text">'.substr($row['description'], 0, 55).'...</p>';
        echo '<form action="index.php" method="POST">';
        echo ' <input type="hidden" class="id_recette" name="id_recette" value="'.$row['id_recette'].'" />';
        echo '<input type="submit"  name = "submit"  class="btn btn-primary"/>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        


    }
    else{
       if ($i % 3 == 0){
        echo '</div>';
        echo '</div>';
        echo '<div class="carousel-item  carousel-item-cards">';
        echo '<div class="cards-wrapper" style="background-color:#F7F7F7; border-radius: 16px;">';
        echo '<div class="card m-2"style="width: 15rem;">';
        echo '<img src="'.$row['image'].'" class="card-img-top" alt="..." style="width:15rem;height:9rem;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row['titre'].'</h5>';
        echo '<p class="card-text">'.substr($row['description'], 0, 55).'...</p>';
        echo '<form action="index.php" method="POST">';
        echo ' <input type="hidden" class="id_recette" name="id_recette" value="'.$row['id_recette'].'" />';
        echo '<input type="submit" name = "submit" class="btn btn-primary"/>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
       }
       else {
        echo '<div class="card m-2"style="width: 15rem;">';
        echo '<img src="'.$row['image'].'" class="card-img-top" alt="..." style="width:15rem; height:9rem;">';
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

    }
        $i++;
}
echo '</div>';
echo '</div>';

}
catch(Exception $e) {echo 'erreur'.$e->getMessage();}


 
    }

    public function catégorie($catégorie){
      ?>
      <?php
      echo '<div class="container-'.$catégorie.'s">';
       ?>
    <div class="text-catégorie">
    <?php
      echo '<p>'.$catégorie.'s</p>';
       ?>
    </div>
    <?php
      echo '<div id="'.$catégorie.'s" class="carousel slide catégories" data-ride="carousel">';
       ?>
      <ol class="carousel-indicators-cards carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner" >
      <?php
        $this->catégorieData($catégorie);
        ?>
      </div>
      <?php
      echo '<a id="carousel-cards-prev" class="carousel-control-prev" href="#'.$catégorie.'s" role="button" data-slide="prev" >';
       ?>
        <img src="./assets/chevron_left_FILL0_wght400_GRAD0_opsz48.svg" alt="aaaaaa">
        <span class="sr-only" >Previous</span>
      </a>
      <?php
      echo '<a id="carousel-cards-next" class="carousel-control-next" href="#'.$catégorie.'s" role="button" data-slide="next" >';
       ?>
        <img src="./assets/chevron_right_FILL0_wght400_GRAD0_opsz48.svg" alt="">
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
      <div style="margin-left: 39%; margin-right: 50%; margin-bottom: 5%;">
      <?php
      
      echo '<form action="index.php" method="POST">';
      echo ' <input type="hidden" class="catégorie" name="catégorie" value="'.$catégorie.'" />';
      echo '<input type="submit"  name = "submit" value="Voir Plus" class="btn btn-primary" style="width: 20rem;height:2rem;"/>';
      echo '</form>';
      echo '</div>';
    }

    private function script(){
      ?>
      <script>$(".popup").css("display", "none");</script>
      <script src="../view/acceuil.js"></script>
     
      <?php
    }

    private function script_failed(){
      ?>
      
      <script src="../view/acceuil.js">
      </script>

      <script>
        $(".form").on("click", function () {
          $("#err").remove();
        });
      </script>
      
      <?php
    }

    public function login_failed($cause){
      ?>
       <div class="wrapper fadeInDown popup" style="position: fixed; z-index: 999999;">
  <div id="formContent">
    <button id="close" class="btn form" style="margin-right: 90%;margin-left:3%;background-color: transparent;
  font-size: 30px;
  color: #1878F3;
  background:transparent;
  
">&times;</button>
    <div class="fadeIn first">
      
      <img src="./assets/Tayebli.svg" id="icon" alt="User Icon" style="width: 4rem; height: 4rem; margin: 5%;" />
      
    </div>
     <div class="d-flex justify-content-center">
      <?php
      echo '<h5 id="err" style="color:red;">'.$cause.'</h5>';
      ?>
     </div>
    <form action="index.php" method="POST">
      <input required type="text" id="login" class="fadeIn second form" name="login" placeholder="adresse mail">
      <input required type="password" id="password" class="fadeIn third form" name="password" placeholder="mot de passe">
      <input type="submit" name="submit" class="fadeIn fourth btn connect form" value="Log In" style="margin-right: 15%;margin-bottom:5%">
    </form>
    
    <div id="formFooter">
      <a class="underlineHover" href="../rooters/index_inscription.php">Vous etes nouveau ? Inscrivez-vous!</a>
    </div>

  </div>
</div>
      <?php
    }


    public function afficher_acceuil(){
        $this->entete_page('Tayebli | acceuil');
        $this->menu();
        if (session_status() == PHP_SESSION_ACTIVE and $_SESSION != [] ){
          
          $this->profil_menu();
          $this->profil_nom();
      }
      else{
          $this->boutton_connexion();
      }
        $this->réseaux();
        $this->login();
        $this->diaporama();
        $this->découverte();
        $this->catégorie("entrée");
        $this->catégorie("plat");
        $this->catégorie("dessert");
        $this->catégorie("boisson");
    $this->script();
    $this->pied_de_page();
    }

    public function afficher_loginfailed($cause){
      $this->entete_page('Tayebli | acceuil');
      $this->menu();
        $this->boutton_connexion();
    
      $this->réseaux();
      $this->login_failed($cause);
      $this->diaporama();
      $this->découverte();
      $this->catégorie("entrée");
      $this->catégorie("plat");
      $this->catégorie("dessert");
      $this->catégorie("boisson");
      $this->script_failed();
      $this->pied_de_page();
  }


}

?>