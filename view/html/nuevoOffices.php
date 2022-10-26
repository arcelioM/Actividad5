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
<body>
    <main class="container">
        <section class="row justify-content-center mt-4">
            <article class="col-6 text-center ">
                <h1>Registrando Office</h1>
            </article>
        </section>
        
        <section class="row justify-content-center">
            <div class="col-6 mb-5">

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