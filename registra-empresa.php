<?php
session_start();
 
if(!isset($_SESSION['user_id'])){
    header('Location: login');
    exit;
} else {
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

    <title>Registro nuevo</title>
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
              <h2 class="mt-3">Ingresa los datos de la empresa certificada</h2>
              <p class="my_paragraph mt-3">
              <div class="col-md-12">
                <a href="admin" class="btn btn-primary mt-4">Admin</a>
                <a href="crear" class="btn btn-primary mt-4">Crear </a>
              </div>
                
              </p>
            </div>
        </div>
        </div>
    </div>
</section>  
<section class='wrapper__in_section'>
  <form method="post" action="crear-registro-empresa" name="signup-form" class='box_form box_shaddow'>
    <div class="row">
      <div class=" col-md-12 mb-2">
        <label for="name" class="form-label">Nombre Cliente</label>
        <input  class="form-control" type="text" name="nombre" required />
      </div>
      <div class=" col-md-12 mb-2">
        <label for="name" class="form-label">Número de certificado</label>
        <input class="form-control" type="text" name="nocertificado" required />
      </div>
      <div class=" col-md-12 mb-2">
        <label for="name" class="form-label">Norma de certificado</label>
        <input class="form-control" type="text" name="normacertificado" required />
      </div>
      <div class=" col-md-12 mb-2">
        <!-- <label for="name" class="form-label">Estatus</label>
        <input class="form-control" type="text" name="estatus" required /> -->


        <label for="cars">Estatus:</label>
                    <select name="estatus" id="estatus" class="form-control">
                      <option value=0>Seleccione</option>
                      <option value="vigente">Vigente</option>
                      <option value="no vigente">No vigente</option>
                    </select>


      </div>
     
      <div class='div_btns col-md-12'>
      <button class='btn btn_primary mb-1' type="submit" name="register" value="register">Registrar</button>
      </div>
    </div>
  </form>
</section>
<?php 
}
?>