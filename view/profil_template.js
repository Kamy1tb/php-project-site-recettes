$(document).ready(function () {
    $("#formulaire_suggest").css("display", "none");
    $("#suggest-btn").on("click", function () {
        $("#formulaire_suggest").css("display", "block");
    });

    $(document).on("DOMNodeInserted", ".supp", function() {
        $(this).addClass("inputs");
      $(this).click(function() {
        $($(this).prev().prev()).remove();
          $($(this).prev()).remove();
          $($(this)).remove();
          });
        });
        $(document).on("DOMNodeInserted", ".supp_et", function() {
        $(this).addClass("inputs");
         $(this).click(function() {
          $($(this).prev()).remove();
          $($(this)).remove();
          });
        });

      $(document).on("DOMNodeInserted", ".searc-ingr select", function() {
        $(this).attr("name", "ingrédiants[]");
        });
        $(document).on("DOMNodeInserted", ".searc-ingr textarea", function() {
        $(this).attr("name", "étapes[]");
        });

        
        $("#inputImage").on("change", function () {
            $("#img-view").attr("src", "./assets/recettes/"+$("#inputImage").val().substring(12));
            $("#imgInput").attr("value", "./assets/recettes/"+$("#inputImage").val().substring(12));
        });
        $("#inputVideo").on("change", function () {
            $("#vidInput").attr("value", "./assets/vidéo/"+$("#inputVideo").val().substring(12));
        });

        $('.searc-ingr select').selectpicker();
        $("#add").on("click", function () {
          let $select = $(".searc-ingr select").clone();
          let $input = "<input required class='col-3 form-control m-0 ' name='quantité[]'  id='myInput' type='text'  placeholder='Quantité'>";
          let $butt = "<button id='delete' type='button' class='supp col-1 ml-1 btn btn-danger btn-sm' style='height:80%'>delete</button>";
          $($select[0]).insertBefore("#add");
          $($input).insertBefore("#add");
          $($butt).insertBefore("#add");
          $('.searc-ingr select').selectpicker();
         
        });
        $("#add_et").on("click", function () {
          let $input = '<textarea required  name="étapes[]" class=" col-8 mb-2 inputs form-control"  rows="3"></textarea>';
          let $butt = '<button id="delete_et" type="button" class="inputs supp_et col-1 ml-1 mt-4 btn btn-danger btn-sm " style="height:80%">delete</button>';
          $($input).insertBefore("#add_et");
          $($butt).insertBefore("#add_et");
          $('.searc-ingr select').selectpicker();
         
        });
        $(".supp").on("click", function () {
          $($(this).prev().prev()).remove();
          $($(this).prev()).remove();
          $($(this)).remove();
        });
        $(".supp_et").on("click", function () {
          $($(this).prev()).remove();
          $($(this)).remove();
        });
});