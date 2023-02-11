<?php
class page_generale
{
    public function entete_page($titre){
        ?>
      <!DOCTYPE html>
<html lang="en">
        <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
    src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous">
  </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link id ="style" rel="stylesheet" href="../cards.css?v=1" type="text/css">
    <link rel="shortcut icon" href="./assets/Tayebli.svg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    
    <?php
    echo ' <title>'.$titre.'</title>';
    ?>
   
    </head>
        <?php
    }

    public function menu(){
        ?>
        <body>
          
          <div id="#contenu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <a class="navbar-brand" href="./index.html">
            <img src="./assets/Tayebli.svg" width="60" height="60" alt="">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li id="menu-acceuil"class="nav-item ">
              <a class="nav-link" href="../rooters/index.php">acceuil<span class="sr-only">(current)</span></a>
            </li>
            <li id="menu-news" class="nav-item ">
              <a class="nav-link" href="../rooters/index_news.php">news</a>
            </li>
            <li id="menu-idée_recette" class="nav-item ">
              <a class="nav-link" href="../rooters/index_idee.php">idées recette</a>
            </li>
            <li id="menu-healthy" class="nav-item ">
              <a class="nav-link" href="#">healthy</a>
            </li>
            <li id="menu-saisons" class="nav-item ">
                <a class="nav-link" href="#">saisons</a>
            </li>
            <li id="menu-fetes" class="nav-item ">
                <a class="nav-link" href="#">fetes</a>
            </li>
            <li id="menu-nutrition" class="nav-item ">
                <a class="nav-link" href="../rooters/index_nutrition.php">nutrition</a>
            </li>
            <li id="menu-contact" class="nav-item ">
                <a class="nav-link" href="#">contact</a>
            </li>
            
            
 
        <?php
    }

    public function boutton_connexion(){
      ?>
      <li id="menu-connexion" class="nav-item ">
                <a  id="connexion" type="button" class="btn btn-primary connect " href="#" style="color: white;"><div class="mt-1">Se connecter</div></a>
            </li>
      <?php

    }

    public function profil_menu(){
      ?>
      <li id="menu-profil" class="nav-item ">
      <a class="nav-link" href="./index_profil.php">profil</a>
            </li>
      <?php

    }

    public function profil_nom(){

    echo '<button  disabled class="btn btn-outlined-light ">Bienvenu, '.$_SESSION['nom'].' '.$_SESSION['prenom'].'</button>';
    echo '<form method="post" action="index.php">';
    echo '<button name="logout" value="logout" class="btn btn-outline-danger btn-sm" type="submit" style="height:2.5rem" >
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"></path>
    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"></path>
    </svg>
    déconnexion
    </Button>
  ';
    echo '</form>';
    
    }



    public function réseaux(){
      ?>
      <li id="menu-instagram" class="nav-item ml-5">
                <a class="nav-link" href="https://www.instagram.com/kamyl_tb/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
                </a>
            </li>
            <li id="menu-facebook" class="nav-item ml-3">
                <a class="nav-link" href="https://web.facebook.com/kamyl.tb">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
                </a>
            </li>
          </ul>
          
        </div>
      </nav>
      <?php
    }
    
    public function login(){
      ?>
       <div class="wrapper fadeInDown popup" style="position: fixed; z-index: 999999;">
  <div id="formContent">
    <button id="close" class="btn" style="margin-right: 90%;margin-left:3%;background-color: transparent;
  font-size: 30px;
  color: #1878F3;
  background:transparent;
  
">&times;</button>
    <div class="fadeIn first">
      
      <img src="./assets/Tayebli.svg" id="icon" alt="User Icon" style="width: 4rem; height: 4rem; margin: 5%;" />
      
    </div>

    <form action="index.php" method="post">
      <input required type="text" id="login" class="fadeIn second" name="login" placeholder="adresse mail">
      <input required type="password" id="password" class="fadeIn third" name="password" placeholder="mot de passe">
      <input type="submit" name="submit" class="fadeIn fourth btn connect" value="Log In" style="margin-right: 15%;margin-bottom:5%">
    </form>
    
    <div id="formFooter">
      <a class="underlineHover" href="../rooters/index_inscription.php">Vous etes nouveau ? Inscrivez-vous!</a>
    </div>

  </div>
</div>
      <?php
    }

public function pied_de_page(){
  ?>
   </body>
  <footer>
  <nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <a class="navbar-brand" href="./index.html">
            <img src="./assets/Tayebli.svg" width="60" height="60" alt="">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li id="menu-acceuil"class="nav-item ">
              <a class="nav-link" href="../rooters/index.php">acceuil<span class="sr-only">(current)</span></a>
            </li>
            <li id="menu-news" class="nav-item ">
              <a class="nav-link" href="../rooters/index_news.php">news</a>
            </li>
            <li id="menu-idée_recette" class="nav-item ">
              <a class="nav-link" href="#">idées recette</a>
            </li>
            <li id="menu-healthy" class="nav-item ">
              <a class="nav-link" href="#">healthy</a>
            </li>
            <li id="menu-saisons" class="nav-item ">
                <a class="nav-link" href="#">saisons</a>
            </li>
            <li id="menu-fetes" class="nav-item ">
                <a class="nav-link" href="#">fetes</a>
            </li>
            <li id="menu-nutrition" class="nav-item ">
                <a class="nav-link" href="#">nutrition</a>
            </li>
            <li id="menu-contact" class="nav-item ">
                <a class="nav-link" href="#">contact</a>
            </li>
            <li id="menu-instagram" class="nav-item ml-5">
                <a class="nav-link" href="https://www.instagram.com/kamyl_tb/">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
                </a>
            </li>
            <li id="menu-facebook" class="nav-item ml-3">
                <a class="nav-link" href="https://web.facebook.com/kamyl.tb">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
                </a>
            </li>
          </ul>
          
        </div>
      </nav>
  </footer>
  </div>
     
      </html>
  <?php
}

}

?>