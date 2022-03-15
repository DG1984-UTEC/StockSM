<?php
session_start();
include_once ('database.php');



if (isset($_SESSION['user'])){

    $id = !empty($_GET['id']) ? $_GET['id'] : 0;
    $linea='';

    if($id){

        $registro = "SELECT * FROM registros WHERE id = $id;";
        $resultado = mysqli_query($conexion,$registro);
        $linea = mysqli_fetch_array($resultado);
    }

  

}else{
    echo header("location: login.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body style="background-color:lightgray">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Unidos para Ayudar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agregar.php">Agregar</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="listar.php">Listar</a>
                    </li>

                    </ul>
                <form method="post" action="buscarxCI.php" style="width:20%;margin-right:50px">
                <div class="input-group">
                <input type="buscarxCI" class="form-control rounded" name="buscarPorCI" placeholder="Buscar por Cédula"/>
                <button type="submit" class="btn btn-secondary" name="buscarxCI">Buscar</button>
                </div>
                </form> 
                <div class="dropdown" style="margin-right:50px">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION["user"];?>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="logout.php">Cerrar Sesión</a></li>
                    </ul>
                
            </div>
        </div>
    </nav>
    <form method="post" action="actualizar.php">
        <div class="container-xl" style="background-color: white;margin-top:2%">
            <div class="mb-3">
                <br>

                <label for="FechaEntrega" class="form-label">Fecha Entrega</label>
                <input type="Date" class="form-control" name="fechaentrega" value="<?php echo $linea['fentrega'];?>">

            </div>
            <div class="mb-3">
                <label for="CI" class="form-label">CI</label>
                <input type="text" class="form-control" name="ci" value="<?php echo $linea['ci'];?>">

            </div>
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $linea['nombre'];?>">

            </div>
            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?php echo $linea['apellido'];?>">

            </div>
            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" name="telefono" value="<?php echo $linea['telefono'];?>">

            </div>
            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo $linea['direccion'];?>">
            </div>
            <div class="mb-3">
                <label for="respentrega" class="form-label">Responsable de entrega</label>
                <!--    <input type="text" class="form-control" name="respentrega" required="true">-->
                <select class="form-select" name="respentrega" required="true">
                    <option selected></option>
                    <option value="Promocion Social">Promocion Social</option>
                    <option value="MIDES">MIDES</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <div class="form-floating">
                    <label for="floatingTextarea"></label>
                    <textarea class="form-control" placeholder="observaciones" value="<?php echo $linea['observaciones'];?>" name="observaciones"></textarea>
                </div>

            <button type="submit" name= "modificar" class="btn btn-primary">Modificar</button>
            <br>
            <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">

            <br>
        </div>

    </form>

</body>

</html>