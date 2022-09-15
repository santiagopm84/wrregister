<?php
  include 'config.php';

  if (isset($_POST['recupera'])) {
      $email = $_POST['email'];
  
      $query = $connection->prepare("SELECT * FROM usuarios WHERE email=:email");
      $query->bindParam("email", $email, PDO::PARAM_STR);
      $query->execute();
  
      $result = $query->fetch(PDO::FETCH_ASSOC);
  
      if (!$result) {
          echo '<p class="error">No existe usuario registrado con ese correo electrónico</p>';
      } else {
          $Strings = "APBCDapr0123456789!%";
          $pass_random = "WR-".substr(str_shuffle($Strings), 0, 10);
          $new_p4ss = password_hash($pass_random, PASSWORD_BCRYPT);

          $consultaSQL = "UPDATE usuarios SET password = '$new_p4ss' WHERE email = '$email'";
          $sentencia = $connection->prepare($consultaSQL);
          $sentencia->execute();  
          $alumno = $sentencia->fetch(PDO::FETCH_ASSOC);

          echo '<p class="success">La contraseña para '. $result['username'] . ' ha sido restablecida. Revise su correo '.$result['email'].'</p>'; 
          echo '<p class="success">'.$pass_random.' </p>';   
          
          $destinatario = "santiagopm84@gmail.com"; 
          $asunto = "Este mensaje es de prueba"; 
          $cuerpo = ' 
          <html> 
          <head> 
            <title>Prueba de correo</title> 
          </head> 
          <body> 
          <h1>Hola amigos!</h1> 
          <p> 
          <b>Bienvenidos a mi correo electrónico de prueba</b>. Estoy encantado de tener tantos lectores. Este cuerpo del mensaje es del artículo de envío de mails por PHP. Habría que cambiarlo para poner tu propio cuerpo. Por cierto, cambia también las cabeceras del mensaje. 
          </p> 
          </body> 
          </html> 
          '; 

          //para el envío en formato HTML 
          $headers = "MIME-Version: 1.0\r\n"; 
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

          //dirección del remitente 
          $headers .= "From: Recupera Contraseña <recuperacontrasenia@novaterra.com>\r\n"; 

          //dirección de respuesta, si queremos que sea distinta que la del remitente 
          //$headers .= "Reply-To: mariano@desarrolloweb.com\r\n"; 

          //ruta del mensaje desde origen a destino 
          //$headers .= "Return-path: holahola@desarrolloweb.com\r\n"; 

          //direcciones que recibián copia 
          //$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

          //direcciones que recibirán copia oculta 
          //$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

          mail($destinatario,$asunto,$cuerpo,$headers);
          echo '121212121';
        }
    }

?>
  <head>
        <metavname="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta http-equiv="Cache-control" content="no-cache, no-store, must-revalidate"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet"   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="icon" type="image/png" href="imgs/ico.png">

        <title>Recupera tu contraseña</title>
        <link rel="stylesheet" href="./css/main.css" />
        <script src="./js/app.js"></script>
    </head>

    <section class="wrapper_head_page header__in_section">
        <div class="container" style='position: relative; z-index:1'>
            <div class="row">
                <div class="col-md-12">
                    <div class="sec_head_page_info">
                      <h6 class="ttls_minimum in_head mb-4"><span>Nova Terra</span></h6>
                      <h2 class="ttl_home">Recupera tu contraseña</h2>
                      <p class="my_paragraph mt-3">Bienvenido a Nova Terra</p>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <section class='wrapper__in_section'>
        <div class="row" id="contraseña">98</div>
        <form method="post" action="" name="signin-form" class='box_form box_shaddow'>
            <div class="row">
                <div class=" col-md-12 mb-2">
                    <label>Correo electrónico</label>
                    <input class="form-control" type="email" name="email" required />
                </div>
                <div class='div_btns col-md-12'>
                    <button class='btn btn_secundary ' type="submit" name="recupera" value="recupera">Recupera</button>
                    <p></p>
                    <p><a href="login" class='btn btn-success mt-4'>Inicia sesión</a></p>
                </div>
            </div>      
        </form>
    </section> -->
