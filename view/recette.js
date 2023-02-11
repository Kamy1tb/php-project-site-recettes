
$(document).ready(function () {  
   $(".popup").css("display", "none");
   $("#menu-connexion").on("click", function () {
    $(".popup").css("display", "flex");
    $("#contenu").css("filter", "blur(5px)");
 });
 $("#close").on("click", function () {
    $(".popup").css("display", "none");
 });
    let value = $("#notes").attr('value');
    value = Math.round(value);
    for (let numero_star = 1; numero_star <= value; numero_star++) { // ajouter la note sur les étoiles
        $("#star"+numero_star.toString()).addClass("rating-color");
      }
      let Temps_total = new Date(0,0,0);
      
    let temps = String($("#valeur-preparation").html()).trim();
     if (temps.substring(0,2) !== "00") {
        $("#valeur-preparation").html(temps.substring(0,2)+" h "+temps.substring(3,5)+" min");
        Temps_total.setHours(Temps_total.getHours() + parseInt(temps.substring(0,2)));
        Temps_total.setMinutes(Temps_total.getMinutes() + parseInt(temps.substring(3,5))) ;
     }
     else {
        $("#valeur-preparation").html(temps.substring(3,5)+" min");
        Temps_total.setMinutes(Temps_total.getMinutes() + parseInt(temps.substring(3,5))) ;
     }

    temps = String($("#valeur-cuisson").html()).trim();

     if (temps.substring(0,2) !== "00") {
        $("#valeur-cuisson").html(temps.substring(0,2)+" h "+temps.substring(3,5)+" min");
        Temps_total.setHours(Temps_total.getHours() + parseInt(temps.substring(0,2)));
        Temps_total.setMinutes(Temps_total.getMinutes() + parseInt(temps.substring(3,5))) ;
       
     }
     else {
        $("#valeur-cuisson").html(temps.substring(3,5)+" min");
        Temps_total.setMinutes(Temps_total.getMinutes() + parseInt(temps.substring(3,5))) ;
     }

      temps = String($("#valeur-repos").html()).trim();
     if (temps.substring(0,2) !== "00") {
        $("#valeur-repos").html(temps.substring(0,2)+" h "+temps.substring(3,5)+" min");
        Temps_total.setHours(Temps_total.getHours() + parseInt(temps.substring(0,2)));
        Temps_total.setMinutes(Temps_total.getMinutes() + parseInt(temps.substring(3,5))) ;
     }
     else {
        $("#valeur-repos").html(temps.substring(3,5)+" min");
        Temps_total.setMinutes(Temps_total.getMinutes() + parseInt(temps.substring(3,5))) ;
     }
     $("#valeur-total").html("Temps Total : "+Temps_total.getHours()+" h " +Temps_total.getMinutes()+" min " );

     $("#valeur-calories").html((Math.round($("#valeur-calories").html())));

      let str = $("#valeur-difficulté").html() ;
     if (str.trim() == 'facile'){
        $("#valeur-difficulté").css('color', '#32CD32');
     } 
     if (str.trim() == 'moyen'){
        $("#valeur-difficulté").css('color', '#FF8C00');
     } 

     if (str.trim() == 'difficile'){
        $("#valeur-difficulté").css('color', '#FF0000');
     } 

     if (str.trim() == 'chef'){
        $("#valeur-difficulté").css('color', '#800080');
     }
     
     


});