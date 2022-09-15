<?php
header("Content-type: text/html; charset=utf8");
include 'funciones.php';

$config = include 'config.php';

$resultado = [
  'error' => false,
  'mensaje' => ''
];


if (isset($_POST['submit'])) {
  try {

    $alumno = [
      "empresa_cert_id" => $_GET['id'],
      "nombre" => $_POST['nombre'],
      "num_certificado" => $_POST['nocertificado'],
      "norma_certificado" => $_POST['normacertificado'],
      "estatus" => $_POST['estatus']
    ];
    
    $consultaSQL = "UPDATE empresa_certificada SET
        nombre = :nombre,
        num_certificado = :num_certificado,
        norma_certificado = :norma_certificado,
        estatus = :estatus
        WHERE empresa_cert_id = :empresa_cert_id";

$consulta = $connection->prepare($consultaSQL);
    $consulta->execute($alumno);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }
}

try {
    
  $id = $_GET['id'];
  $consultaSQL = "SELECT * FROM empresa_certificada WHERE empresa_cert_id =" . $id;

  $sentencia = $connection->prepare($consultaSQL);
  $sentencia->execute();

  $alumno = $sentencia->fetch(PDO::FETCH_ASSOC);

} catch(PDOException $error) {
  $resultado['error'] = true;
  $resultado['mensaje'] = $error->getMessage();
}
?>

<?php
if ($resultado['error']) {
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
  <?php
}
?>

<?php
if (isset($_POST['submit']) && !$resultado['error']) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-success" role="alert">
          El cliente ha sido actualizado correctamente
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php
if (isset($alumno) && $alumno) {
  ?>

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
              <p class="my_paragraph mt-3">
              <h2 class="mt-4">Editando <?= escapar($alumno['nombre']) ?></h2>
              </p>
            </div>
        </div>
        </div>
    </div>
</section> 

<section class='wrapper__in_section'>

<form method="post">
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= escapar($alumno['nombre']) ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="nocertificado">Número de certificado</label>
            <input type="text" name="nocertificado" id="nocertificado" value="<?= escapar($alumno['num_certificado']) ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="normacertificado">Norma de certificado</label>
            <input type="text" name="normacertificado" id="normacertificado" value="<?= escapar($alumno['norma_certificado']) ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="edad">Estatus</label>
            <input type="text" name="estatus" id="estatus" value="<?= escapar($alumno['estatus']) ?>" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
            <a class="btn btn-primary" href="admin">Regresar al inicio</a>
          </div>
        </form>
        
</section>



  <?php
}
?>

