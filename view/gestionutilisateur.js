$(document).ready(function () {
    $("#menu-gestion-utilisateurs").addClass("active");
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log(value);
        $("#tableau-recettes tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
});