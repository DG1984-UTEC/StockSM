<?php
include_once ('database.php');
session_start();

if (isset($_SESSION['user'])){


    $fentrega =$_POST['fechaentrega'];
    $ci =$_POST['ci'];
    $nombre =$_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $respentrega = $_POST['respentrega'];
    $observaciones = $_POST['observaciones'];
    $id = $_POST['id'];
    $sesion= $_SESSION['user'];

    if($fentrega&&$ci&&$nombre&&$apellido&&$telefono&&$direccion){
        
        

    $update = $conexion->query("UPDATE registros SET fentrega ='$fentrega', ci = '$ci', nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion', respentrega='$respentrega', observaciones='$observaciones', sesion='$sesion' WHERE id='$id'");
        
    $resultado = mysqli_query($conexion,$update);
    header('Location: http://uxayudar.mywebcommunity.org/listar.php');

echo '<div class="alert alert-success" role="alert">
            <h4>Datos Actualizados con éxito</h4>
            </div>';
            echo '<a Class="btn btn-primary btn-lg" href="http://uxayudar.mywebcommunity.org/listar.php">Volver</a>';


}
}else{
    echo header("location: login.php");
    
  }
?>