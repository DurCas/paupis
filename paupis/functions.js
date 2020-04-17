$(document).ready(function(){ 
    $('#buscar').change(function() {        
        var anunci      =   $('#anunci option:selected').val();;
        var districte   =   $('#districte option:selected').val();
        var sup_min     =   $('#sup_min').val();
        var sup_max     =   $('#sup_max').val();
        var n_habmin    =   $('#n_habmin').val();
        var n_habmax    =   $('#n_habmax').val();
        var n_lavmin    =   $('#n_lavmin').val();
        var n_lavmax    =   $('#n_laxmax').val();
        var orientacio  =   $('#orientacio option:selected').val();
        var buscar      =   $('#buscar option:selected').val();
        
        alert(  "Anunci: "                      + anunci+
                " <br>Districte: "              + districte+
                " <br>Superficie mínima: "      + sup_min+
                " <br>Superficie màxima: "      + sup_max+
                " <br>Nº Mínim Habitacions: "   + n_habmin+
                " <br>Nº Màxim Habitacions: "   + n_habmax+
                " <br>Nº Màxim Lavabos: "       + n_lavmin+
                " <br>Nº Mínim Lavabos: "       + n_lavmax+
                " <br>Orientacio: "             + orientacio+
                " <br>Buscar: "                 + buscar);

        $.ajax({
          method: "POST",
          //Des del document php no des de functions.js 
          url: "functions.php",
          //1. Clauamb la que passo el valor. El que recolliré al php
          //2. districte-> valor recollit f.121 alert(districte)
          data: { anunci: anunci, districte: districte, sup_min: sup_min, sup_max: sup_max, n_habmin: n_habmin, n_habmax: n_habmax, n_lavmin: n_lavmin, n_lavmax: n_lavmax, orientacio: orientacio, buscar: buscar }
        })
        .done(function(data){
          alert(data);
        //   $("#select_barri").html(data);
        //   $("#select_barri").prop("disabled", false);  
        });
    $('#result');    
    });
}); 