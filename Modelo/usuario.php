<?php

require_once 'db.php';


class Usuario extends db
{

  function __construct()
  {
    parent::__construct();
  }

  function insertarUsuario($nombre,$apellidos,$usuario,$email,$telefono,$dni,$edad,$pass){
      //Construimos la consulta
      $sql="INSERT INTO usuarios (id,nombre, apellidos, usuario, email, telefono, dni, edad, pass)
            VALUES (NULL, '".$nombre."', '".$apellidos."', '".$usuario."', '".$email."', ".$telefono.", '".$dni."' , ".$edad.", '".sha1($pass)."')";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        //Recogemos el ultimo usuario insertado
        $sql="SELECT * from usuarios ORDER BY id DESC";
        //Realizamos la consulta
        $resultado=$this->realizarConsulta($sql);
        if($resultado!=false){
          return $resultado->fetch_assoc();
        }else{
          return null;
        }
      }else{
        return null;
      }
    }
    function LoginUsuario($usuario){
    //Construimos la consulta
    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }
  function MiPerfil($usuario){
    //Construimos la consulta
    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      //Montamos la tabla de resultados
      $tabla=[];
      while($fila=$resultado->fetch_assoc()){
        $tabla[]=$fila;
      }
      return $tabla;
    }else{
      return null;
    }
  }

  public function ActualizarMiPerfil($usuario, $nombre, $apellidos, $email, $telefono, $dni, $direccion)
  {
    $sql="UPDATE usuarios SET nombre='" .$nombre ."', apellidos='" .$apellidos ."', email='" .$email ."', telefono=".$telefono.", dni='".$dni."', edad=".$edad." WHERE usuario='" .$usuario ."'";
    echo $sql;
    $actualizarperfil=$this->realizarConsulta($sql);
    if ($actualizarperfil=!false) {
      return true;
    }else {
      return false;
    }
  }

}

 ?>
