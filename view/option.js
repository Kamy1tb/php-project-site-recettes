$(document).ready(function () {
    $("#menu-option").addClass("active");
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log(value);
        $("#tableau-diaporama tbody tr ").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#inputImage").on("change", function () {
        $("#img-view").attr("src", "http://localhost/Taibi_Kamyl_SIL1/rooters/assets/diaporama/"+$("#inputImage").val().substring(12));
        $("#imgInput").attr("value", "http://localhost/Taibi_Kamyl_SIL1/rooters/assets/diaporama/"+$("#inputImage").val().substring(12));
    });

    $("#pourentage-valeur").on("change", function () {
        $("#valll").html("Changer pourcentage idée recette ("+$("#pourentage-valeur").val()+")");
    });
});