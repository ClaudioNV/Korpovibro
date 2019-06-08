var repos = "http://korpovibro.cl/modelo/validar.php";


$(document).ready(function(){

    $("#login").click(function(){


        user = $.trim($('#username').val());
        passwd = $.trim($('#passwd').val());
        

        if(user == ''){
            alert('Ingrese nombre de Usuario');
        }
        else if(passwd == ''){
            alert('Ingrese la Contraseña');
        }else{

            $.getJSON(repos, { op: 'login', user: user, passwd: passwd })
                .done(function(data){
                   if(data.tipo == "error"){
                    alert("Error");
                   }
                   else if(data.tipo == 1){
                       alert("Es instructor");
                    window.location.replace("/perfil-instructor.php");
                   }
                   else if(data.tipo == 2){
                    window.location.replace("http://korpovibro.cl/perfil-alumno.php");
                   }else{
                       window.location.replace("http://korpovibro.cl/Login.php");
                   }
                })
            
        }
    })
    

});