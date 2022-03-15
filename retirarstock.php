<?php
session_start();
include_once ('database.php');



if (isset($_SESSION['user'])){

    if (isset($_POST["fechaSalida"],$_POST["art"],$_POST["cantidadSalida"],$_POST["destino"],$_POST["observaciones"])){

        $fechaS = mysqli_real_escape_string ($conexion, $_POST['fechaSalida']);
        $art = mysqli_real_escape_string ($conexion, $_POST['art']);
        $cantSalida = mysqli_real_escape_string ($conexion, $_POST['cantidadSalida']);
        $destino = mysqli_real_escape_string ($conexion, $_POST['destino']);
        $observaciones = mysqli_real_escape_string ($conexion, $_POST['observaciones']);
        $user = $_SESSION['user'];
    
        
        $select = $conexion->query("SELECT stock FROM inventario WHERE id ='$art'");           
        $row = mysqli_fetch_array($select);
        $cons = $row['stock']; 
       
            if ($cons <= $cantSalida){
                    
                echo '<div class="alert alert-danger" role="alert">
                Existencias insuficientes, verifique Stock del producto
                </div>';
                //echo '<script>alert("Existencias insuficientes")</script>';
                }else{
                    $insercion = $conexion->query("INSERT INTO stocksalidas (fecha, articulo, cantidad, destino, observaciones, sesion) VALUES ('$fechaS','$art','$cantSalida','$destino', '$observaciones', '$user')");
                    $insercionStock = $conexion->query("UPDATE inventario SET stock = stock-'$cantSalida' WHERE id='$art'");

                    if($insercion){  
                        $_SESSION ['OKagregar'] ='Datos insertados con éxito';
                        // echo "<script>alert('Datos insertados con éxito')
                        //location='index.php'; 
                        //</script>";
                    
            
                        echo '<div class="alert alert-warning" role="alert">
                        Datos actualizados con éxito
                        </div>';
                        // header('location: index.php');
                        
                    }else{
                        $_SESSION['NOagregar'] ='Error al insertar datos';
                        //echo "<script>alert('No se insertaron datos')</script>";
                        echo '<div class="alert alert-danger" role="alert">
                        No se insertaron los datos, verifique
                        </div>';
                        
                    }
                }   
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
    <link rel="stylesheet" href="bootstrap/css/estilo.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Retirar</title>
</head>

<body style="background-color:lightgray">

    <nav class="navbar navbar-expand-lg navbar-light bg-" style="background-color:white">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"></a>
            <img src="assets\membretepm.png" style="width:100%;max-width:50px;float:left;margin-top: 2px;"></img>
            <img src="assets\tierraheroica.jpg" style="width:100%;max-width:50px;float:right;margin-top: 2px;"></img>
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
                        <a class="nav-link active" aria-current="page" href="ingresarstock.php">Ingreso de Artículos</a>
                        <!--<a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#agregarModal">Agregar</a>-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="retirarstock.php">Salida de Artículos</a>
                        <!--<a class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#agregarModal">Agregar</a>-->
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="listar.php">Listar Stock</a>
                    </li>

                </ul>
                <form method="post" action="buscarxCI.php" style="width:20%;margin-right:50px">
                    <div class="input-group">
                        <input type="buscarxCI" class="form-control rounded" name="buscarPorCI"
                            placeholder="Buscar por Cédula" />
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
                <form class="d-flex">

                </form>
            </div>
        </div>
    </nav>
    <form method="POST" action="retirarstock.php">
        <div class="container-xl" style="background-color: white;margin-top:2%">
            <div class="mb-3">
                <br>

                <label for="FechaSalida" class="form-label">Fecha</label>
                <input type="Date" class="form-control" name="fechaSalida">

            </div>

            <select class="form-select" name="art">
                <option value="0">Seleccionar artículo:</option>
                <?php $consulta = $conexion->query("SELECT * FROM inventario");

        while ($res = mysqli_fetch_array($consulta)){
            echo '<option value="'.$res["id"].'">'.$res["articulo"].'</option>';
         
            }
       ?>

            </select>

            <div class="mb-3">
                <label for="Cantidad" class="form-label">Cantidad</label>
                <input type="number" min="0" onkeydown="return event.keyCode !== 69" class="form-control"
                    name="cantidadSalida" required="true">

            </div>
            <select class="form-select" name="destino">
                <option value="0">Seleccionar Destino:</option>
                <?php $consulta = $conexion->query("SELECT * FROM destinos");

        while ($res = mysqli_fetch_array($consulta)){
            echo '<option value="'.$res["id"].'">'.$res["nombre"].'</option>';
         
            }
       ?>

            </select>
            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones</label>
                <div class="form-floating">
                    <label for="floatingTextarea"></label>
                    <textarea class="form-control" placeholder="observaciones" name="observaciones"></textarea>
                </div>
                <!--<label for="observaciones" class="form-label">Observaciones</label>
                <input type="floatingTextarea" class="form-control" name="observaciones">
            </div>-->
                <br>
                <button type="submit" class="btn btn-primary">Agregar</button>
                <br>
                <br>
            </div>
    </form>


</body>

</html>