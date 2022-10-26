$(function () {
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
           $("#userLog").html(response[0].usuario );
           $("#nameLog").html(response[0].nombre+" "+response[0].apellido);


        },
        error: function (error){
            console.log(error);
        }
    });
});