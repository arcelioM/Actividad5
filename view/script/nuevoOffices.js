$(function () {
    
    let saveOffice=()=>{
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
            "territory": territory
        };

        $.ajax({
            type: "POST",
            url: "../../controller/offices/CreateOffices.php",
            data: office,
            dataType: "json",
            success: function (response) {
                if(response!=0){
                    console.log(response);
                    $(location).attr('href',"Offices.html");
                }else{
                    alert("Usuario no valido"+response);
                }
               
            }
        });
    }
    $("#btn").on('click',saveOffice);

    $("#btnExit").on("click", function () {
        $(location).attr('href',"Offices.html");
    });
});