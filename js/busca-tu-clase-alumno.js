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
optionClase= "";

//variables del formulario modal
var tipoclasemodal;
var instructormodal;
var nombreclasemodal;
var direccionmodal;
var horain;
var horafin;

$(function () {
    $('#datetimepicker3').datetimepicker();

});


$(function () {
    $('#datetimepicker4').datetimepicker();

});

$(function () {
    $('#datetimepickerFecha').datetimepicker();

});

$('#submit').click(function (e) {
 
  
    //get datetimepicker1 hors y minutos

    //alert(fecha);
    

    var geocoder = new google.maps.Geocoder();
    geocodeAddress(geocoder, map);

    (function setMarkers() {

        marker = markers;


        // Recorro areglo de marcadores y los elimino del mapa
        for (var i = 0; i < marker.length; i++) {
            marker[i].setMap(null);
        }

        //creo array contenedora de las ventanas
        var infoWindowContent = [];
        //creo ventana de informacion de marcador
        var infoWindow = new google.maps.InfoWindow(), marker, i;
        var optionClase = $.trim($("#optionClases").val());
        console.log(optionClase);

        $.getJSON(repos, { op: 'getclases', idClase: optionClase})
            .done(function (data) {

                for (var i = 0; i < data.length; i++) {

                    var tip = 'https://korpovibro.cl/img/35px.png';// marcador imagen
                    var imgtipo = 'https://korpovibro.cl/img/35px.png';// imagen de ventana

                    var usuario = data[i];

                    var idclasezumba = usuario.id;
                    //alert(idclasezumba);
                    if (usuario.latitud != "") { // valido que el campo de la latitud no este vacio

                       // var value = "<center style='width:180px;'><img style ='width: 6em;' src ='" + imgtipo + "'><br><span style='font-size:1.5em;color:#da8160;'><b>" + usuario.instructor + "</b></span><br><br> <button onclick=(funtiondatos(" + idclasezumba + "))>Abrir Detalles</button> </center>";
                       var value = "<center style='width:180px;'><img style ='width: 6em;' src ='" + imgtipo + "'><br><span style='font-size:1.5em;color:#da8160;'><b>"+""+"</b></span><br><br><a href='#' class='datosClase btn1 btn-primary btn-xs ' style='margin-top: 2%;'\
                       data-id='" + usuario.id + "' data-nombreclases='" + usuario.nombreclases + "' data-hora1='" + usuario.hora1 + "' data-hora2='" + usuario.hora2 + "'\
                       data-direccion='" + usuario.direccion + "'  data-instructor='" + usuario.instructor + "' userid='" + usuario.userid + "' data-latitud='" + usuario.latitud + "' data-longitud='" + usuario.longitud + "'\
                       data-idtipo='" + usuario.idtipo + "'data-tipoclases='" + usuario.tipoclases + "' data-iInstructor='" + usuario.iInstructor + "'>Detalle</a>\</center>";


				
                     
                        infoWindowContent.push([value]);

                        var latitud = parseFloat(usuario.latitud);
                        var longitud = parseFloat(usuario.longitud);

                        marker = new google.maps.Marker({
                            position: { lat: latitud, lng: longitud },
                            map: map,
                            icon: tip,
                           
                            zIndex: i
                        });

                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            return function () {
                                infoWindow.setContent(infoWindowContent[i][0]);
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));

                    }



                }



            });
            

    })
 /*   $(document).on("click", ".datosClase", function (e) {
        e.preventDefault();
        $('#modal').modal('show');
        $('#instructormodal').val(data[0].instructor1);
                    $('#nombreclasemodal').val(data[0].nombre_clases);
                    $('#direccionmodal').val(data[0].direccion);
                    $('#datetimepicker3').val(data[0].hora1);
                    $('#datetimepicker4').val(data[0].hora2);
                    $('#tipoclasemodal').val(data[0].tipoclases);
        
    });*/

        //geocodificacion de  direcciones
        (function funtioccndatos(idclasezumba) {
            var idclase = idclasezumba;
            $('#modal').modal('show');

            $.getJSON(repos, { op: 'muestradatosclases', idclass: idclase })
                .done(function (data) {
                    // console.log(data.nombre_clase);
                    b = JSON.stringify(data);
                    console.log(data[0].nombre_clases);
                    //console.log(data)
                    $('#instructormodal').val(data[0].instructor1);
                    $('#nombreclasemodal').val(data[0].nombre_clases);
                    $('#direccionmodal').val(data[0].direccion);
                    $('#datetimepicker3').val(data[0].hora1);
                    $('#datetimepicker4').val(data[0].hora2);
                    $('#tipoclasemodal').val(data[0].tipoclases);


                    console.log(name);
                });
        })   


    

    

});
$(document).on("click", ".datosClase", function (e) {
    e.preventDefault();
   
    $('#modal').modal('show');
    instructor1 = $(this).data('instructor');
   iInstructor = $(this).data('iinstructor');
   idClase = $(this).data('id');
   //alert(idClase);
   
  
    nombre_clases = $(this).data('nombreclases');
    direccion = $(this).data('direccion');
    hora1 = $(this).data('hora1');
    hora2 = $(this).data('hora2');
    idtipo = $(this).data('idtipo');

    $('#instructormodal').val(instructor1);
    $('#idinstructor').val(iInstructor); 
    $('#idClase').val(idClase); 
    $('#nombreclasemodal').val(nombre_clases);
    $('#direccionmodal').val(direccion);
    $('#datetimepicker3').val(hora1);
    $('#datetimepicker4').val(hora2);
    $('#tipoclasemodal').val(idtipo);
    
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
        
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Ubicacion Encontrada!');

                map.setCenter(pos);
                marker.setPosition(pos);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
            //MOVER MARCADOR Y MOSTRAR LA LONGITUD Y LATITUD DEL LUGAR
        /*  google.maps.event.addListener(marker, 'dragend', function () {
            alert('Latitud = ' + marker.getPosition().lat() + ', Longitud = ' + marker.getPosition().lng());
        });*/

    }

function setMarkers() {

    marker = markers;


    // Recorro areglo de marcadores y los elimino del mapa
    for (var i = 0; i < marker.length; i++) {
        marker[i].setMap(null);
    }

    //creo array contenedora de las ventanas
    var infoWindowContent = [];
    //creo ventana de informacion de marcador
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    /*$.getJSON(repos, { op: 'getclases', })
        .done(function (data) {

            for (var i = 0; i < data.length; i++) {

                var tip = 'https://korpovibro.cl/img/35px.png';// marcador imagen
                var imgtipo = 'https://korpovibro.cl/img/35px.png';// imagen de ventana

                var usuario = data[i];

                var idclasezumba = usuario.id;

                if (usuario.latitud != "") { // valido que el campo de la latitud no este vacio

                    var value = "<center style='width:180px;'><img style ='width: 6em;' src ='" + imgtipo + "'><br><span style='font-size:1.5em;color:#da8160;'><b>" + usuario.instructor + "</b></span><br><br> <button onclick=(funtiondatos(" + idclasezumba + "))>Abrir Detalles</button> </center>";

                    infoWindowContent.push([value]);

                    var latitud = parseFloat(usuario.latitud);
                    var longitud = parseFloat(usuario.longitud);

                    marker = new google.maps.Marker({
                        position: { lat: latitud, lng: longitud },
                        map: map,
                        icon: tip,
                        title: 'Hola Mundo',
                        zIndex: i
                    });

                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infoWindow.setContent(infoWindowContent[i][0]);
                            infoWindow.open(map, marker);
                        }
                    })(marker, i));

                }



            }



        });*/

}


//geocodificacion de  direcciones
function funtiondatos(idclasezumba) {
    var idclase = idclasezumba;
    $('#modal').modal('show');

    $.getJSON(repos, { op: 'muestradatosclases', idclass: idclase })
        .done(function (data) {
            // console.log(data.nombre_clase);
            b = JSON.stringify(data);
            console.log(data[0].nombre_clases);
            //console.log(data)
            $('#instructormodal').val(data[0].instructor1);
            $('#nombreclasemodal').val(data[0].nombre_clases);
            $('#direccionmodal').val(data[0].direccion);
            $('#datetimepicker3').val(data[0].hora1);
            $('#datetimepicker4').val(data[0].hora2);
            $('#tipoclasemodal').val(data[0].tipoclases);
            $('#idinstructor').val(data[0].iInstructor);


            console.log(name);
        });

   

}

    
$('#tomar').click(function(){

    tipoclasemodal = $('#tipoclasemodal').val();
    instructormodal = $('#instructormodal').val();
    nombreclasemodal = $('#nombreclasemodal').val();
    direccionmodal = $('#direccionmodal').val();
    horain = $('#datetimepicker3').val();
    horafin = $('#datetimepicker4').val();
    idIns = $('#idinstructor').val();
    idClase = $('#idClase').val();

    swal({
                    title: "¿Desea asistir a esta clase?",
                    text: "",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
            
                            $.getJSON(repos, { op: 'tomarclases', tipoclasemodal: tipoclasemodal, instructormodal:instructormodal, nombreclasemodal:nombreclasemodal,
                                direccionmodal:direccionmodal, horain:horain, horafin:horafin, idIns:idIns, idClase:idClase})
                                .done(function (data) {
            
                                    if (data.error == 'error') {
                                        swal("No ha tomado la clase");
                                    } else {
                                        swal("Clase tomada exitosamente", {
                                            icon: "success",
                                        }).then(function () {
                                            //location.reload();
                                            window.location.assign("http://korpovibro.cl/mis-clases-alumno.php");
                                            //setTimeout("location.reload(true);",5)
                                        }
                                        );
                                    }
                                })
                         
                        } else {
                            swal("No ha tomado la clase");
                        }
                    });
        
});


function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {

        resultsMap.setCenter(results[0].geometry.location);
      /*  marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location

    });*/

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
