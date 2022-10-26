<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../../node_modules/bootstrap-icons/font/bootstrap-icons.css" />

    <title>Nuevo Usuario</title>
</head>
<body style="background-image: url(../img/fondoLogin.jpg);">
    <main class="container">
        
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <article class="col-4 row rounded-5  p-2 bg-body bg-opacity-50">
                    <div id="imgLog" class="col-2  p-1 rounded">
                    
                    </div>
                    <div class="col  p-1 rounded fst-italic fw-semibold">
                        <div id="nameLog"></div>
                        <div id="userLog"></div>
                    </div>
            </article>
      
            <ul class="nav col-8 col-md-auto mb-2 justify-content-center mb-md-0">
              <li><a href="menuPrincipal.html" class="nav-link px-2 link-dark fw-bold">Home</a></li>
              <li><a href="Usuarios.html" class="nav-link px-2 link-dark fw-bold">Usuario</a></li>
              <li><a href="Offices.html" class="nav-link px-2 link-dark fw-bold">Offices</a></li>
              <li><a href="todosRegistros.html" class="nav-link px-2 link-dark fw-bold">Tables</a></li>
            </ul>
      
            <div class="col-md-3 text-end">
              <a type="button" href="index.html" class="btn btn-primary">Cerrar sesi&oacute;n</a>
            </div>
        </header>
        
        <section class="row justify-content-center">
            <div class="col-6 bg-light rounded-3 p-5">

                <?php 
                if($_SERVER["REQUEST_METHOD"]=="GET"){
                    if(!empty($_GET["id"])){
                        $id=$_GET["id"];
                ?>      
                    <input value="<?php echo $id ;?>" id="id"  type="hidden" /> 
                <?php 
                    }
                }
                ?>
                <!--CITY-->
                <div class="mb-3">
                  <label for="city" class="form-label">City</label>
                  <input type="text" class="form-control" id="city" />
                </div>

                <!--PHONE-->
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" />
                </div>

                <!--AddressLine1-->
                <div class="mb-3">
                    <label for="address1" class="form-label">AddressLine1</label>
                    <input type="text" class="form-control" id="address1" />
                </div>

                <!--AddressLine1-->
                <div class="mb-3">
                    <label for="address2" class="form-label">AddressLine2</label>
                    <input type="text" class="form-control" id="address2" />
                </div>

                <!--STATE-->
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" />
                </div>

                <!--COUNTRY-->
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" />
                </div>

                <!--POSTALCODE-->
                <div class="mb-3">
                    <label for="postalCode" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postalCode" />
                </div>

                <!--TERRITORY-->
                <div class="mb-3">
                    <label for="territory" class="form-label">Territory</label>
                    <input type="text" class="form-control" id="territory" />
                </div>

                <?php 
                    if(!isset($id)){
                ?>
                    <!--BOTON DE ENVIAR-->
                    <button type="submit" class="btn btn-primary w-25" id="btn">Enviar</button>
                <?php 
                    }else{
                ?>  
                    <!--BOTON DE ENVIAR-->
                    <button type="submit" class="btn btn-primary w-25" id="btnUpdate">Actualizar</button>
                <?php 
                    }
                ?>

                <button type="button" class="btn btn-danger w-25 ms-3" id="btnExit">Cancelar</button>
            </div>
        </section>
    </main>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../script/nuevoOffices.js"></script>
    <script src="../script/ActualizarOffices.js"></script>
</body>
</html>