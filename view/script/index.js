$(function () {


    let validateAccount=()=>{
        let user = $("#user").val();
        let pass=$("#pass").val();

        let userSend ={
            "username": user,
            "passwd": pass
        };
        
        $.ajax({
            type: "POST",
            url: "../../controller/user/ValidateUser.php",
            data: userSend,
            dataType: "json",
            success: function (response) {
                if(response!=0){
                    console.log("USUARIO VALIDO");
                    $(location).attr('href',"menuPrincipal.html");
                }else{
                    alert("Usuario no valido");
                }
            }
        });
    }

    $("#btn").on('click', validateAccount);

    $("#pass").on("change", function () {

        if( $("#btn").attr('disabled')=="disabled" && $("#user").val().trim()!="" && $("#pass").val().trim()!=""){
            $("#btn").attr('disabled',false);
           
        }else if($("#pass").val().trim()===""){
            $("#btn").attr('disabled',"disabled");
        }
    });

    $("#user").on("change", function () {

        if( $("#btn").attr('disabled')=="disabled" && $("#pass").val().trim()!=""){
            $("#btn").attr('disabled',false);
           
        }else if($("#user").val().trim()===""){
            $("#btn").attr('disabled',"disabled");
        }
    });

    //CREAR FOTOS
    $("#perfil").on('click', function() {
        var formData = new FormData();
        var files = $('#image')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    $(".card-img-top").attr("src", response);
                } else {
                    alert('Formato de imagen incorrecto.');
                }
            }
        });
        return false;
    });

    function obtnerUser(){
        $.ajax({
            type: "GET",
            url: "../../controller/user/UserGetAll.php",
            success: function (response) {
                response=response.slice(1,-1); //ELIMINAR PRIMER Y UTLIMO CARACTER
                let json=JSON.parse(response);
                $("#infoBody").html(json.nombre);
            }
        });
    }
});