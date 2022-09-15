<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: login');
    exit;
} else {
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

  <html>
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
          <link rel="icon" type="image/png" href="imgs/ico.png">
          <link rel="stylesheet"   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

          <title>Generar códigos QR</title>
          <link rel="stylesheet" href="./css/main.css" />
          <script src="./js/app.js"></script>
      </head>

      <body class="">
      <section class="wrapper_head_page header__in_section">
        <div class="container" style='position: relative; z-index:1'>
          <div class='textright_close'>
            <a class='closebtn' href="logout">Cerrar sesión</a>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="sec_head_page_info">
                <h6 class="ttls_minimum in_head mb-4"><span></span></h6>
                <h1 class="">Hola <?php  echo $_SESSION['user_name'];?></h1>
                <p class="my_paragraph mt-3">
                <div class="col-md-12">
                <a href="registra-empresa" class="btn btn-primary mt-4">Registrar empresa </a>
                <a href="admin" class="btn btn-primary mt-4">Admin</a>
              </div>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>  

      <section class='wrapper_contact verications'>
        
        <div class="sec_info_form">
          <form
            class='box_form box_shaddow'
            method="post" 
            id="codeForm" 
            onsubmit="return false"
          >
            <div class="row">
              <div class="mb-4 col-sm-6 mb-2">
                <div class="form-group">
                  <label class="control-label">Empresa certificada: </label>
                  <select name="asunto" id="content" class="form-control">
                    <option value="0">Seleccione:</option>
                    <!-- <label class="control-label">Información: </label>
                    <input class="form-control" id="content" type="text" required="required"> -->

                    <?php
                      if ($alumnos && $sentencia->rowCount() > 0) {
                        foreach ($alumnos as $fila) {
                          echo '<option value="'.$fila["identificador"].'">'.utf8_encode($fila["nombre"]).' - '.$fila["norma_certificado"].'</option>';
                        }
                      }
                      ?>
                    </select>

                </div>
                <div class="form-group">
                    <label class="control-label">Calidad imagen QR: </label>
                    <select class="form-control" id="ecc">
                        <option value="H">H - Mejor</option>
                        <option value="M">M</option>
                        <option value="Q">Q</option>
                        <option value="L">L - Peor</option>                         
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Tamaño: </label>
                    <input type="number" min="6" max="10" step="6" class="form-control" id="size" value="6">
                </div>
              </div>
              <div class="mb-4 col-sm-6 text-center mb-2">
                <div class="form-group">
                    <label class="control-label"></label>
                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="Generar código QR">
                </div>
                <div>
                  <div class="showQRCode"></div>
                </div>
              </div>
              <div class="col-md-12 text-center">
                <div class="insert-post-ads1" style="margin-top:20px;"></div>
              </div>
            </div>
          </form>
        </div>
        
      </section>
      </body>
  </html>
  <?php  
}
?>