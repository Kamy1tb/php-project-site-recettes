$(document).ready(function () {
    $("#menu-news").addClass("active");
    $("#style").attr("href", "../news.css?v=1");
    $(".popup").css("display", "none");
   $("#menu-connexion").on("click", function () {
      $(".popup").css("display", "flex");
      $("#contenu").css("filter", "blur(5px)");
   });
   $("#close").on("click", function () {
      $(".popup").css("display", "none");
   });
 });