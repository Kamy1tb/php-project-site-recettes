$(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      console.log(value);
      $("#tableau-recettes tr").filter(function() {
        $(this).toggle($(this).children(".nom-recette").eq(0).text().toLowerCase().indexOf(value) > -1)
      });
    });
    $("#temps_prep-filtre").on("click", function () {
        $(".filtres").css("background-color","#1878F3");
        $(".filtres").css("border-color","#1878F3");
        $(this).css("background-color","black");
        $(this).css("border-color","black");
        let tri = false;
        let val1 = 0 ;
        let val2 = 0;
       while ( tri == false){
        tri = true;
        for (let i=1; ( i < $("#tableau-recettes tr").length - 1);i++){
            
            val1 = parseInt($("#tableau-recettes tr").eq(i).children("td").eq(4).html().substring(0,2)) *60*60 + parseInt($("#tableau-recettes tr").eq(i).children("td").eq(4).html().substring(3,5))*60 + parseInt($("#tableau-recettes tr").eq(i).children("td").eq(4).html().substring(6,8)) ;
            val2 = parseInt($("#tableau-recettes tr").eq(i+1).children("td").eq(4).html().substring(0,2)) *60*60 + parseInt($("#tableau-recettes tr").eq(i+1).children("td").eq(4).html().substring(3,5))*60 + parseInt($("#tableau-recettes tr").eq(i+1).children("td").eq(4).html().substring(6,8)) ;
            console.log(val1);
            if ( val1 > val2){
                let str = $("#tableau-recettes tr").eq(i).html();
                console.log(str);
                $("#tableau-recettes tr").eq(i).html($("#tableau-recettes tr").eq(i+1).html());
                $("#tableau-recettes tr").eq(i+1).html(str);
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
        let val1 = 0 ;
        let val2 = 0;
       while ( tri == false){
        tri = true;
        for (let i=1; ( i < $("#tableau-recettes tr").length - 1);i++){
            val1 = parseInt($("#tableau-recettes tr").eq(i).children("td").eq(6).html().substring(0,2)) *60 * 60 + parseInt($("#tableau-recettes tr").eq(i).children("td").eq(6).html().substring(3,5)) * 60 + parseInt($("#tableau-recettes tr").eq(i).children("td").eq(6).html().substring(6,8))  ;
            val2 = parseInt($("#tableau-recettes tr").eq(i+1).children("td").eq(6).html().substring(0,2)) *60 * 60 + parseInt($("#tableau-recettes tr").eq(i+1).children("td").eq(6).html().substring(3,5)) * 60 + parseInt($("#tableau-recettes tr").eq(i+1).children("td").eq(6).html().substring(6,8));
            if ( val1 > val2){
                let str = $("#tableau-recettes tr").eq(i).html();
                $("#tableau-recettes tr").eq(i).html($("#tableau-recettes tr").eq(i+1).html());
                $("#tableau-recettes tr").eq(i+1).html(str);
                tri = false;
            }
        }
       }   
    });

    $("#temps_rep-filtre").on("click", function () {
        $(".filtres").css("background-color","#1878F3");
        $(".filtres").css("border-color","#1878F3");
        $(this).css("background-color","black");
        $(this).css("border-color","black");
        let tri = false;
        let val1 = 0 ;
        let val2 = 0;
       while ( tri == false){
        tri = true;
        for (let i=1; ( i < $("#tableau-recettes tr").length - 1);i++){
            
            val1 = parseInt($("#tableau-recettes tr").eq(i).children("td").eq(5).html().substring(0,2)) *60*60 + parseInt($("#tableau-recettes tr").eq(i).children("td").eq(5).html().substring(3,5))*60 + parseInt($("#tableau-recettes tr").eq(i).children("td").eq(5).html().substring(6,8)) ;
            val2 = parseInt($("#tableau-recettes tr").eq(i+1).children("td").eq(5).html().substring(0,2)) *60*60 + parseInt($("#tableau-recettes tr").eq(i+1).children("td").eq(5).html().substring(3,5))*60 + parseInt($("#tableau-recettes tr").eq(i+1).children("td").eq(5).html().substring(6,8)) ;
            console.log(val1);
            if ( val1 > val2){
                let str = $("#tableau-recettes tr").eq(i).html();
                console.log(str);
                $("#tableau-recettes tr").eq(i).html($("#tableau-recettes tr").eq(i+1).html());
                $("#tableau-recettes tr").eq(i+1).html(str);
                tri = false;
            }
        }
       }   
    });


    $("#recette-filtre").on("click", function () {
        $(".filtres").css("background-color","#1878F3");
        $(".filtres").css("border-color","#1878F3");
        $(this).css("background-color","black");
        $(this).css("border-color","black");
        let tri = false;
        let val1 = 0 ;
        let val2 = 0;
       while ( tri == false){
        tri = true;
        for (let i=1; ( i < $("#tableau-recettes tr").length - 1);i++){
            
            val1 = $("#tableau-recettes tr").eq(i).children("td").eq(0).html().toLowerCase();
            val2 = $("#tableau-recettes tr").eq(i+1).children("td").eq(0).html().toLowerCase();
            console.log(val1);
            if ( val1.localeCompare(val2) == 1){
                let str = $("#tableau-recettes tr").eq(i).html();
                $("#tableau-recettes tr").eq(i).html($("#tableau-recettes tr").eq(i+1).html());
                $("#tableau-recettes tr").eq(i+1).html(str);
                tri = false;
            }
        }
       }   
    });

    
  });