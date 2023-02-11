$(document).ready(function () {
  $("#menu-nutrition").addClass("active");
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    console.log(value);
    $("#container-cards .card").filter(function() {
      $(this).toggle($(this).children().eq(1).children().eq(0).text().toLowerCase().indexOf(value) > -1)
    });
  });

  $("#saison").on("change", function () {
    var value = $(this).val().toLowerCase();
            console.log(value);
            if(value == 'any'){
              $("#container-cards .card").filter(function(){
                $(this).toggle($(this).children().eq(1).children().eq(3).text().toLowerCase().substring(8).indexOf(value)>-2);
              });
            }else{
              $("#container-cards .card").filter(function(){
                $(this).toggle($(this).children().eq(1).children().eq(3).text().toLowerCase().substring(8).indexOf(value)>-1);
              });
            }
            
            
  });
  
   
  

  $("#healthy").on("change", function () {
    var value = $(this).val().toLowerCase();
           
    if(value == 'any'){
      $("#container-cards .card").filter(function(){
        $(this).toggle($(this).children().eq(1).children().eq(3).text().toLowerCase().indexOf(value)>-2);
      });
    }else{
      $("#container-cards .card").filter(function(){
        $(this).toggle($(this).children().eq(1).children().eq(2).text().toLowerCase().indexOf(value)==1);
      });
    }  
  });

  $(".popup").css("display", "none");
   $("#menu-connexion").on("click", function () {
      $(".popup").css("display", "flex");
      $("#contenu").css("filter", "blur(5px)");
   });
   $("#close").on("click", function () {
      $(".popup").css("display", "none");
   });
});

