<?php
require_once('../view/page.php');
class News_acceuil extends page_generale{
  private $news;
  function __construct($news){
    $this->news = $news;

    
}
    public function newsData(){

$i = 0 ;

foreach ( $this->news as $row) {
    if ($i == 0){
        echo '<div class="carousel-item active carousel-item-news">';
        echo '<div class="cards-wrapper container container-news" style="background-color:#F7F7F7; border-radius: 16px;">';
        echo '<div class="row row-cols-1 row-cols-md-2 g-4">';
        echo '<div class="col col-4">';
        echo '<div class="card m-2"style="width: 15rem;">';
        echo '<img src="'.$row['image'].'" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row['titre'].'</h5>';
        echo '<p class="card-text">'.substr($row['description'], 0, 55).'...</p>';
        echo '<form action="index_news.php" method="GET">';
        if ($row['id_recette'] != ""){
          echo ' <input type="hidden" class="id_recette" name="id_recette" value="'.$row['id_recette'].'" />';
        }
        else{
          echo ' <input type="hidden" class="id_recette" name="id_news" value="'.$row['id_news'].'" />';
        }
        echo '<input type="submit"  name = "submit"  class="btn btn-primary"/>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }
    else{
       if ($i % 6 == 0){
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="carousel-item  carousel-item-news">';
        echo '<div class="cards-wrapper container container-news" style="background-color:#F7F7F7; border-radius: 16px;">';
        echo '<div class="row row-cols-1 row-cols-md-2 g-4">';
        echo '<div class="col col-4">';
        echo '<div class="card m-2"style="width: 15rem;">';
        echo '<img src="'.$row['image'].'" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row['titre'].'</h5>';
        echo '<p class="card-text">'.substr($row['description'], 0, 55).'...</p>';
        echo '<form action="index_news.php" method="GET">';
        if ($row['id_recette'] != ""){
          echo ' <input type="hidden" class="id_recette" name="id_recette" value="'.$row['id_recette'].'" />';
        }
        else{
          echo ' <input type="hidden" class="id_recette" name="id_news" value="'.$row['id_news'].'" />';
        }
        echo '<input type="submit"  name = "submit"  class="btn btn-primary"/>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

       } else {
        if ($i % 3 == 0 ){
        echo '</div>';
        echo '<div class="row row-cols-1 row-cols-md-2 g-4">';
        echo '<div class="col col-4">';
        echo '<div class="card m-2"style="width: 15rem;">';
        echo '<img src="'.$row['image'].'" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">'.$row['titre'].'</h5>';
        echo '<p class="card-text">'.substr($row['description'], 0, 55).'...</p>';
        echo '<form action="index_news.php" method="GET">';
        if ($row['id_recette'] != ""){
          echo ' <input type="hidden" class="id_recette" name="id_recette" value="'.$row['id_recette'].'" />';
        }
        else{
          echo ' <input type="hidden" class="id_recette" name="id_news" value="'.$row['id_news'].'" />';
        }
        echo '<input type="submit"  name = "submit"  class="btn btn-primary"/>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';


        } else{
          echo '<div class="col col-4">';
          echo '<div class="card m-2"style="width: 15rem;">';
          echo '<img src="'.$row['image'].'" class="card-img-top" alt="...">';
          echo '<div class="card-body">';
          echo '<h5 class="card-title">'.$row['titre'].'</h5>';
          echo '<p class="card-text">'.substr($row['description'], 0, 55).'...</p>';
          echo '<form action="index_news.php" method="GET">';
          if ($row['id_recette'] != ""){
            echo ' <input type="hidden" class="id_recette" name="id_recette" value="'.$row['id_recette'].'" />';
          }
          else{
            echo ' <input type="hidden" class="id_recette" name="id_news" value="'.$row['id_news'].'" />';
          }
          echo '<input type="submit"  name = "submit"  class="btn btn-primary"/>';
          echo '</form>';
          echo '</div>';
          echo '</div>';
          echo '</div>';

        }
       }
       

    }
        $i++;
}
echo '</div>';
echo '</div>';
echo '</div>';

}

    public function carousel_news(){
      ?>
      <?php
      echo '<div class="container-news">';
       ?>
    <div class="text-catégorie">
    <?php
      echo "<p>Decouvrez toute l'actualité</p>";
       ?>
    </div>
    <?php
      echo '<div id="news" class="carousel slide " data-ride="carousel">';
      echo '<ol class="carousel-indicators-news carousel-indicators">';
      $ind = count($this->news) / 6;
    for ($i = 0; $i < $ind; $i++ ){
      if ($i == 0){
        echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>';
      }
      else{
        echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
      }
      } 
      echo '</ol>';
       ?>
      <div class="carousel-inner" >
      <?php
        $this->newsData();
        ?>
      </div>
      <?php
      echo '<a id="carousel-cards-prev" class="carousel-control-prev" href="#news" role="button" data-slide="prev" >';
       ?>
        <img src="./assets/chevron_left_FILL0_wght400_GRAD0_opsz48.svg" alt="aaaaaa">
        <span class="sr-only" >Previous</span>
      </a>
      <?php
      echo '<a id="carousel-cards-next" class="carousel-control-next" href="#news" role="button" data-slide="next" >';
       ?>
        <img src="./assets/chevron_right_FILL0_wght400_GRAD0_opsz48.svg" alt="">
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
      <?php

    }

    private function script(){
      ?>
      <script src="../view/acceuil_news.js"></script>
      </body>
      </html>
      <?php
    }

    public function afficher_acceuil(){
        $this->entete_page('Tayebli | news');
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
    $this->carousel_news();
        $this->script();
        $this->pied_de_page();
    }

    

}

?>