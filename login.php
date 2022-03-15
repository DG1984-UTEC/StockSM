<?php
include ('database.php');
session_start();

if (isset($_POST["usuario"], $_POST["password"]) and $_POST["usuario"] !="" and$_POST["password"] !=""){



    $usuario=$_POST['usuario'];
    $password=$_POST['password'];


    $login = $conexion->query("SELECT tipo FROM usuario WHERE usuario ='$usuario' AND password ='$password'");
    
    $res = mysqli_fetch_array($login);

        if($login){
            $_SESSION['user'] = $usuario;
            
            if($res['tipo'] == "ad"){
                header("location: admin.php");
            }else if ($res['tipo'] == "us"){
                header("location: index.php");
            }else{
                echo "<script>
                alert('Datos incorrectos')
             
                </script>";
            }
        }else{
            echo "<script>
            alert('El usuario no existe en el sistema')
        
            </script>";
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
        <title>Login</title>
</head>

<body style="background-color:lightgray">
    <form method="POST" action="login.php">
        <div class="container-xl" style="background-color: white;margin-top:5%;width:100%">
        <br>
                <br>
            <div class="mb-3">

            
                    <img src="assets\membretepm.png" alt="logo"
                        style="width:100%;max-width:340px;float:center;display:block;margin-left:auto;margin-right:auto;margin-top: 12px;">
          </div>


            <div class="mb-3">

                
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario" required="true">

            
        
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" required="true">
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>
            <br>
            <br>
        </div>
        

        <form>
</body>

</html>