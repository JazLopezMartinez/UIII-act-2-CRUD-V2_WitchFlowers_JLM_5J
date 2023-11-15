<?php 
    if(!isset($_GET['idflortempo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $idflortempo = $_GET['idflortempo'];

    $sentencia = $bd->prepare("DELETE FROM flor_temporada where idflortempo = ?;");
    $resultado = $sentencia->execute([$idflortempo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>