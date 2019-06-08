var repos = "http://korpovibro.cl/modelo/common-registra-clases.php";
var repos_avisar = "http://korpovibro.cl/modelo/avisar-alumno.php";

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

//  OBTENER PUNTOS DE CLASES 
$(document).ready(function () {

    $.getJSON(repos, { op: 'gettipoclases' })
        .done(function (data) { 
            var out = "<option value='Seleccione'>Tipo de clases</option>";
            $.each(data.clases, function (key, elem) {
                out = out + '<option value="' + elem.id + '">' + elem.nombre_clases + '</option>';
                console.log(elem.id);
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
   getCoords : function()
   {
     // Creamos el objeto geodecoder
    var geocoder = new google.maps.Geocoder();
   
    address = document.getElementById('direccionmodal').value;
    if(address!='')
    {
     // Llamamos a la función geodecode pasandole la dirección que hemos introducido en la caja de texto.
    geocoder.geocode({ 'address': address}, function(results, status)
    {
      if (status == 'OK')
      {
   // Mostramos las coordenadas obtenidas en el p con id coordenadas
      //document.getElementById("coordenadas").innerHTML='Coordenadas:   '+results[0].geometry.location.lat()+', '+results[0].geometry.location.lng();
   
      var latitud = results[0].geometry.location.lat();
      var longitud = results[0].geometry.location.lng();
      var tipoclasemodal = $.trim($("#idclasemodal").val());
      var nomclase = $("#tipoclasemodal option:selected").html();
      var nombreclasemodal = $.trim($("#nombreclasemodal").val());
      var direccionmodal = $.trim($("#direccionmodal").val());
      var datetimepicker3 = $.trim($("#datetimepicker3").val());
      var datetimepicker4 = $.trim($("#datetimepicker4").val());
      var idcoor = $.trim($("#tipoclasecordenadas").val());
      var lat = latitud;
      var long = longitud;
  
      $.getJSON(repos, { op: 'upClase', clase: tipoclasemodal, nombre: nombreclasemodal, direccion: direccionmodal, inicio: datetimepicker3, fin: datetimepicker4, newLatitud: lat, newLongitud: long, idcoordenadas: idcoor })
          .done(function (data) {
              if (data.error) {
                  alert('error al Actualizar' + nombreclasemodal);

              } else {
                    swal({
                        title: "Clase Actualizada!", text: "de clase" + nomclase, type:
                            "success"
                        }).then(function () {
                            $('#modal').modal('hide');
                        }
                    );

                  $.getJSON(repos_avisar, { op: 'avisoalumnos', clase: tipoclasemodal })
                      .done(function (data) {
                          if (data.error) {
                              alert('error al enviarMail' + nombreclasemodal);

                          } else {
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
                var idclasezumba = usuario.id;
                var usuarioclase = usuario.instructor;
                var nombreclase = usuario.nombre_clase;
	              if (usuario.latitud!="") { // valido que el campo de la latitud no este vacio
                      var value = "<center style='width:180px;'><img style ='width: 6em;' src ='" + imgtipo + "'><br><span style='font-size:1.5em;color:#da8160;'><b>" + usuario.instructor + "</b></span><br><br> <button onclick=(funtiondatos(" + idclasezumba +"))>Ver Clase</button> </center>";
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

   //EDITA DATOS DE MODAL
/*$('#editarClase').click(function (e) {
    e.preventDefault();
            
    var tipoclasemodal = $.trim($("#idclasemodal").val());
    var nombreclasemodal = $.trim($("#nombreclasemodal").val());
    var direccionmodal = $.trim($("#address").val());
    var datetimepicker3 = $.trim($("#datetimepicker3").val());
    var datetimepicker4 = $.trim($("#datetimepicker4").val());
    
    alert(tipoclasemodal + nombreclasemodal + direccionmodal + datetimepicker3 + datetimepicker4 +lat +long);

    $.getJSON(repos, { op: 'upClase', clase: tipoclasemodal, nombre: nombreclasemodal, direccion: direccionmodal, inicio: datetimepicker3, fin: datetimepicker4 })
        .done(function (data) {
            
        });


});*/
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
            
            console.log(name);
        });
}

