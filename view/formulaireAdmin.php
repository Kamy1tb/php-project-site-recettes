<?php 
require_once('../view/pageAdmin.php');
class AdminForm_view extends page_Admin 
{
    public function formulaire(){
        ?>
        <div class="d-flex justify-content-center">
            <h1 >Espace admin</h1>
        </div>
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
    <form action="index_acceuil_admin.php" method="post">
      <input required type="text" id="login" class="fadeIn second" name="login" placeholder="pseudo">
      <input  type="password" id="password" class="fadeIn third" name="password" placeholder="mot de passe">
      <input type="submit" name="submit" class="fadeIn fourth btn connect" value="Log In" style="margin-right: 15%;margin-bottom:5%">
    </form>


  </div>
</div>
        <?php

    }
    public function afficher_acceuil(){
        $this->entete_page("tayebli | Login Admin");

        $this->formulaire();
    }
 

}

?>