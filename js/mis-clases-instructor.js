var repos = "http://korpovibro.cl/modelo/common-registra-clases.php";
var repos_avisar = "http://korpovibro.cl/modelo/avisar-alumno.php";
var repos_eliminar = "http://korpovibro.cl/modelo/avisar-clase-eliminada.php";
//var repos_avisar = "https://desarrollo.estoyseguro.cl/modelo/avisar-alumno.php";
//var repos_eliminar = "http://desarrollo.estoyseguro.cl/modelo/avisar-clase-eliminada.php";

//Variables de formulario de registro de clase
var nombreclase = '';
var horainicio = '';
var horafin = '';
var tipoclase;

var autocomplete;
var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

var direccion1 = "";
var direccion2 = "";
var marker = []; // marcadores
var markers = []; // Arreglo marcadoress
var map;
var bandera = false;
var marcadores = [];
var lugares = {};

$(function () {
    $('#datetimepicker1').datetimepicker();

});


$(function () {
    $('#datetimepicker2').datetimepicker();

});
$(function () {
    $('#datetimepicker3').datetimepicker();

});


$(function () {
    $('#datetimepicker4').datetimepicker();

});

$(function () {
    $('#datetimepicker5').datetimepicker();

});


$(function() {
    $(".nav > li").click(function() {
    //Busca todos los elementos del nav que tengan la clase active y los elimina
  $(this).closest('.nav').find('li').removeClass('active');
  //Al elemento seleccionado agrega la clase active
          $(this).addClass('active');
      });
});

$('#show').click(function(){
     $('#map').toggle();
 })
 
//  OBTENER PUNTOS DE CLASES 
$(document).ready(function () {

    // $.getJSON(repos, {op:'getuser' })
    //     .done(function(datauser){
    //         console.log(datauser);
    //         $("#iduser").val(datauser);
    //     })

    $.getJSON(repos, {op:'ListarClases' })
        .done(function(data){
            
            cont = 10;
            $("#clases").html("");

            $.each(data["listaclass"], function(i, val){
                cont++;

                $("#clases").append("\
                    <tr>\
                        <td class='col-sm-3' scope='row'>"+val.rnclase+"</th>\
                        <td class='col-sm-2' scope='row'>"+val.tnombre+"</th>\
                        <td class='col-sm-3' scope='row'>"+val.rphora+"</td>\
                        <td class='col-sm-3' scope='row'>"+val.rfhora+"</td>\
                        <td class='col-sm-3' scope='row'>"+val.rlugar+" </td>\
                        <td scope='row'>"+val.restado+" </td>\
                        <td><button class='btn btn-primary' onclick=(funtiondatos(" + val.rid +"))>Ver Clase</button></td>\
                    </tr>\
                ");
                        
            });
            $("#clases").append("</tbody>")
        })

    $.getJSON(repos, { op: 'getfoto',})
        .done(function (data) {
            //dato = data.da                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   to;
            //alert(data.nombre);
            
            //$("#foto").val(data.foto);
            $('#foto').attr('src', data.foto);
    });  

    $.getJSON(repos, { op: 'gettipoclases' })
        .done(function (data) { 
            var out = "<option value='Seleccione'>Tipo de clases</option>";
            $.each(data.clases, function (key, elem) {
                out = out + '<option value="' + elem.id + '">' + elem.nombre_clases + '</option>';
                // console.log(elem.id);
            });
            $('#tipoclases').html(out);
        })
});

//$('#registrarClase').click(function(e) {
  //  e.preventDefault();
