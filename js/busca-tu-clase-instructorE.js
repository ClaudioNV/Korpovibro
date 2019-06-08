var repos = "http://korpovibro.cl/modelo/common-buscar-clases.php";

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

    $.getJSON(repos, { op: 'getclases', })
        .done(function (data) {

        	for (var i = 0; i < data.length; i++) {

	            var tip = 'https://korpovibro.cl/img/35px.png';// marcador imagen
                var imgtipo = 'https://korpovibro.cl/img/35px.png';// imagen de ventana

                var usuario = data[i];  
                
                var idclasezumba = usuario.id;

	              if (usuario.latitud!="") { // valido que el campo de la latitud no este vacio

                      var value = "<center style='width:180px;'><img style ='width: 6em;' src ='" + imgtipo + "'><br><span style='font-size:1.5em;color:#da8160;'><b>" + usuario.instructor+ "</b></span><br><br> <button onclick=(funtiondatos("+idclasezumba+"))>Abrir Detalles</button> </center>";

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


//geocodificacion de  direcciones
function funtiondatos(idclasezumba) {
    var idclase = idclasezumba;
    $('#modal').modal('show');

    $.getJSON(repos, { op:'muestradatosclases', idclass: idclase })
        .done(function (data) {
            // console.log(data.nombre_clase);
            b = JSON.stringify(data);
            console.log(data[0].nombre_clases);
            //console.log(data)
            $('#instructormodal').val(data[0].instructor1);
            $('#nombreclasemodal').val(data[0].nombre_clases);
            $('#direccionmodal').val(data[0].direccion);
            $('#tipoclasemodal').val(data[0].tipoclases);
            

            console.log(name);
        });
}

function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
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
