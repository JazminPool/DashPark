<?php
session_start();
if(isset($_SESSION['usuario'])){
	header('Location:inicio.php');}
	else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CAJEROS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./Recursos-Cajeros/bootstrap/bootstrap.min.css" />
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="./Recursos-Cajeros/styleCajeros.css" /> -->
    <link rel="stylesheet" type="text/css" media="screen" href="./Recursos-Cajeros/styleLogin.css" />
    <!-- Favicon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500|Raleway:300,400,500" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="./Recursos-Cajeros/js.js"></script>
    <script src="./Recursos-Cajeros/bootstrap/bootstrapjs/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body class="body_bg">
    <div class="container"> 
        <div class="row">                
            <div class="col-sm-6 col-md-7 center"> <!--MainContenedor card-->
                <br>
                <h1 class="display-4 text-center text-light">DashPark para Cajeros </h1>
                <p class="lead text-center text-white">Administrador de Estacionamiento</p>
                <div class="card shadows">
                    <article class="card-body">
                        <p class="card-title text-center mb-4 mt-1 text-secondary lead">Bienvenid@</p>
                     <form action="validarCajeros.php" method="POST">   
                        <div class="form-group">
                            <div class="input-group">
                                <span class="icon_"> <i class="material-icons text-secondary">person</i> </span>
                                <input name="usuario" class="inp_login text-dark" placeholder="Nombre de usuario" type="text">
                            </div> <!--fin del input-group -->
                        </div> <!--fin del form-group -->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="icon_"> <i class="material-icons text-secondary">lock</i> </span>
                                <input name="password" class="inp_login text-dark" placeholder="Contraseña" type="password">
                            </div> <!--fin del input-group -->
                        </div> <!--fin del form-group -->
                    
                        <div class="form-group">
                            <button type="submit" name='inicio_sesion' class="btn btn_Login shadows">Iniciar</button>
                        </div> <!-- fin de form-group -->
                        </form>    
                    </article> <!--Fin del article-->
                </div> <!-- Fin del card -->
            </div> <!--Fin MainContenedor card-->
        </div><!--Fin del row-->
    </div><!--Fin del container-->

</body>
</html>
    <?php } ?>