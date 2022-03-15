<?php
session_start();




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
<div class="alert alert-warning" role="alert"><h4> UD a Salido exitosamente del sistema</h4><a Class="btn btn-primary btn-lg" href="login.php">Volver</a></div>
   <!-- <div class="container-xl" style="background-color: white;margin-top:10%;margin-left:35%;width:30%">
        <div class="mb-3">
            <div class="alert alert-danger" role="alert"><h3> UD a Salido exitosamente del sistema</h3></div>
        </div>
    </div>-->
</body>

</html>
<?php


session_destroy();


?>