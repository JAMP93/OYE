<?php
  function login($conexion, $email, $pass, $recu){
    $conexion = ConectarBD();
    mysqli_set_charset($conexion,'UTF8');

    $instancia = "SELECT * FROM usuario WHERE email = '".$email."' AND contrasena = '".$pass."'";
    $resul = mysqli_query($conexion, $instancia);
    $instancia2 = "SELECT * FROM operario WHERE email = '".$email."' AND contrasena = '".$pass."'";
    $resul2 = mysqli_query($conexion, $instancia2);

    $num_campos = mysqli_num_rows($resul);
    $num_campos2 = mysqli_num_rows($resul2);

    if (!isset($_SESSION)) {
      session_start();
    }

    $fila = mysqli_fetch_array($resul, MYSQLI_ASSOC);
    $id_usu = $fila["id"];

    $fila2 = mysqli_fetch_array($resul2, MYSQLI_ASSOC);
    $id_ope = $fila2["id"];

    if ($num_campos != 0) {
      if($id_usu == 0){
        if ($recu == 0) {
            $_SESSION["sesion_ok"] = true;
            $_SESSION["id_usu"] = $fila["id"];
            $_SESSION["usu_usu"] = $fila["usuario"];
            $_SESSION["nom_usu"] = $fila["nombre"];
            $datos = session_encode();
            setcookie('maria', $datos, time()*0, '/');
            echo "<div class='alert alert-cargar' role='alert'><i class=\"fa fa-circle-o-notch fa-spin fa-4x fa-fw\"></i><span>O!</span></div>";
            echo "<meta http-equiv='REFRESH' content='2;URL=administrador/inicio.php'>";
        }else{
            $_SESSION["sesion_ok"] = true;
            $_SESSION["id_usu"] = $fila["id"];
            $_SESSION["usu_usu"] = $fila["usuario"];
            $_SESSION["nom_usu"] = $fila["nombre"];
            $datos = session_encode();
            setcookie('maria', $datos, time()+86400*365, '/');
            echo "<div class='alert alert-cargar' role='alert'><i class=\"fa fa-circle-o-notch fa-spin fa-4x fa-fw\"></i></i><span>O!</span></div>";
            echo "<meta http-equiv='REFRESH' content='2;URL=administrador/inicio.php'>";
        }
      }else{
        if ($recu == 0) {
          echo "soy usuario";
          $_SESSION["sesion_ok"] = true;
          $_SESSION["id_usu"] = $fila["id"];
          $_SESSION["usu_usu"] = $fila["usuario"];
          $_SESSION["nom_usu"] = $fila["nombre"];
          $datos = session_encode();
          setcookie('maria', $datos, time()*0, '/');
          echo "<div class='alert alert-cargar' role='alert'><i class=\"fa fa-circle-o-notch fa-spin fa-4x fa-fw\"></i></i><span>O!</span></div>";
          echo "<meta http-equiv='REFRESH' content='2;URL=usuarios/inicio.php'>";
        }elseif ($recu == 'si') {
          $_SESSION["sesion_ok"] = true;
          $_SESSION["id_usu"] = $fila["id"];
          $_SESSION["usu_usu"] = $fila["usuario"];
          $_SESSION["nom_usu"] = $fila["nombre"];
          $datos = session_encode();
          setcookie('maria', $datos, time()+86400*365, '/');
          echo "<div class='alert alert-cargar' role='alert'><i class=\"fa fa-circle-o-notch fa-spin fa-4x fa-fw\"></i></i><span>O!</span></div>";
          echo "<meta http-equiv='REFRESH' content='2;URL=usuarios/inicio.php'>";
        }
      }
    }else{
      if ($num_campos2 == 0) {
        echo "<div class='alert alert-danger' role='alert'>El <b>Correo Electrónico</b> o la <b>Contraseña</b> introducidos no son correctos</div>";
      }elseif ($recu == 0) {
        echo "Soy trabajador";
        $_SESSION["sesion_ok"] = true;
        $_SESSION["id_ope"] = $fila2["id"];
        $_SESSION["usu_ope"] = $fila2["usuario"];
        $_SESSION["nom_ope"] = $fila2["nombre"];
        $datos = session_encode();
        setcookie('maria', $datos, time()*0, '/');
        echo "<div class='alert alert-cargar' role='alert'><i class=\"fa fa-circle-o-notch fa-spin fa-4x fa-fw\"></i></i><span>O!</span></div>";
        echo "<meta http-equiv='REFRESH' content='2;URL=trabajores/inicio.php'>";
      }else{
        $_SESSION["sesion_ok"] = true;
        $_SESSION["id_usu"] = $fila2["id"];
        $_SESSION["usu_ope"] = $fila2["usuario"];
        $_SESSION["nom_ope"] = $fila2["nombre"];
        $datos = session_encode();
        setcookie('maria', $datos, time()+86400*365, '/');
        echo "<div class='alert alert-cargar' role='alert'><i class=\"fa fa-circle-o-notch fa-spin fa-4x fa-fw\"></i></i><span>O!</span></div>";
        echo "<meta http-equiv='REFRESH' content='2;URL=trabajadores/inicio.php'>";
      }
    }
  }
?>