<?php
session_start();
include_once ('database.php');




if (isset($_SESSION['user'])){

    
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


    <title>Listado</title>
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
            <div style="overflow-x:auto;">
           
        
            <table class="table table-striped table-responsive">
                <tr>
                    <!--<th scope="col">id</th>-->
                    <th scope="col">ARTICULO</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">CREADO</th>
                    <th scope="col">ACTUALIZADO</th>
                    <th scope="col">ACCIONES</th>
                </tr>
                <?php
                
              



                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 12;
                $offset = ($pageno-1) * $no_of_records_per_page;
        
                
                $result = $conexion->query("SELECT COUNT(*) FROM inventario"); 
                        
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
        
              //  $sql =$conexion->query("SELECT * FROM registros LIMIT $offset, $no_of_records_per_page");
            $listar = $conexion->query("SELECT * FROM inventario LIMIT $offset, $no_of_records_per_page"); 
                    
                while ($res = mysqli_fetch_array($listar)){
                
                    $art= $res["articulo"];
                    $stock= $res["stock"];
                    $created_at=$res["CREATED_AT"];
                    $updated_at=$res["UPDATED_AT"];
                    
                    
                ?>
                <tr>
                    <td style="display:none" class="reg_id"><?php echo $id;?></td>
                    <td><?php echo $art;?></td>
                    <td><?php echo $stock;?></td>
                    <td><?php echo $created_at;?></td>
                    <td><?php echo $updated_at;?></td>
                    
                    <td>
                        <a type="button" class="btn btn-primary" href="modificar.php?id=<?php echo $id;?>" class="edit"
                            title="Editar">Editar</a>
                        <a class="btn btn-danger borrar_btn">Borrar</a>
                        <!--data-bs-toggle="modal" data-bs-target="#borrar"-->
                        <!--<a id="eliminar" class="delete" title="Eliminar">Borrar</a>-->
                    </td>
                </tr>

                <?php
                }
                ?>
            </table>
            </div>
          <!--  <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>-->

            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="?pageno=1">Primero</a></li>
                <li class="page-item" <?php if($pageno <= 1){ echo 'disabled'; } ?>>
                    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Anterior</a>
                </li>
                <li class="page-item" <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>>
                    <a class="page-link"
                        href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Siguiente</a>
                </li>
                <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Ultimo</a></li>
            </ul>
            <!-- Button trigger modal 
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>-->

            <!-- Modal -->

            <div class="modal fade" id="borrarModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmar Borrado de Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="eliminar.php">
                            <div class="modal-body">
                                <input type="hidden" name="reg" id="borrar_reg">
                                ¿Realmente desea eliminar el registro?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>

                                <button type="submit" name="borrar_registro_btn"
                                    class="btn btn-primary">Confirmar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="msgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Estado de Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="eliminar.php">
                            <div class="modal-body">
                                <div class="alert alert-warning" role="alert"><?php echo $_SESSION['OKagregar']?></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>

                                <!--<button type="submit" name="borrar_registro_btn" class="btn btn-primary">Confirmar</button>-->

                            </div>
                        </form>
                    </div>
                </div>
            </div>





            <div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarmodal" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="listar_modal">Agregar Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="listar.php">
                            <div class="modal-body">
                                <div class="container-xl" style="background-color: white;margin-top:2%">
                                    <div class="mb-3">
                                        <br>

                                        <label for="FechaEntrega" class="form-label">Fecha Entrega</label>
                                        <input type="Date" class="form-control" name="fechaentrega" id="fechaentrega"
                                            required="true">

                                    </div>
                                    <div class="mb-3">
                                        <label for="CI" class="form-label">CI</label>
                                        <input type="text" class="form-control" name="ci" id="ci" required="true">

                                    </div>
                                    <div class="mb-3">
                                        <label for="Nombre" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                            required="true">

                                    </div>
                                    <div class="mb-3">
                                        <label for="Apellido" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" name="apellido" id="apellido"
                                            required="true">

                                    </div>
                                    <div class="mb-3">
                                        <label for="Telefono" class="form-label">Teléfono</label>
                                        <input type="text" class="form-control" name="telefono" id="telefono"
                                            required="true">

                                    </div>
                                    <div class="mb-3">
                                        <label for="Direccion" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" name="direccion" id="direccion"
                                            required="true">
                                    </div>
                                    <button type="button" name="limpiar_registro_btn"
                                        class="btn btn-primary">Borrar</button>
                                    <button type="submit" name="agregar_registro_btn"
                                        class="btn btn-primary">Confirmar</button>



                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>

                                <!--<button type="submit" name="agregar_registro_btn" class="btn btn-primary">Confirmar</button>-->

                            </div>
                        </form>
                    </div>
                </div>
            </div>

</body>
<script>
$(document).ready(function() {

    $('.borrar_btn').click(function(e) {
        e.preventDefault();


        var reg_id = $(this).closest('tr').find('.reg_id').text();
        //console.log(reg_id);
        $('#borrar_reg').val(reg_id);

        $('#borrarModal').modal('show');
    });


    $('.agregar_btn').click(function(e) {
        e.preventDefault();


        var fechaentrega = $(this).closest('tr').find('.fechaentrega').text();
        var ci = $(this).closest('tr').find('.ci').text();
        var nombre = $(this).closest('tr').find('.nombre').text();
        var apellido = $(this).closest('tr').find('.apellido').text();
        var telefono = $(this).closest('tr').find('.telefono').text();
        var direccion = $(this).closest('tr').find('.direccion').text();

        $('#fechaentrega').val(fechaentrega);
        $('#ci').val(ci);
        $('#nombre').val(nombre);
        $('#apellido').val(apellido);
        $('#telefono').val(telefono);
        $('#direccion').val(direccion);

        $('#agregarModal').modal('show');

    });
})
</script>

</html>