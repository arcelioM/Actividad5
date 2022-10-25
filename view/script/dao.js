$(function () {
    $("#btn").on('click', function () {
        $.ajax({
            type: "GET",
            url: "../../controller/DaoController.php",
            success: function (response) {
                let json=JSON.parse(response);
                let nombreAttr="";
                for (let key in json[1]) {
                    nombreAttr=nombreAttr+key;
                }
                //alert(nombreAttr);
                let attr="customerNumber";
                $("#infoBody").html(json[1][attr] );
            }
        });
    });
});