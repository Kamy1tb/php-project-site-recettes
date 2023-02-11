$(document).ready(function () {
    $("#menu-idée_recette").addClass("active");
    $(".popup").css("display", "none");
    $("#menu-connexion").on("click", function () {
       $(".popup").css("display", "flex");
       $("#contenu").css("filter", "blur(5px)");
    });
    $("#close").on("click", function () {
       $(".popup").css("display", "none");
    });
    let del_ingr = [];
    let del_ids = [];
    function addcard(id,nom,image,calories,healthy,saison,unité){
        let h ="";
        if (healthy == 1) {
            h = "healthy"
        }
        else{
            h = "unhealthy"
        }
        let card = $('<div class="card m-2" style="width: 15rem; max-height: 25rem;"><img src="'+image+'" class="card-img-top" style="width:15rem; height:9rem;"><div class="card-body"> <h4 class="card-title">'+nom+'('+unité+')</h4><p class="card-text">calories: '+calories+' kcal / '+h+'</p><p class="card-text">saison : '+saison+'</p><button  class="btn btn-danger  ">supprimer</button></div></div><input type="hidden" value="'+id+'" />');
        $(card).children().eq(1).children().eq(3).addClass("supp");
        $(card).insertAfter("#container-card");
    }
    $(document).on("DOMNodeInserted",".card", function() {
        $(".supp").on("click", function () {
            let index = del_ids.indexOf(parseInt($(this).parent().parent().next().val())) ;
            if(index != -1){
                ingrédiants.push([del_ingr[index][0],del_ingr[index][1],del_ingr[index][2],del_ingr[index][3],del_ingr[index][4],del_ingr[index][5]]);
            ids.push(del_ids[index]);
            let opt = $('<option  value="'+del_ids[index]+'">'+del_ingr[index][0]+' ('+del_ingr[index][5]+')</option>');
            $("#select-ingr").append(opt);
            $('#select-ingr').selectpicker('refresh');
            del_ids.splice(index,1);
            del_ingr.splice(index,1) ;  
            $("#form-ingr #"+index+"").remove();
            }
            
            $(this).parent().parent().remove();
            if(del_ids.length == 0){
                $("#submitIdee").attr("disabled", "true");
            };
        });
       
        });

        $('.searc-ingr select').selectpicker();
        
        $("#add").on("click", function () {
            $("#noresult").remove();
          $("#submitIdee").removeAttr("disabled");
          let click =parseInt($("#select-ingr option:selected").val());
          let index = ids.indexOf(click);
          addcard(ids[index],ingrédiants[index][0],ingrédiants[index][1],ingrédiants[index][2],ingrédiants[index][3],ingrédiants[index][4],ingrédiants[index][5]);
          $("#form-ingr").append("<input  name='id_ingrédiants[]' type='hidden' value='"+ids[index]+"' />");
          del_ids.push(ids[index]);
          del_ingr.push([ingrédiants[index][0],ingrédiants[index][1],ingrédiants[index][2],ingrédiants[index][3],ingrédiants[index][4],ingrédiants[index][5]]);
          ids.splice(index,1);
          ingrédiants.splice(index,1) ;
          $("#select-ingr option:selected").remove();
          $('#select-ingr').selectpicker('refresh');
         
        });
        $(document).on("DOMNodeInserted","input", function() {
            let i = 0 ;
            $('#form-ingr input').each(function(){
                $(this).attr("id", i);
                i++ ;
            });
           
          
        });
        
        
});
