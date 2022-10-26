$(function () {
    
    /**
     * *VALIDARAQUE HAYA UNA SESSION EN PROGRESO
     */
    $.ajax({
        type: "GET",
        url: "../../controller/user/GetUserValidate.php",
        success: function (response) {
           if(response == 0){
            $(location).attr('href',"index.html");
           }
           response = JSON.parse(response);
           //console.log(response[0]["nombre"]);
           let html="<img src='../../controller/user/"+response[0].fotoPerfil+"'  width='50px' height='50px' class='rounded'>"
           $("#imgLog").html(html);
           $("#userLog").html(response[0].usuario);
           $("#nameLog").html(response[0].nombre+" "+response[0].apellido);
           getUserById();
        },
        error: function (error){
            console.log(error);
        }
    });
    
    /**
     * *EN CASO DE QUERER ACTUALIZAR BUSCARA EL USUARIO QUE SE QUIERE ACTUALIZAR POR MEDIO DEL ID
     */
    function getUserById() {
        let id=$("#id").val() ;
        if(id!=null){
            $.ajax({
                type: "GET",
                url: "../../controller/user/GetUserById.php",
                data: {
                    "id":id
                },
                dataType: "json",
                success: function (response) {
        
                     $("#nombre").val(response[0].nombre);

                    $("#apellido").val(response[0].apellido);

                    $("#usuario").val(response[0].usuario);

                    if(response[0].status==1){
                        $("#status").attr("checked",true);
                    }else{
                        $("#status").attr("checked",false);
                    }
                    
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
        
    }

    let updateUser=()=>{
        let id=$("#id").val();
        let nombre = $("#nombre").val();
        let apellido = $("#apellido").val();
        let usuario = $("#usuario").val();
        let passwd = $("#passwd").val();
        let status = ($("#status").is(":checked"))?1:0;

        let user={
            'nombre': nombre,
            'apellido': apellido,
            'usuario': usuario,
            'passwd': passwd,
            'status': status,
            'id': id
        }

        $.ajax({
            type: "POST",
            url: "../../controller/user/UpdateUser.php",
            data: user,
            dataType: "json",
            success: function (response) {
                if(response!=0){
                    alert("USUARIO ACTUALIZADO");
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

    $("#btnUpdate").on("click", updateUser);
});