<?php
    //print_r($_POST);
    if(empty($_POST["oculto"])|| empty($_POST["idpedido2"]) || empty($_POST["temporada"])|| empty($_POST["tipoflor"])|| empty($_POST["nombreped"])|| empty($_POST["cantidadped"])|| empty($_POST["nota"])|| empty($_POST["tipopago"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $idpedido2 = $_POST["idpedido2"];
    $temporada = $_POST["temporada"];
    $tipoflor = $_POST["tipoflor"];
    $nombreped = $_POST["nombreped"];
    $cantidadped = $_POST["cantidadped"];
    $nota = $_POST["nota"];
    $tipopago = $_POST["tipopago"];
    
    $sentencia = $bd->prepare("INSERT INTO flor_temporada(idpedido2,temporada,tipoflor,nombreped,cantidadped,nota,tipopago) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$idpedido2,$temporada,$tipoflor,$nombreped,$cantidadped,$nota,$tipopago]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>