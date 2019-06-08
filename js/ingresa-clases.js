var repos = "http://korpovibro.cl/modelo/common-registra-clases.php";

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
                console.log(elem.id);
            });
            $('#tipoclases').html(out);
            
        })
    var fecha1 = $.trim($("#datetimepicker1").val());
    console.log(fecha1);


        
        
});

$('#registrarClase').click(function(e) {
    e.preventDefault();


    address = $.trim($('#address').val());

    var fecha = $.trim($("#datetimepicker1").val());
    console.log(fecha)

    var fecha2 = $.trim($("#datetimepicker2").val());


    console.log(fecha2);

    var geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);

    function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({ 'address': address }, function (results, status) {

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
                coordenadas = coordenadas.replace("(", "");
                coordenadas = coordenadas.replace(")", "");

                //alert(results[0].geometry.location);
                lista = coordenadas.split(",");
                direccion1 = lista[0];
                direccion2 = lista[1];


                nombreclase = $.trim($('#nombreclase').val());
                //horainicio = $.trim($('#horainicio').val());
                horainicio = fecha;
                horafin = fecha2;
                //horafin = $.trim($('#horafin').val());
                address = $.trim($('#address').val());
                fecha = $("#datetimepicker1").find("input").val();
                tipoclase = $.trim($('#tipoclases').val());
                //tipoclase = $.trim($('#tipoclase').val());
                //correo = $.trim($('#correo').val());
                // $.getJSON(repos, { op: 'Registrarclase', nombreclas: nombreclase, direcname: address, horain: horainicio, horafinal: horafin, Latitude1: direccion1, tipoclases: tipoclase, Longitude1: direccion2 })
                //     .done(function(data){
                //         alert("clase creada con exito");
                //    });
                swal({
                    title: "¿Desea crear esta clase?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
            
                            $.getJSON(repos, { op: 'Registrarclase', nombreclas: nombreclase, direcname: address, horain: horainicio, horafinal: horafin, Latitude1: direccion1, tipoclases: tipoclase, Longitude1: direccion2 })

                                .done(function (datauser) {
            
                                    if (datauser.sms == 'error') {
                                        swal("No se ha podido crear la clase");
                                    } else {
                                        swal("Clase creada exitosamente", {
                                            icon: "success",
                                        }).then(function () {
                                            location.reload();
                                            //setTimeout("location.reload(true);",5)
                                        }
                                        );
                                    }
                                })
                         
                        } else {
                            swal("La clase no fue creada!");
                        }
                    });
                //alert("Las coordenadas X es:" + lista[0]);
                //alert("Las coordenadas Y es:" +direccion1+" :: "+direccion2);

            } else {
                //alert('Geocode was not successful for the following reason: ' + status);// ingrese su direcion google referenciada
                swal('ingrese su direcion de referencia');// da

            }
        });
    }



});



    // Iniciar el mapa
    function initMap() {

    	//Centro vista de mapa en santiago
        var latlng = { lat: -33.450, lng: -70.6506 };
        map = new google.maps.Map(document.getElementById('map'), {
            center:latlng,
            zoom: 12
        });

        //Inicio funcion para mostrar markers
        setMarkers();

        autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('address')),
            { types: ['geocode'] });

        autocomplete.addListener('place_changed', fillInAddress);

        // Try HTML5 geolocation
        /*
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Ubicacion Encontrada!');

                map.setCenter(pos);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }*/
            //MOVER MARCADOR Y MOSTRAR LA LONGITUD Y LATITUD DEL LUGAR
        /*  google.maps.event.addListener(marker, 'dragend', function () {
            alert('Latitud = ' + marker.getPosition().lat() + ', Longitud = ' + marker.getPosition().lng());
        });*/

    }

    


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


$(function() {
    $(".nav > li").click(function() {
    //Busca todos los elementos del nav que tengan la clase active y los elimina
  $(this).closest('.nav').find('li').removeClass('active');
  //Al elemento seleccionado agrega la clase active
          $(this).addClass('active');
      });
});
