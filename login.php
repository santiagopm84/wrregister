<?php
include 'config.php';
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = $connection->prepare("SELECT * FROM usuarios WHERE USERNAME=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
 
    $result = $query->fetch(PDO::FETCH_ASSOC);
 
    if (!$result) {
        echo '<p class="error">*Username password combination is wrong!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['usuario_id'];
            $_SESSION['user_name'] = $result['username'];
            //echo '<p class="success">Congratulations, you are logged in!</p>';
            header('Location: admin');
            exit;
        } else {
            echo '<p class="error">**Username password combination is wrong!</p>';
        }
    }
}
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
        <div class="row">
        <div class="col-md-12">
            <div class="sec_head_page_info">
              <h6 class="ttls_minimum in_head mb-4"><span>Nova Terra</span></h6>
              <h3 class="ttl_home">Iniciar sesión</h3>
              <p class="my_paragraph mt-3">
                Bienvenido a Nova Terra
              </p>
            </div>
        </div>
        </div>
    </div>
</section> 

<section class='wrapper__in_section'>
  <form method="post" action="" name="signin-form" class='box_form box_shaddow'>
    <div class="row">
      <div class=" col-md-12 mb-2">
        <label>Username</label>
        <input class="form-control" type="text" name="username" pattern="[a-zA-Z0-9]+" required />
      </div>
     
      <div class=" col-md-12 mb-2">
        <label for="name" class="form-label">Contraseña</label>
        <input class="form-control" type="password" name="password" required />
      </div>
     

      <div class='div_btns col-md-12'>
      <button class='btn btn_secundary ' type="submit" name="login" value="login">Iniciar sesión</button>
      <p></p>
      <p><a href="recupera" class='btn btn-warning mt-4'>Olvidé mi contraseña</a></p>
      </div>
    </div>
  </form>
  
    
</section>