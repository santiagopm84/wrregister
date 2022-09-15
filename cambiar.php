<?php
    session_start();
    include 'config.php';

    if(!isset($_SESSION['user_id'])){
        header('Location: login');
        exit;
    }
    else {
        if (isset($_POST['cambiar'])) {

            $new_password = $_POST['new_password'];
            $id_usuario = $_SESSION['user_id'];
        
            $new_p4ss = password_hash($new_password, PASSWORD_BCRYPT);
            $consultaSQL = "UPDATE usuarios SET password = '$new_p4ss' WHERE usuario_id = '$id_usuario'";
            $sentencia = $connection->prepare($consultaSQL);
            $sentencia->execute();  
            $alumno = $sentencia->fetch(PDO::FETCH_ASSOC);

            // echo '<p class="success">La contraseña para '. $_SESSION['user_name'] . ' ha sido cambiada.</p>'; 
            // sleep(3);
            // echo("<script>window.location = 'admin';</script>");

        }

        if (isset($_POST['cambiar'])) {
            ?>
                <div class="container mt-2">
            <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                La contraseña para <?php echo $_SESSION['user_name'];?>  ha sido cambiada.
                </div>
            </div>
            </div>
        </div>
        <?php
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

        <title>Cambia tu contraseña</title>
        <link rel="stylesheet" href="./css/main.css" />
        <script src="./js/app.js"></script>
    </head>

    <section class="wrapper_head_page header__in_section">
        <div class="container" style='position: relative; z-index:1'>
            <div class="row">
                <div class="col-md-12">
                    <div class="sec_head_page_info">
                      <h6 class="ttls_minimum in_head mb-4"><span>Nova Terra</span></h6>
                      <h2 class="ttl_home"><?php echo $_SESSION['user_name']?> </h2>
                      <p class="my_paragraph mt-3">Vas a cambiar tu contraseña</p>
                    </div>
                </div>
            </div>
        </div>
    </section> 

    <section class='wrapper__in_section'>
        <form method="post" action="" name="signin-form" class='box_form box_shaddow'>
            <div class="row">
                <div class=" col-md-12 mb-2">
                    <label>Nueva contraseña</label>
                    <input class="form-control" type="password" name="new_password" required />
                </div>
                <div class='div_btns col-md-12'>
                    <button class='btn btn_secundary ' type="submit" name="cambiar" value="cambiar">Cambiar </button>
                    <p></p>
                    <p><a href="admin" class='btn btn-success mt-4'>Admin</a></p>
                </div>
            </div>      
        </form>
    </section>
