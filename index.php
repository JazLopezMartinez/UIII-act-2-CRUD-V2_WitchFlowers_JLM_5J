<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from flor_temporada");
    $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-112">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                 Flores de temporada
                </div>
                <div class="p-10">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID Flor Temporada</th>
                                <th scope="col">ID Pedido</th>
                                <th scope="col">Temporada</th>
                                <th scope="col">Tipo Flor</th>
                                <th scope="col">Nombre Del Pedido</th>
                                <th scope="col">Cantidad Pedidas</th>
                                <th scope="col">Nota</th>
                                <th scope="col">Tipo De Pago</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($persona as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->idflortempo; ?></td>
                                <td><?php echo $dato->idpedido2; ?></td>
                                <td><?php echo $dato->temporada; ?></td>
                                <td><?php echo $dato->tipoflor; ?></td>
                                <td><?php echo $dato->nombreped; ?></td>
                                <td><?php echo $dato->cantidadped; ?></td>
                                <td><?php echo $dato->nota; ?></td>
                                <td><?php echo $dato->tipopago; ?></td>
                                <td><a class="text-success" href="editar.php?idflortempo=<?php echo $dato->idflortempo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?idflortempo=<?php echo $dato->idflortempo; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">ID Pedido: </label>
                        <input type="text" class="form-control" name="idpedido2" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Temporada: </label>
                        <input type="text" class="form-control" name="temporada" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo Flor: </label>
                        <input type="text" class="form-control" name="tipoflor" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre Del Pedido: </label>
                        <input type="text" class="form-control" name="nombreped" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad Pedidas: </label>
                        <input type="text" class="form-control" name="cantidadped" autofocus required min-2>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nota: </label>
                        <input type="text" class="form-control" name="nota" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo De Pago: </label>
                        <input type="text" class="form-control" name="tipopago" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br>

<?php include 'template/footer.php' ?>