mapa = {
    map : false,
    marker : false,
   
   
   // función que se ejecuta al pulsar el botón buscar dirección
    getCoords : function(){
        
        // Creamos el objeto geodecoder
        var geocoder = new google.maps.Geocoder();
    
        address = document.getElementById('direccionmodal').value;
        if(address!=''){
            // Llamamos a la función geodecode pasandole la dirección que hemos introducido en la caja de texto.
            geocoder.geocode({ 'address': address}, function(results, status){
                if (status == 'OK'){
                // Mostramos las coordenadas obtenidas en el p con id coordenadas
                    //document.getElementById("coordenadas").innerHTML='Coordenadas:   '+results[0].geometry.location.lat()+', '+results[0].geometry.location.lng();
                    //setTimeout("location.reload(true);",5)
                    var latitud = results[0].geometry.location.lat();
                    var longitud = results[0].geometry.location.lng();
                    var tipoclasemodal = $.trim($("#idclasemodal").val());
                    //alert(tipoclasemodal);
                    var nomclase = $("#tipoclasemodal option:selected").html();
                    var nombreclasemodal = $.trim($("#nombreclasemodal").val());
                    var direccionmodal = $.trim($("#direccionmodal").val());
                    var datetimepicker3 = $.trim($("#datetimepicker3").val());
                    var datetimepicker4 = $.trim($("#datetimepicker4").val());
                    var idcoor = $.trim($("#tipoclasecordenadas").val());
                    var lat = latitud;
                    var long = longitud;

                    swal({
                        title: "Desea modificar esta clase?",
                        text: "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.getJSON(repos, { op: 'upClase', clase: tipoclasemodal, nombre: nombreclasemodal, direccion: direccionmodal, inicio: datetimepicker3, fin: datetimepicker4, newLatitud: lat, newLongitud: long, idcoordenadas: idcoor })
                                .done(function (data) {
                                    if (data.error) {
                                        alert('error al Actualizar' + nombreclasemodal);
        
                                    } else {
                                            swal({
                                                title: "Clase Actualizada!", text: "de clase" + nomclase, icon:
                                                    "success"
                                                }).then(function () {
                                                    $('#modal').modal('hide');
                                                }
                                            );
        
                                        $.getJSON(repos_avisar, { clase: tipoclasemodal })
                                            .done(function (data) {
                                                alert("aqui estoy");
                                                if (data.error) {
                                                    alert('error al enviarMail' + nombreclasemodal);
        
                                                } else {
                                                    alert("aqui");
                                                    swal({
                                                        title: "Correo envio a los alumnos !", text: "de clase " + nomclase, type:
                                                            "success"
                                                    }).then(function () {
                                                        //$('#modal').modal('hide');
                                                    }
                                                    );
        
        
                                                }
                                            });
        
        
                                    }	
                                });  
                                
                             
                            } else {
                                swal("No se modifico la clase!");
                            }
                        });
                    // $.getJSON(repos, { op: 'upClase', clase: tipoclasemodal, nombre: nombreclasemodal, direccion: direccionmodal, inicio: datetimepicker3, fin: datetimepicker4, newLatitud: lat, newLongitud: long, idcoordenadas: idcoor })
                    //     .done(function (data) {
                    //         if (data.error) {
                    //             alert('error al Actualizar' + nombreclasemodal);

                    //         } else {
                    //                 swal({
                    //                     title: "Clase Actualizada!", text: "de clase" + nomclase, icon:
                    //                         "success"
                    //                     }).then(function () {
                    //                         $('#modal').modal('hide');
                    //                     }
                    //                 );

                    //             $.getJSON(repos_avisar, { clase: tipoclasemodal })
                    //                 .done(function (data) {
                    //                     alert("aqui estoy");
                    //                     if (data.error) {
                    //                         alert('error al enviarMail' + nombreclasemodal);

                    //                     } else {
                    //                         alert("aqui");
                    //                         swal({
                    //                             title: "Correo envio a los alumnos !", text: "de clase " + nomclase, type:
                    //                                 "success"
                    //                         }).then(function () {
                    //                             //$('#modal').modal('hide');
                    //                         }
                    //                         );


                    //                     }
                    //                 });


                    //         }	
                    //     });
                
            
                }
            });
        }
    }
}

    // Iniciar el mapa SE CARGA MAPA
    function initMap() {
    	//Centro vista de mapa en santiago
        var latlng = { lat: -33.450, lng: -70.6506 };
        map = new google.maps.Map(document.getElementById('map'), {
            center:latlng,
            zoom: 12
        });
        //Inicio funcion para mostrar markers
        setMarkers();
        autocomplete = new google.maps.places.autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('direccionmodal')),
            { types: ['geocode'] });
        autocomplete.addListener('place_changed', fillInAddress);

    }

    //SE OBTIENE DATOS DE DIRECCIONES DE BD
    function setMarkers(){
        marker = markers;
        // Recorro areglo de marcadores y los elimino del mapa
        for (var i = 0; i < marker.length; i++) {
            marker[i].setMap(null);
            }
        //creo array contenedora de las ventanas
        var infoWindowContent = [];
        //creo ventana de informacion de marcador
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        $.getJSON(repos, { op: 'getmarker', })
            .done(function (data) {
                for (var i = 0; i < data.length; i++) {
                    var tip = 'https://korpovibro.cl/img/35px.png';// marcador imagen
                    var imgtipo = 'https://korpovibro.cl/img/35px.png';// imagen de ventana
                    var usuario = data[i];  
                     idclasezumba = usuario.id;
                    var usuarioclase = usuario.instructor;
                    var nombreclase = usuario.nombre_clase;
                    $('#iduser').val(usuario.userid);
                    if (usuario.latitud!="") { // valido que el campo de la latitud no este vacio
                        var value = "<center style='width:180px;'><img style ='width: 6em;' src ='" + imgtipo + "'><br><span style='font-size:1.5em;color:#da8160;'><b>" +usuario.tname+ " </b></span><br><br> <button onclick=(funtiondatos(" + idclasezumba +"))>Ver Clase</button> </center>";
                        infoWindowContent.push([value]);
                        var latitud = parseFloat(usuario.latitud);
                        var longitud = parseFloat(usuario.longitud);
                        marker = new google.maps.Marker({
                            position: {lat: latitud, lng: longitud},
                            map: map,                
                            icon: tip,
                            
                            zIndex: i
                        }); 
                        google.maps.event.addListener(marker, 'click', (function(marker, i) {
                            return function() {
                                infoWindow.setContent(infoWindowContent[i][0]);
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));

                        }
                }
                $('#borrar').click(function () {
                    //$('#modal').modal('hide');
                    //setTimeout("location.reload(true);", 5)
                    //setTimeout("location.reload(true);",5)
                    var miclase = $.trim($('#idclasemodal').val());
                    var nomclase = $("#tipoclasemodal option:selected").html();
                    var nombreclasemodal = $.trim($("#nombreclasemodal").val());
                    var tipoclasemodal = $.trim($("#idclasemodal").val());
                    console.log(miclase);

                    swal({
                        title: "Desea cancelar esta clase?",
                        text: "",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                             $.getJSON(repos, {op: 'borrarclase',idmiclase: miclase})
                            .done(function (data) {
                               if (data.error) {
                                   alert('error al Eliminar' + nombreclasemodal);
    
                               } else {
                                   swal({
                                       title: "Clase Eliminada",
                                       text: "de " + nomclase,
                                       type: "success"
                                   }).then(function () {
                                       $('#modal').modal('hide');
                                       location.reload();
                                   });
    
                                   $.getJSON(repos_eliminar, {
                                           op: 'avisoalumnos',
                                           clase: tipoclasemodal
                                       })
                                       .done(function (data) {
                                           if (data.error) {
                                               alert('error al enviarMail' + nombreclasemodal);
    
                                           } else {
                                               swal({
                                                   title: "Correo envio a los alumnos !",
                                                   text: "de clase " + nomclase,
                                                   type: "success"
                                               }).then(function () {
                                                    //setTimeout("location.reload(true);",5)
                                                     
                                                   //$('#modal').modal('hide');
                                               });
                                               
                                           }
                                           
                                       });
    
    
                               }
                                
    
                            });  
                                
                             
                            } else {
                                swal("No se cancelo la clase!");
                            }
                        });
                    // $.getJSON(repos, {op: 'borrarclase',idmiclase: miclase})
                    //     .done(function (data) {
                    //        if (data.error) {
                    //            alert('error al Eliminar' + nombreclasemodal);

                    //        } else {
                    //            swal({
                    //                title: "Clase Eliminada",
                    //                text: "de " + nomclase,
                    //                type: "success"
                    //            }).then(function () {
                    //                $('#modal').modal('hide');
                    //            });

                    //            $.getJSON(repos_eliminar, {
                    //                    op: 'avisoalumnos',
                    //                    clase: tipoclasemodal
                    //                })
                    //                .done(function (data) {
                    //                    if (data.error) {
                    //                        alert('error al enviarMail' + nombreclasemodal);

                    //                    } else {
                    //                        swal({
                    //                            title: "Correo envio a los alumnos !",
                    //                            text: "de clase " + nomclase,
                    //                            type: "success"
                    //                        }).then(function () {
                                                
                                                 
                    //                            //$('#modal').modal('hide');
                    //                        });
                                           
                    //                    }
                                       
                    //                });


                    //        }
                            

                    //     });

                });
            });
         
    }
   

    function geocodeAddress(geocoder, resultsMap) {
        var direccionmodal = document.getElementById('direccionmodal').value;
        alert(direccionmodal)
        geocoder.geocode({'direccionmodal': direccionmodal}, function(results, status) {
            if (status === 'OK') {

                resultsMap.setCenter(results[0].geometry.location);
                marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location

                });

                bandera = true;
                // SEPARAR LATITUD Y LONGITUD EN DIFERENTE VARIABLE
                var coordenadas = results[0].geometry.location.toString();
                //alert("Las coordenadas son:" + cordenadas);
                coordenadas = coordenadas.replace("(","");
                coordenadas = coordenadas.replace(")","");

                //alert(results[0].geometry.location);
                lista = coordenadas.split(",");
                direccion1 = lista[0];
                direccion2 = lista[1];

                //alert("Las coordenadas X es:" + lista[0]);
                //alert("Las coordenadas Y es:" +direccion1+" :: "+direccion2);

            } else {
            //alert('Geocode was not successful for the following reason: ' + status);// ingrese su direcion google referenciada
            alert('ingrese su direcion google referencia');// da
            }
        });
    }



