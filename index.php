<?php
include ('database.php');
session_start();

if (isset($_SESSION['user'])){
    
    //$total= $conexion->query("SELECT COUNT id FROM registros");
    $total= $conexion->query("SELECT * FROM inventario");
    //SELECT COUNT(column_name) FROM table_name;
    $totales=mysqli_num_rows($total);

   /* $sql = "SELECT COUNT(*) as cnt FROM news";
    $result = mysqli_query($con, $sql);
    $count = mysqli_fetch_assoc($result)['cnt'];
    echo $count;
*/


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
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="jquery/jquery-3.6.0.js"></script>
    <title>Principal</title>
</head>

<body style="background-color:lightgray">
    <nav class="navbar navbar-expand-lg navbar-light bg-" style="background-color:white">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"></a>
            <img src="assets\membretepm.png"
                style="width:100%;max-width:50px;float:left;margin-top: 2px;"></img>
                 <img src="assets\tierraheroica.jpg"
                        style="width:100%;max-width:50px;float:right;margin-top: 2px;"></img>
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
                <form class="d-flex">
                   
                </form>
            </div>
        </div>
    </nav>

    <div class="container-xl" style="background-color: white;margin-top:2%">
        <div class="mb-3">
            <br>
            
            <img src="assets\membretepm.png"
                style="width:100%;max-width:340px;float:center;display:block;margin-left:auto;margin-right:auto;margin-top: 2px;"></img>
            
            <br>
            <br>
            <div class=mb-3 style="align:center">
            <label for="totalregistros" style="width:100%;" class="form-label">
                <h4 align="center">Total de Registros: <?php echo $totales;?></h4>
            </label>
            </div>
           <!-- <input type="text" class="form-control" name="ci" value="<?php echo $totales;?>" id="ci" required="true">-->
            <br>
            <br>
        </div>
    </div>



</body>

</html>