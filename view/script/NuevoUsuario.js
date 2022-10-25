$(function () {
    

    /**
     * *GUARDARA LA IMAGEN AGREGADA */
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

    /**
     * *CREARA EL NUEVO USUARIO
     * @param {ruta de guardado del archivo de fotoPerfil} fileDirectory 
     */
    function saveUser (fileDirectory){
        let nombre = $("#nombre").val();
        let apellido = $("#apellido").val();
        let usuario = $("#usuario").val();
        let passwd = $("#passwd").val();
        let status = ($("#status").is(":checked"))?1:0;
        let fotoPerfil = fileDirectory;

        let user={
            'nombre': nombre,
            'apellido': apellido,
            'usuario': usuario,
            'passwd': passwd,
            'status': status,
            'fotoPerfil': fotoPerfil
        }

        /**
         * *DESPUES DE REGISTRAR CORRECTAMENTE EL USUARIO REGRESARA A LA TABLA PRINCIPAL
         */
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

    /**
     * *EVENTO QUE GUARDAR UN NUEVO USUARIO
     */
    $("#btn").on('click',saveFile);

    $("#btnExit").on("click", function () {
        $(location).attr('href',"Usuarios.html");
    });
});