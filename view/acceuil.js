$(document).ready(function () {
   $("#menu-acceuil").addClass("active");
   
   $("#menu-connexion").on("click", function () {
      $(".popup").css("display", "flex");
      $("#contenu").css("filter", "blur(5px)");
   });
   $("#close").on("click", function () {
      $(".popup").css("display", "none");
   });
});