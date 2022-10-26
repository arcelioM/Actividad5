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
           $("#userLog").html(response[0].usuario);
           $("#nameLog").html(response[0].nombre+" "+response[0].apellido);
           getOfficeById();
        },
        error: function (error){
            console.log(error);
        }
    });


    function getOfficeById() {
        let id=$("#id").val() ;
        if(id!=null){
            $.ajax({
                type: "GET",
                url: "../../controller/offices/GetOfficceById.php",
                data: {
                    "officeCode":id
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $("#city").val(response[0].city);
                    $("#phone").val(response[0].phone);
                    $("#address1").val(response[0].addressLine1);
                    $("#address2").val(response[0].addressLine2);
                    $("#state").val(response[0].state);
                    $("#country").val(response[0].country);
                    $("#postalCode").val(response[0].postalCode);
                    $("#territory").val(response[0].territory);

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

    let updateOffice=()=>{
        let id=$("#id").val() ;
        let city = $("#city").val();
        let phone = $("#phone").val();
        let addressLine1=$("#address1").val();
        let addressLine2=$("#address2").val();
        let state = $("#state").val();
        let country = $("#country").val();
        let postalCode = $("#postalCode").val();
        let territory= $("#territory").val();

        let office = {
            'city': city,
            "phone": phone,
            "addressLine1": addressLine1,
            "addressLine2": addressLine2,
            "state": state,
            "country":  country,
            "postalCode": postalCode,
            "territory": territory,
            "officeCode": id
        };

        $.ajax({
            type: "POST",
            url: "../../controller/offices/UpdateOffices.php",
            data: office,
            dataType: "json",
            success: function (response) {
                if(response!=0){
                    alert("OFFICE ACTUALIZADO");
                    $(location).attr('href',"Offices.html");
                }else{
                    console.log("Office no valido"+response);
                }
            },
            error: function (error) { 
                console.log(error);
             }
        });
    }

    $("#btnUpdate").on("click", updateOffice);
});