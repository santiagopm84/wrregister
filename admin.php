<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: login');
    exit;
}
header("Content-type: text/html; charset=utf8");
include 'funciones.php';

$error = false;
$config = include 'config.php';

try {
    $consultaSQL = "SELECT * FROM empresa_certificada";

    $sentencia = $connection->prepare($consultaSQL);
    $sentencia->execute();

    $alumnos = $sentencia->fetchAll();

} catch(PDOException $error) {
    $error= $error->getMessage();
}
?>


<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
  <div class="row">
    
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      
    </div>
  </div>
</div>

<head>
<meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta
      http-equiv="Cache-control"
      content="no-cache, no-store, must-revalidate"
    />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet"   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="imgs/ico.png">

    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="./css/main.css" />
    <script src="./js/app.js"></script>
</head>

<section class="wrapper_head_page header__in_section">
    <div class="container" style='position: relative; z-index:1'>
    <div class='textright_close'>
            <a class='closebtn' href="logout">Cerrar sesión</a>
          </div>
        <div class="row">
        <div class="col-md-12">
            <div class="sec_head_page_info">
              <h6 class="ttls_minimum in_head mb-4"><span>Nova Terra</span></h6>
              <h2 class="mt-3">Lista de clientes</h2>
              <p class="my_paragraph mt-3">
              <div class="col-md-12">
                <a href="registra-empresa" class="btn btn-primary mt-4">Registrar empresa </a>
                <a href="crear" class="btn btn-primary mt-4">Crear </a>
                <a href="cambiar" class="btn btn-primary mt-4">Cambiar contraseña</a>
              </div>

              </p>
            </div>
        </div>
        </div>
    </div>
</section> 


      <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Num Certificado</th>
            <th>Norma de certificado</th>
            <th>Estatus</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($alumnos && $sentencia->rowCount() > 0) {
            foreach ($alumnos as $fila) {
              ?>
              <tr>
                <td><?php echo escapar(utf8_encode($fila["nombre"])); ?></td>
                <td><?php echo escapar($fila["num_certificado"]); ?></td>
                <td><?php echo escapar($fila["norma_certificado"]); ?></td>
                <td><?php echo escapar(ucfirst(utf8_encode($fila["estatus"]))); ?></td>
                <td>
                  <a href="<?= 'borrar?id=' . escapar($fila["empresa_cert_id"]) ?>">🗑️</a>
                  <a href="<?= 'editar?id=' . escapar($fila["empresa_cert_id"]) ?>" . >✏️</a>
                </td>
              </tr>
              <?php
            }
          }
          ?>
        <tbody>
      </table>
  
