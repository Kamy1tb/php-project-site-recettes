$(document).ready(function () {
    $("#noter").on("click", function () {
        $(".popup").css("display", "flex");
    });

    $("#starn1").on("click" ,function () {
        $("#starn1").addClass("rating-color");
        $("#starn2").removeClass("rating-color");
        $("#starn3").removeClass("rating-color");
        $("#starn4").removeClass("rating-color");
        $("#starn5").removeClass("rating-color");
        $("#valeur-note").attr("value", "1");
    });

    $("#starn2").on("click" ,function () {
        $("#starn1").addClass("rating-color");
        $("#starn2").addClass("rating-color");
        $("#starn3").removeClass("rating-color");
        $("#starn4").removeClass("rating-color");
        $("#starn5").removeClass("rating-color");
        $("#valeur-note").attr("value", "2");
    });

    $("#starn3").on("click" ,function () {
        $("#starn1").addClass("rating-color");
        $("#starn2").addClass("rating-color");
        $("#starn3").addClass("rating-color");
        $("#starn4").removeClass("rating-color");
        $("#starn5").removeClass("rating-color");
        $("#valeur-note").attr("value", "3");
    });


    $("#starn4").on("click" ,function () {
        $("#starn1").addClass("rating-color");
        $("#starn2").addClass("rating-color");
        $("#starn3").addClass("rating-color");
        $("#starn4").addClass("rating-color");
        $("#starn5").removeClass("rating-color");
        $("#valeur-note").attr("value", "4");
    });


    $("#starn5").on("click" ,function () {
        $("#starn1").addClass("rating-color");
        $("#starn2").addClass("rating-color");
        $("#starn3").addClass("rating-color");
        $("#starn4").addClass("rating-color");
        $("#starn5").addClass("rating-color");
        $("#valeur-note").attr("value", "5");
    });


   
   
});