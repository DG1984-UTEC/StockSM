<?php

session_start();
include_once ('database.php');



if (isset($_SESSION['user'])){


    //if (isset($_GET['id'])){
      //  $id = intval($_GET['id']);
        if (isset($_POST['borrar_registro_btn'])){
            $id = $_POST['reg'];

        
       

        $consulta = $conexion->query("DELETE FROM registros WHERE id='$id'");
        
            if ($consulta){
                echo '<div class="alert alert-success" role="alert">
            <h4>Datos Borrados con éxito</h4>
            </div>';
            echo '<a Class="btn btn-primary btn-lg" href="listar.php">Volver</a>';
                
            }else{
                echo "registro no borrado";
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="jquery/jquery-3.6.0.js"></script>
    <title>Logout</title>
</head>

<body style="background-color:lightgray">

</body>

</html>