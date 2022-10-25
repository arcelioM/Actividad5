$(function () {

    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); 
    }
    
    $("#btn").on('click', function () {
        $.ajax({
            type: "GET",
            url: "../../controller/UserController.php",
            success: function (response) {
                response=response.slice(1,-1); //ELIMINAR PRIMER Y UTLIMO CARACTER
                let json=JSON.parse(response);
                $("#infoBody").html(json.nombre);
            }
        });
    });
});