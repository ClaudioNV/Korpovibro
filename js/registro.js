var repos = "http://korpovibro.cl/modelo/registrar.php";

var tipo_usuario = '';
var tipo_usuario2 = '';
var tipo_usuario1 = '';
var username = '';
var rut = '';
var nombre = '';
var apellido = '';
var correo = '';
var password = '';
var password2 = '';
var direccion = '';
var telefono = '';
var foto = '';




$(document).ready(function () {
    //tipo_usuario = $.trim($('#tipo_usuario').val());
    //tipo_usuario2 = $.trim($('#tipo_usuario2').val());

        $("#tipo_usuario").click(function(){
            tipo_usuario1 = $.trim($('#tipo_usuario').attr("value")); 
            console.log(tipo_usuario1);
        }); 
        $("#tipo_usuario2").click(function () {
            tipo_usuario1 = $.trim($('#tipo_usuario2').attr("value"));
            console.log(tipo_usuario1);
        }); 

       
        
         $('#registrar').click(function (e) {
            e.preventDefault();

            if (tipo_usuario1 == 1) {
                tipo_usuario = 1;

            } else if (tipo_usuario1 == 2) {
                tipo_usuario = 2;
            } 
            //tipo_usuario = $.trim($('#tipo_usuario').val());
            
            alert(tipo_usuario);
            
            username = $.trim($('#username').val());
            rut = $.trim($('#rut').val());
            nombre = $.trim($('#nombre').val());
            apellido = $.trim($('#apellido').val());
            correo = $.trim($('#correo').val());
            password = $.trim($('#password').val());
            password2 = $.trim($('#password2').val());
            direccion = $.trim($('#direccion').val());
            telefono = $.trim($('#telefono').val());
            foto = $.trim($('#foto').val());


            $.getJSON(repos, { username: username, rut: rut, nombre: nombre, apellido: apellido, correo: correo, password: password, password2: password2, direccion: direccion, telefono: telefono, tipo_usuario_id: tipo_usuario })
            /*.done(function (data) {
                embajador_resultado = data.resultado;
                nombreEmbajador = data.embajadorNombre;
                mailEmbajador = data.embajadorMail;
                //alert(embajador_resultado);
                //alert(nombreEmbajador);
                //alert(mailEmbajador);
            })
            .fail(function (xhr, err) {
                //alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
                //alert("responseText: "+xhr.responseText);
                $.getJSON(repos, { op: 'regLogError', cotizacion: '', proceso: 'Seguro Automotriz - Embajador (regCotiza)', aseguradora: '6', coderror: '', detalle: 'No se puede Guardar Codigo Embajador', cliente: auto_rut });
            });*/

            alert("USUARIO REGISTRADO!");
            //window.location = '../home.php';
        });
    
    
        
});
