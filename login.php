<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <form class="registro" action="login.php" method="post">
    <legend>LOGIN</legend>
          Usuario:<input type="text" name="usuario" value=""><br><br>
          Contraseña:<input type="password" name="pass" value=""><br><br>
        </fieldset>
        <input type="submit" name="Iniciar sesion" value="Iniciar sesion">
      </form>
    <?php
    include 'seguridad/seguridad.php';
    $sesion=new Seguridad();
    //login contra la base de datos
    if (isset($_POST['usuario']) && isset($_POST['pass'])) {
        //incluimos el archivo de la bd y el de las sesiones
        include '\modelo\usuario.php';
        $usuario=new Usuario();
        //llamada a la funcion de login de la db
        $registrado=$usuario->LoginUsuario($_POST['usuario']);
        if ($registrado!=null) {
          //comprobación de la contraseña
          if ($registrado['pass']==sha1($_POST['pass'])) {
            //si el usuario es correcto, creamos la sesion.
            $sesion->addUsuario($registrado['usuario']);
            header ('Location:index.php');
          }else {
            echo "Las contraseñas no coinciden";
          }
        }else {
          echo "Usuario no encontrado";
        }
      }
    ?>
  </body>
</html>
