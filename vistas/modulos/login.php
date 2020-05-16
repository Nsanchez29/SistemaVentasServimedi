<div id="fondo"></div>
<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="vistas/dist/css/stylelog.css">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
  <form method="post" class="login-form">
    <div class="login-logo">

    <img src="vistas/img/plantilla/logo2.png" class="img-responsive" style="padding:30px 0px 30px 0px">

  </div>
   
    <div class="txtb">
      <input type="text" class="form-control" name="ingUsuario" required>
      <span data-placeholder="Usuario"></span>
    </div>
    <div class="txtb">
      <input type="password" class="form-control" name="ingPassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Debe contener al menos ún numero, letra mayúscula y minúscula. Mínimo 6 caracteres.">
      <span data-placeholder="Contraseña"></span>
    </div>
    <button type="submit" class="logbtn" value="Iniciar sesión">
    <i class="ion ion-log-out"></i>
          Iniciar sesión
  </button>
    <?php
    $login = new ControladorUsuarios();
    $login -> ctrIngresoUsuario();
    ?>
  </form>
  <script type="text/javascript">
    $(".txtb input").on("focus",function(){
      $(this).addClass("focus");
    });
    $(".txtb input").on("blur",function(){
      if($(this).val() == "")
        $(this).removeClass("focus");
    });
  </script>
</body>