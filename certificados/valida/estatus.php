<?php
header("Content-type: text/html; charset=utf8");
include '../../funciones.php';

$config = include '../../config.php';

try {
    
    $identificador = $_GET['certifica'];
    $consultaSQL = "SELECT * FROM empresa_certificada WHERE identificador = '$identificador'";
  
    $sentencia = $connection->prepare($consultaSQL);
    $sentencia->execute();  
    $alumno = $sentencia->fetch(PDO::FETCH_ASSOC);

  } catch(PDOException $error) {
    $resultado['error'] = true;
    $resultado['mensaje'] = $error->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <link rel="icon" type="image/png" href="../..imgs/ico.png">
    <title>Validación de certificado - Nova Terra Certificación</title>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta
      http-equiv="Cache-control"
      content="no-cache, no-store, must-revalidate"
    />
    <meta http-equiv="Pragma" content="no-cache" />
    <!-- Chrome, Firefox OS y Opera -->
    <meta name="theme-color" content="#c55a11" />
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#c55a11" />
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#c55a11" />

    <meta name="author" content="By Alex P. Montero" />
    <meta name="application-name" content="Sitio web oficial Nova Terra" />
    <meta
      name="description"
      content="Prestamos servicios de auditoría y certificación de Sistemas de Gestión de la Calidad, Ambiental y de la Seguridad y Salud en el Trabajo"
    />

    <meta property="og:locale" content="es_ES" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Nova Terra" />
    <meta property="og:url" content="http://www.novaterra.com/" />
    <meta property="og:site_name" content="Nova Terra" />
    <meta property="og:image" itemprop="image" content="../..imgs/bg_seo.jpg" />
    <meta
      property="og:description"
      content="Prestamos servicios de auditoría y certificación de Sistemas de Gestión de la Calidad, Ambiental y de la Seguridad y Salud en el Trabajo"
    />

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../../css/main.css" />
  </head>
  <body>
    <header class="wrapper_header"></header>

    <section class="wrapper_head_page">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-6">
            <div class="sec_head_page_info">
              <h6 class="ttls_minimum in_head mb-4"><span>Nova Terra</span></h6>
              <h3 class="ttl_home">Validación de certificado</h3>
              <p class="my_paragraph mt-3">
                La Certificación es la forma mas confiable de demostrar
                excelencia y conducir la mejora continua.
              </p>
            </div>
          </div>
          <div class="col-md-6">
          </div>
        </div>
      </div>
    </section>

    <section class="wrapper_certif">
      <div class="container-lg">
        <div class="sec_ttls_certif">
          <div style="width: 100%;">
            <img src="../../imgs/bg_seo.jpg" alt="WRegister" title="WRegister"/>
          </div>
          <br/>
          <div class="row ">               
            <div class="mb-3 col-md-12">
              <label for="cliente" class="form-label"
                >Nombre Cliente</label
              >
              <input
                type="text"
                class="form-control"
                value="<?= escapar($alumno['nombre']) ?>"
                disabled
                id="cliente"
                name="cliente"
                aria-describedby="clienteHelp"
              />
            </div>
            <div class="msg mt-3 mb-3"></div>
          </div>
          <div class="row ">               
            <div class="mb-3 col-md-12">
              <label for="tipo" class="form-label"
                >No de Certificado </label
              >
                <input type="text" name="nocertificado" id="nocertificado" value="<?= escapar($alumno['num_certificado']) ?>" class="form-control" disabled>
            </div>
            <div class="msg mt-3 mb-3"></div>
          </div>
          <div class="row ">               
            <div class="mb-3 col-md-12">
              <label for="vigencia" class="form-label"
                >Norma (s) certificada (s):
                </label
              >
              <input
                type="text"
                class="form-control"
                value="<?= escapar($alumno['norma_certificado']) ?>"
                disabled
                id="vigencia"
                name="vigencia"
                aria-describedby="vigenciaHelp"
              />
            </div>
            <div class="msg mt-3 mb-3"></div>
          </div>
          <div class="row ">               
            <div class="mb-3 col-md-12">
              <label for="estatus" class="form-label"
                >Estatus de certificación:
                </label
              >
              <input
                type="text"
                class="form-control"
                value="<?= escapar($alumno['estatus']) ?>"
                disabled
                id="estatus"
                name="estatus"
                aria-describedby="statusHelp"
              />
            </div>
            <div class="msg mt-3 mb-3"></div>
          </div>

          <div class="col-md-12 text-center">
            <a href="../../index">
              <button class="btn btn-primary">INICIO</button>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="wrapper_experience"></section>

    <footer class="wrapper_footer"></footer>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
    <script src="../../js/main.js"></script>
    <script>
      $(document).ready(function () {
        loadComponents();
      });
    </script>
  </body>
</html>
