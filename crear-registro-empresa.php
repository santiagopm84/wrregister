<?php
 
include 'config.php';
session_start();
 
if (isset($_POST['register'])) {
 
    $nombre = $_POST['nombre'];
    $nocertificado = $_POST['nocertificado'];
    $normacertificado = $_POST['normacertificado'];
    $estatus = $_POST['estatus'];
    
     "";
    $Strings = "0123456789";
    $identificador = "wr-".substr(str_shuffle($Strings), 0, 5);

    $query = $connection->prepare(
        "INSERT INTO empresa_certificada(nombre,num_certificado,norma_certificado,estatus,identificador) 
        VALUES (:nombre,:nocertificado,:normacertificado,:estatus,:identificador)"
    );
    $query->bindParam("nombre", $nombre, PDO::PARAM_STR);
    $query->bindParam("nocertificado", $nocertificado, PDO::PARAM_STR);
    $query->bindParam("normacertificado", $normacertificado, PDO::PARAM_STR);
    $query->bindParam("estatus", $estatus, PDO::PARAM_STR);
    $query->bindParam("identificador", $identificador, PDO::PARAM_STR);
    $result = $query->execute();

    if ($result) {
        echo '<p class="success">Tu registro fue exitoso.</p>';
        sleep(2);
        echo("<script>window.location = 'admin';</script>");

    } else {
        echo '<p class="error">Something went wrong!</p>';
        
    }

}
 
?>