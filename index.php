<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DashPark</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('links.php')?>

</head>

<body class="body_bg">
    <div class="container"> 
        <div class="row">                
            <div class="col-sm-5 contenedor"> <!--MainContenedor card-->
                <br />
                <h1 class="display-4 text-center text-light">DashPark</h1>
                <p class="lead text-center text-white">Administrador de Estacionamiento</p>
                    <!-- <form id="form1" runat="server"> -->
                        <div class="card shadows">
                            <article class="card-body">
                                <p class="card-title text-center mb-4 mt-1 text-secondary lead">Bienvenid@</p>
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="icon_"> <i class="material-icons text-secondary">person</i> </span>
                                        <input name="" class="inp_login text-dark" placeholder="Nombre de usuario" type="text">
                                    </div> <!--fin del input-group -->
                                </div> <!--fin del form-group -->
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="icon_"> <i class="material-icons text-secondary">lock</i> </span>
                                        <input name="" class="inp_login text-dark" placeholder="Contraseña" type="password">
                                    </div> <!--fin del input-group -->
                                </div> <!--fin del form-group -->
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn_Login shadows">Iniciar</button>
                                </div> <!-- fin de form-group -->
        
                            </article> <!--Fin del article-->
                        </div> <!-- Fin del card -->
                    <!-- </form> -->
            </div> <!--Fin MainContenedor card-->
        </div>
    </div>
    


</body>
</html>