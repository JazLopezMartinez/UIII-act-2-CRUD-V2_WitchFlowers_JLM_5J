<?php
    print_r($_POST);
    if(!isset($_POST['idflortempo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $idflortempo = $_POST["idflortempo"];
    $idpedido2 = $_POST["idpedido2"];
    $temporada = $_POST["temporada"];
    $tipoflor = $_POST["tipoflor"];
    $nombreped = $_POST["nombreped"];
    $cantidadped = $_POST["cantidadped"];
    $nota = $_POST["nota"];
    $tipopago = $_POST["tipopago"];

    $sentencia = $bd->prepare("UPDATE flor_temporada SET idpedido2 = ?, temporada = ?, tipoflor = ?, nombreped = ?, cantidadped = ?, nota = ?, tipopago = ? where idflortempo = ?;");
    $resultado = $sentencia->execute([$idpedido2, $temporada, $tipoflor, $nombreped ,$cantidadped,$nota,$tipopago,$idflortempo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>