function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();


    /*
    for (var component in componentForm) {
        document.getElementById("origen-region").value = '';
        document.getElementById("origen-comuna").value = '';
    }*/

    // Get each component of the address from the place details
    // and fill the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];

            if (addressType == "locality") {
                //document.getElementById("origen-comuna").value = val;
                var comuna = val;
            }
            if (addressType == "administrative_area_level_1") {
               // document.getElementById("origen-region").value = val;
               var region = val;
            }

        }
    }
}


//TRAE DATOS A MODAL
function funtiondatos(idclasezumba) {
    //console.log(id);
    var idclase = idclasezumba;
    $('#modal').modal('show');

    $.getJSON(repos, { op: 'datosclases', idclass: idclase })
        .done(function (data) {
           // console.log(data.nombre_clase);
           b = JSON.stringify(data);
           console.log(data[0].nombreclases);
            //console.log(data)
            $('#idclasemodal').val(data[0].id);
            $('#instructormodal').val(data[0].instructor);
            $('#nombreclasemodal').val(data[0].nombreclases);
            $('#direccionmodal').val(data[0].direccion);
            $('#datetimepicker3').val(data[0].hora1);
            $('#datetimepicker4').val(data[0].hora2);
            $('#tipoclasemodal').val(data[0].idtipo);
            $('#tipoclasecordenadas').val(data[0].idCordenadas);
            
            
           // console.log(name);
        });
}

