$(function () {
    
    let saveFile= ()=>{
        let formData = new FormData();
        let files = $('#fotoPerfil')[0].files[0];
        formData.append('file',files);
        $.ajax({
            url: '../../controller/user/AddFotoPerfil.php',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response != 0) {
                    saveUser(response);
                } else {
                    alert(response);
                }
            },error: function (error) {
                console.log(error);
              }
        });
        return false;
    }

    function saveUser (fileDirectory){
        let nombre = $("#nombre").val();
        //console.log(nombre);
        let apellido = $("#apellido").val();
        //console.log(apellido);
        let usuario = $("#usuario").val();
        //console.log(usuario);
        let passwd = $("#passwd").val();
        //console.log(passwd);
        let status = ($("#status").is(":checked"))?1:0;
        //console.log(status);
        let fotoPerfil = fileDirectory;
        //console.log(fotoPerfil);

        let user={
            'nombre': nombre,
            'apellido': apellido,
            'usuario': usuario,
            'passwd': passwd,
            'status': status,
            'fotoPerfil': fotoPerfil
        }

        $.ajax({
            type: "POST",
            url: "../../controller/user/CreateUser.php",
            data: user,
            dataType: "json",
            success: function (response) {
                if(response!=0){
                    console.log("USUARIO VALIDO");
                    $(location).attr('href',"Usuarios.html");
                }else{
                    alert("Usuario no valido"+response);
                }
            },
            error: function (error) { 
                console.log(error);
             }
        });
    }

    $("#btn").on('click',saveFile);
});