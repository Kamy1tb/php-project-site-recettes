<?php
require_once('../view/page.php');
class Catégorie_template extends page_generale{
  private $data_catégorie;
  private $max_calories;
  function __construct($data_catégorie,$max_calories){
    $this->data_catégorie = $data_catégorie;
    $this->max_calories = $max_calories;

    
}

 public function catégorie(){
    echo '<div class="row justify-content-center g-4">';
    echo '<div class="col-6  mt-5 mb-5">';
    echo  '<p> Trier par :</p>';
    echo '<input id="note-filtre"  type="submit"  name = "submit" value="notes"  class="btn btn-primary filtres mr-3"/>';
    echo '<input id="temps_prep-filtre" type="submit"  name = "submit" value="Temps préparation"  class="btn btn-primary filtres mr-3"/>';
    echo '<input id="temps_cuis-filtre" type="submit"  name = "submit" value="Temps cuisson"  class="btn btn-primary filtres mr-3"/>';
    echo '<input id="temps_total-filtre" type="submit"  name = "submit" value="Temps Total"  class="btn btn-primary filtres"/>';
    echo '</div>';
    echo '<div class="col-3 m-5 ">';
    echo '<p id="calories-barre" class="m-0 " ></p>';
    echo '<input id="calories-valeur" type="range" class="form-range" min="0" max="'.(round($this->max_calories['cal_max'],0,PHP_ROUND_HALF_UP) + 1).'" id="customRange2">' ;
    echo '</div>';

    echo '</div>';
    echo '<div class="text-catégorie">';
    echo '<p>'.$this->data_catégorie[0]['catégorie'].'</p>';
    echo '</div>';
    echo '<div class="cards-wrapper " style="background-color:#F7F7F7; border-radius: 16px; margin-left:17%;margin-right:17%;margin-bottom:10%;">';
    echo '<div class="row justify-content-center g-4">';
        foreach ($this->data_catégorie as $row) {
            echo '<div class="card m-2 col-lg-3 col-md-4" style="min-width: 15rem;">';
            echo '<img src="' . $row['image'] . '" class="card-img-top" alt="..." style="margin-top:3%;max-width:15rem;max-height:9rem;">';
            echo ' <input type="hidden" class="calories" name="calories" value="' . $row['calories'] . '" />';
            echo ' <input type="hidden" class="notes" name="notes" value="' . $row['notes'] . '" />';
            echo ' <input type="hidden" class="t_prep" name="notes" value="' . $row['temps de préparation'] . '" />';
            echo ' <input type="hidden" class="t_cuis" name="notes" value="' . $row['temps de cuisson'] . '" />';
            echo ' <input type="hidden" class="t_total" name="notes" value="' . $row['temps total'] . '" />';
            echo '<div class="card-body" >';
            echo '<h5 class="card-title">' . $row['titre'] . '</h5>';
            echo '<p class="card-text">' . substr($row['description'], 0, 55) . '...</p>';
            echo '<form action="index_news.php" method="GET">';
            echo ' <input type="hidden" class="id_recette" name="id_recette" value="' . $row['id_recette'] . '" />';
            echo '<input type="submit"  name = "submit"  class="btn btn-primary"/>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
    echo '</div>';
    echo '</div>';
 }
   
    public function carousel_catégorie(){
      ?>
      <?php
      echo '<div class="container-news">';
       ?>
    <div class="text-catégorie">
    <?php
      echo '<p>news</p>';
       ?>
    </div>
    <?php
      echo '<div id="news" class="carousel slide " data-ride="carousel">';
      echo '<ol class="carousel-indicators-news carousel-indicators">';
      $ind = count($this->data_catégorie) / 6;
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
      <script>
        $(document).ready(function(){
            $(".popup").css("display", "none");
             $("#menu-connexion").on("click", function () {
             $(".popup").css("display", "flex");
             $("#contenu").css("filter", "blur(5px)");
            });
            $("#close").on("click", function () {
             $(".popup").css("display", "none");
            })
            $("#calories-barre").html("nombre de calories maximal <br> <div style='margin-left:25%'> "+$("#calories-valeur").val().toLowerCase()+"</div>");
        $("#calories-valeur").on("change", function() {
        var value = $(this).val();
        $("#calories-barre").html("nombre de calories maximal <br> <div style='margin-left:25%'> "+value+"</div>");

        $(".card").filter(function() {
            console.log($(this).children(".calories").eq(0).val());

        $(this).toggle(parseFloat($(this).children(".calories").eq(0).val()) < parseFloat(value) );
        });
        });
        $("#note-filtre").on("click", function () {
            $(".filtres").css("background-color","#1878F3");
            $(".filtres").css("border-color","#1878F3");
            $(this).css("background-color","black");
            $(this).css("border-color","black");
            let tri = false;
           while ( tri == false){
            tri = true;
            for (let i=0; ( i < $(".card").length - 1);i++){
                if ($(".card").eq(i).children(".notes").eq(0).val() < $(".card").eq(i+1).children(".notes").eq(0).val()){
                    let str = $(".card").eq(i).html();
                    $(".card").eq(i).html($(".card").eq(i+1).html());
                    $(".card").eq(i+1).html(str);
                    tri = false;
                }
            }
           }
           
            
        });
        $("#temps_prep-filtre").on("click", function () {
            $(".filtres").css("background-color","#1878F3");
            $(".filtres").css("border-color","#1878F3");
            $(this).css("background-color","black");
            $(this).css("border-color","black");
            let tri = false;
           while ( tri == false){
            tri = true;
            for (let i=0; ( i < $(".card").length - 1);i++){
                if ($(".card").eq(i).children(".t_prep").eq(0).val() > $(".card").eq(i+1).children(".t_prep").eq(0).val()){
                    let str = $(".card").eq(i).html();
                    $(".card").eq(i).html($(".card").eq(i+1).html());
                    $(".card").eq(i+1).html(str);
                    tri = false;
                }
            }
           }   
        });

        $("#temps_cuis-filtre").on("click", function () {
            $(".filtres").css("background-color","#1878F3");
            $(".filtres").css("border-color","#1878F3");
            $(this).css("background-color","black");
            $(this).css("border-color","black");
            let tri = false;
           while ( tri == false){
            tri = true;
            for (let i=0; ( i < $(".card").length - 1);i++){
                if ($(".card").eq(i).children(".t_cuis").eq(0).val() > $(".card").eq(i+1).children(".t_cuis").eq(0).val()){
                    let str = $(".card").eq(i).html();
                    $(".card").eq(i).html($(".card").eq(i+1).html());
                    $(".card").eq(i+1).html(str);
                    tri = false;
                }
            }
           }   
        });


        $("#temps_total-filtre").on("click", function () {
            $(".filtres").css("background-color","#1878F3");
            $(".filtres").css("border-color","#1878F3");
            $(this).css("background-color","black");
            $(this).css("border-color","black");
            let tri = false;
           while ( tri == false){
            tri = true;
            for (let i=0; ( i < $(".card").length - 1);i++){
                if ($(".card").eq(i).children(".t_total").eq(0).val() > $(".card").eq(i+1).children(".t_total").eq(0).val()){
                    let str = $(".card").eq(i).html();
                    $(".card").eq(i).html($(".card").eq(i+1).html());
                    $(".card").eq(i+1).html(str);
                    tri = false;
                }
            }
           }   
        });
        
        });
</script> 
      </body>
      </html>
      <?php
    }

    public function afficher_acceuil(){
        $this->entete_page('Tayebli | catégorie');
        $this->menu();
        if ($_SESSION != []){
          $this->profil_menu();
          $this->profil_nom();
      }
      else{
          $this->boutton_connexion();
      }
        $this->réseaux();
        $this->login();
        $this->catégorie();
        $this->script();
        $this->pied_de_page();
    }

    

}

?>