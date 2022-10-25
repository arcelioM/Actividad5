$(function () {
    
    /**
     * *VALIDA LAS CREDENCIALES DEL USUARIO
     */
    $.ajax({
        type: "GET",
        url: "../../controller/user/GetUserValidate.php",
        success: function (response) {
           if(response == 0){
            $(location).attr('href',"index.html");
           }
           getUsers();
        },
        error: function (error){
            console.log(error);
        }
    });


    function getUsers(){
        $.ajax({
            type: "GET",
            url: "../../controller/user/UserGetAll.php",
            success: function (response) {

                let listUser=JSON.parse(response);
                let nombreAttr=[];

                for (let key in listUser[0]) {
                    nombreAttr.push(key);
                }

                showUsers(listUser,nombreAttr);
            }
        });
    }

    /**
     * *CREARA LA ESTRUCTURA HTML PARA MOSTRAR LOS USUARIOS EN UNA TABLA
     * @param {lista de usuarios creados} listUser 
     * @param {nombre de atributos del objeto usuario} nombreAttr 
     */
    function showUsers(listUser,nombreAttr){

        //*ESTRCUTURA DEL HEAD
        let headTableHTML="";
        for(let i=0 ; i<nombreAttr.length;i++){
            headTableHTML+="<th>"+nombreAttr[i]+"</th>";
        }

        $("#headTableUser").html(headTableHTML);

        //*ESTRCUTURA DEL BODY
        let bodyTableHTML="";
        for(let i=0 ; i<listUser.length;i++){

            bodyTableHTML+="<tr class=' text-center'>"
            for(let j=0 ; j<nombreAttr.length;j++){
                if(nombreAttr[j]=="status"){

                    if(listUser[i][nombreAttr[j]]==1){
                        bodyTableHTML+="<td class='text-success boder border-success' > <i class='bi bi-person-check'></i> </td>";
                    }else{
                        bodyTableHTML+="<td class='text-danger boder border-danger' > <i class='bi bi-person-x'></i> </td>";
                    }

                }else{
                    bodyTableHTML+="<td>"+listUser[i][nombreAttr[j]]+"</td>";
                }
                
            }
            bodyTableHTML+="</tr>";
        }
        
        $("#bodyTableUser").html(bodyTableHTML);
    }

    $("#btnNewUser").on("click", function () {
        $(location).attr('href',"nuevoUsuario.html");
    });

    let findByNombre=()=>{
        let nombre= $("#findUser").val();
            let user={
                "nombre": nombre
            };
            
            $.ajax({
                type: "GET",
                url: "../../controller/user/GetUserByNombre.php",
                data: user,
                dataType: "json",
                success: function (response) {
                    //console.log(response);
                    //let listUser=JSON.parse(response);
                    let nombreAttr=[];
    
                    for (let key in response[0]) {
                        nombreAttr.push(key);
                    }
    
                    showUsers(response,nombreAttr);
                    console.log("FUNCIONADA");
                },error: function (error) { 
                    console.log(error);
                 }
            });
    }

    /**
     * *BUSQUEDA DE USUARIO
     */

    $("#findUser").on("keyup", function () {
        if($("#findUser").val()!=""){
            findByNombre();
        }else{
            getUsers();
        }
    });

    $( "#target" ).keydown(function() {
        alert( "Handler for .keydown() called." );
      });
});