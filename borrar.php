<?php
header("Content-type: text/html; charset=utf8");
include 'funciones.php';

$config = include 'config.php';

$resultado = [
  'error' => false,
  'mensaje' => ''
];

try {
    
  $id = $_GET['id'];
  $consultaSQL = "DELETE FROM empresa_certificada WHERE empresa_cert_id =" . $id;

  $sentencia = $connection->prepare($consultaSQL);
  $sentencia->execute();

  header('Location: /admin.php');

} catch(PDOException $error) {
  $resultado['error'] = true;
  $resultado['mensaje'] = $error->getMessage();
}
?>


<div class="container mt-2">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-danger" role="alert">
        <?= $resultado['mensaje'] ?>
      </div>
    </div>
  </div>
</div>

