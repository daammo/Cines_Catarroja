<?php

require_once 'db.php';


class Comentarios extends db
{

  function __construct()
  {
    parent::__construct();
  }
function mostrarComentario($id){
      //Construimos la consulta
      $sql="SELECT comentarios.comentario, usuarios.nombre FROM comentarios INNER JOIN peliculas ON comentarios.id_pelicula=peliculas.id_pelicula INNER JOIN usuarios ON comentarios.id_usuario=usuarios.id WHERE peliculas.id_pelicula=".$id."";
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
    function insertarComentario($comentario,$usuario,$pelicula){
    $sql="INSERT INTO comentarios(id, comentario, id_usuario, id_pelicula) VALUES (NULL, '".$comentario."', ".$usuario.", ".$pelicula.")";
    //Realizamos la consulta
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //Recogemos la ultima reserva insertada
      $sql="SELECT * from comentarios ORDER BY id DESC";
      //Realizamos la consulta
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        //sacamos el resultado con un fetch_assoc
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
