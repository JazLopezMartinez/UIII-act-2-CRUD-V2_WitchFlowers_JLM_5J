<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['idflortempo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $idflortempo = $_GET['idflortempo'];

    $sentencia = $bd->prepare("select * from flor_temporada where idflortempo = ?;");
    $sentencia->execute([$idflortempo]);
    $flor_temporada = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">ID Pedido: </label>
                        <input type="text" class="form-control" name="idpedido2" required 
                        value="<?php echo $flor_temporada->idpedido2; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Temporada: </label>
                        <input type="text" class="form-control" name="temporada" autofocus required
                        value="<?php echo $flor_temporada->temporada; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo Flor: </label>
                        <input type="text" class="form-control" name="tipoflor" autofocus required
                        value="<?php echo $flor_temporada->tipoflor; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre Del Pedido: </label>
                        <input type="text" class="form-control" name="nombreped" autofocus required
                        value="<?php echo $flor_temporada->nombreped; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad Pedidas: </label>
                        <input type="text" class="form-control" name="cantidadped" autofocus required
                        value="<?php echo $flor_temporada->cantidadped; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nota: </label>
                        <input type="text" class="form-control" name="nota" autofocus required
                        value="<?php echo $flor_temporada->nota; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo De Pago: </label>
                        <input type="text" class="form-control" name="tipopago" autofocus required
                        value="<?php echo $flor_temporada->tipopago; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idflortempo" value="<?php echo $flor_temporada->idflortempo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>