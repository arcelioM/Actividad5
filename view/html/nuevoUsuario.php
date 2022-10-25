


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
                <h1>Registrando usuario</h1>
            </article>
        </section>
        
        <section class="row justify-content-center">
            <div class="col-6">

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
                <!--NOMBRE-->
                <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" />
                </div>

                <!--APELLIDO-->
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" />
                </div>

                <!--USUARIO-->
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="usuario" />
                </div>

                <?php 
                    if(!isset($id)){
                ?>
                <!--FOTO DE PERFIL-->
                <div class="mb-3">
                    <label for="fotoPerfil" class="form-label">Foto de perfil</label>
                    <input type="file" class="form-control" id="fotoPerfil" />
                </div>
                
                <?php 
                    }
                ?>
                <!--PASSWD-->
                <div class="mb-3">
                  <label for="passwd" class="form-label">Password</label>
                  <input type="password" class="form-control" id="passwd" placeholder="Nueva contraseña">
                </div>

                <!--ACTIVAR CUENTA-->
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="status">
                  <label class="form-check-label" for="status">Activar cuenta</label>
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
    <script src="../script/NuevoUsuario.js"></script>
    <script src="../script/ActualizarUsuario.js"></script>
</body>
</html>