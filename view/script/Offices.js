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
           getDataTable();
        },
        error: function (error){
            console.log(error);
        }
    });


    function getTableName(){
        $.ajax({
            type: "GET",
            url: "../../controller/dao/GetTableName.php",
            success: function (response) {
                if(response!=0){
                    setOptionesSelect(response);
                }else{
                    console.log(response);
                }
            }
        });
    }


    function getDataTable(){

        $.ajax({
            type: "GET",
            url: "../../controller/offices/GetAllOffices.php",
            dataType: "json",
            success: function (response) {
                let nombreAttr=[];
                let listData=response;

                for (let key in response[0]) {
                    nombreAttr.push(key);
                }

                showData(listData,nombreAttr);
            }
        });
    }


    function showData(listData,nombreAttr) { 

        //*ESTRCUTURA DEL HEAD
        let headTableHTML="";
        for(let i=1 ; i<nombreAttr.length;i++){
            headTableHTML+="<th>"+nombreAttr[i]+"</th>";
        }

        headTableHTML+="<th>Actualizar Datos</th>"
        $("#headTable").html(headTableHTML);

        //*ESTRCUTURA DEL BODY
        let bodyTableHTML="";
        for(let i=0 ; i<listData.length;i++){

            bodyTableHTML+="<tr class=' text-center'>"
            for(let j=1 ; j<nombreAttr.length;j++){
                if(nombreAttr[j]=="status"){

                    if(listData[i][nombreAttr[j]]==1){
                        bodyTableHTML+="<td class='text-success boder border-success' > <i class='bi bi-person-check'></i> </td>";
                    }else{
                        bodyTableHTML+="<td class='text-danger boder border-danger' > <i class='bi bi-person-x'></i> </td>";
                    }

                }else if(nombreAttr[j]=="fotoPerfil"){
                    bodyTableHTML+="<td><img class='rounded-5' src='../../controller/user/"+listData[i][nombreAttr[j]]+"' width='50px' height='40px' ></td>";
                }else{
                    bodyTableHTML+="<td>"+listData[i][nombreAttr[j]]+"</td>";
                }
                
            }

            bodyTableHTML+="<td> <a id='changeStatus' href='nuevoOffices.php?id="+listData[i]["officeCode"]+"' > <i class='bi bi-pencil-square'></i></i></a> </td>";

            bodyTableHTML+="</tr>";
        }
        
        $("#bodyTable").html(bodyTableHTML);
     }

     let findByCity=()=>{
        let city= $("#findCity").val();
            let offices={
                "city": city
            };
            
            $.ajax({
                type: "GET",
                url: "../../controller/offices/GetOfficeByCity.php",
                data: offices,
                dataType: "json",
                success: function (response) {
                    //console.log(response);
                    //let listUser=JSON.parse(response);
                    let nombreAttr=[];
    
                    for (let key in response[0]) {
                        nombreAttr.push(key);
                    }
    
                    showData(response,nombreAttr);
                    console.log("FUNCIONADA");
                },error: function (error) { 
                    console.log(error);
                 }
            });
    }

    $("#findCity").on("keyup", function () {
        if($("#findCity").val()!=""){
            findByCity();
        }else{
            getDataTable();
        }
    }); 


    $("#tables").on("change", getDataTable);

    $("#btnExit").on("click", function () {
        
        $(location).attr('href',"menuPrincipal.html");
    });

    /**
     * *REDIRECCIONA AL FORMULARIO DE CREACION DE OFFICES
     */
     $("#btnNew").on("click", function () {
        $(location).attr('href',"nuevoOffices.php");
    });
});