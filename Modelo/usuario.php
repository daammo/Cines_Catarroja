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

}

 ?>
