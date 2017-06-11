<?php

require_once 'db.php';


class Pelicula extends db
{

  function __construct()
  {
    parent::__construct();
  }

  function mostrarComentario(){
        //Construimos la consulta
        $sql="SELECT comentarios.comentario, usuarios.nombre FROM comentarios, peliculas, usuarios WHERE id_usuario=usuario.id AND comentario.id_pelicula=peliculas.id_pelicula";
        //Realizamos la consulta
        $resultado=$this->realizarConsulta($sql);
        if($resultado!=null){
          //Montamos la tabla de resultado
          $tabla=[];
          while($fila=$resultado->fetch_assoc()){
            $tabla[]=$fila;
          }
          return $tabla;
        }else{
          return null;
        }
      }

}

 ?>
