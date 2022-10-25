$(function () {
    $.ajax({
        type: "GET",
        url: "../../controller/user/GetUserValidate.php",
        success: function (response) {
           if(response == 0){
            $(location).attr('href',"index.html");
           }
           console.log(response);
        },
        error: function (error){
            console.log(error);
        }
    });
});