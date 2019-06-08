// var repos = "modelo/common-instructor.php";

// $(document).ready(function(e) {
    
//     $.getJSON(repos,{op:'ListarInst'})
//         .done(function(data){
            
//             cont = 10;
//             $("#tbodyinstructor").html("");

//             $.each(data["lista"], function(i, val){
//                 cont++;

//                 $("#tbodyinstructor").append("\
//             <div class='container1'>\
//                 <div class='row'>\
//                     <div 'class=col-lg-3 col-md-3 col-sm-6 col-xs-12' 'title='$ "+ val.id + "'>" + val.id + "\
//                         <div 'class='my-list'>" + val.rutins + "\
//                             <img src='img/slider/1.jpg' 'alt=dsadas'/>\
//                             <span>'" + val.nomins +' '+val.apeins +"'</span>'\
//                             <div class='detail'>\
//                                 <img src='img/slider/2.jpg' alt='dsadas'/>\
//                                 <a href='http:korpovibro.cl/instructores-clases.php' class='btn btn-info'>ir a clases clases </a>\
//                             </div>\
//                         </div>\
//                     </div>\
//                 </div>\
//             </div>");
//             });
//         })
    
    
    
// });
    
   
var repos = "modelo/common-instructor.php";

$(document).ready(function(e) {
    
    $.getJSON(repos,{op:'ListarInst'})
        .done(function(data){
            
            cont = 10;
            $("#tbodyinstructor").html("");

            $.each(data["lista"], function(i, val){
                cont++;

                $("#tbodyinstructor").append("\
                    <div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>\
                        <div class='my-list'>\
                                <img id='foto1' style='' src='"+ val.fotoins +"' class='img-responsive'>\
                                <span id='nom' class='pull-left' " + val.idus + ">" + val.nomins +' '+val.apeins +"</span>\
                                <br>\
                            <span class='pull-right'>"+ val.tipus +"</span>\
                            <div class='offer'>Zumba Renca, AZ Zumba</div>\
                            <div class='detail'>\
                                <img id='foto2' style='height:150px; width:200px;margin:auto;display:block;' src='"+ val.fotoins +"' class='img-responsive'/>\
                                <a href='#' data-toggle='modal' class='verclases btn btn-info' data-idus='" + val.idus + "'>Mostrar Clases</a>\
                            </div>\
                        </div>\
                    </div>\
                    ");
            });
            
        })

     
    
    
    
});    
    
    
$(document).on("click", ".verclases", function(e){
    e.preventDefault();
   
    $('#myModal').modal('show');
    idus = $(this).data('idus');
    //alert(idus);

    $.getJSON(repos, {op:'ListarClases', idus:idus })
        .done(function(data){
            
            cont = 10;
            $("#instructorclass").html("");

            $.each(data["listaclass"], function(i, val){
                cont++;

                $("#instructorclass").append("\
                    <tr>\
                        <td scope='row'>"+val.tnombre+"</th>\
                        <td scope='row'>"+val.rphora+"</td>\
                        <td scope='row'>"+val.rfhora+"</td>\
                        <td scope='row'>"+val.rlugar+" </td>\
                    </tr>\
                ");
                        
            });
            $("instructrorclass").append("</tbody>")
        })
})    
    





