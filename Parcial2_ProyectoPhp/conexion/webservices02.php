<?php
    require("config.php");
    $datos = array();
    $accion = "";

    if(isset($_POST["accion"])){
        $accion = $_POST["accion"];
    }

   /* if($accion=="registrar"){
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        if(agregarContacto($nombre,$telefono)==1){
           $datos["estado"] = 1;
           $datos["resultado"] = "Datos Almacenados con exito"; 
        }else{
           $datos["estado"] = 0;
           $datos["resultado"] = "Error, no se pudo almacenar los datos"; 
        }   */
        
        if($accion == "registrar"){
         $nombre = $_POST["nombre"];
         $telefono = $_POST["telefono"];
         $genero = $_POST["genero"];  // Nuevo campo para el género
 
         if(agregarContacto($nombre, $telefono, $genero) == 1){
             $datos["estado"] = 1;
             $datos["resultado"] = "Datos Almacenados con éxito"; 
         }else{
             $datos["estado"] = 0;
             $datos["resultado"] = "Error, no se pudo almacenar los datos"; 
         }        
    }/*else if($accion=="listar_contactos"){
        $filtro = "";
        if(isset($_POST["filtro"])){
           $filtro = $_POST["filtro"]; 
        }
        
        $datos["estado"] = 1;
        $datos["resultado"] = listarContacto($filtro);
        
    }*/
    
    else if($accion == "listar_contactos"){
      $filtro = "";
      $genero = "";  // Nuevo campo para filtrar por género
      if(isset($_POST["filtro"])){
          $filtro = $_POST["filtro"]; 
      }
      if(isset($_POST["genero"])){
          $genero = $_POST["genero"]; 
      }
      
      $datos["estado"] = 1;
      $datos["resultado"] = listarContacto($filtro, $genero);  // Pasamos el género como parámetro
      
  }
    
    /*else if($accion=="modificar"){
        $id_contacto = $_POST["id_contacto"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        if(modificarContacto($id_contacto,$nombre,$telefono)==1){
           $datos["estado"] = 1;
           $datos["resultado"] = "Datos Modificados con exito"; 
        }else{
           $datos["estado"] = 0;
           $datos["resultado"] = "Error, no se pudo almacenar los datos"; 
        }*/
        else if($accion == "modificar"){
         $id_contacto = $_POST["id_contacto"];
         $nombre = $_POST["nombre"];
         $telefono = $_POST["telefono"];
         $genero = $_POST["genero"];  // Nuevo campo para el género
 
         if(modificarContacto($id_contacto, $nombre, $telefono, $genero) == 1){
             $datos["estado"] = 1;
             $datos["resultado"] = "Datos Modificados con éxito"; 
         }else{
             $datos["estado"] = 0;
             $datos["resultado"] = "Error, no se pudo modificar los datos"; 
         }
    }/*else if($accion=="eliminar"){
        $id_contacto = $_POST["id_contacto"];        
        if(eliminarContacto($id_contacto)==1){
           $datos["estado"] = 1;
           $datos["resultado"] = "Datos Eliminados con exito"; 
        }else{
           $datos["estado"] = 0;
           $datos["resultado"] = "Error, no se pudo almacenar los datos"; 
        }
    }*/
    else if($accion == "eliminar"){
      $id_contacto = $_POST["id_contacto"];        
      if(eliminarContacto($id_contacto) == 1){
          $datos["estado"] = 1;
          $datos["resultado"] = "Datos Eliminados con éxito"; 
      }else{
          $datos["estado"] = 0;
          $datos["resultado"] = "Error, no se pudo eliminar los datos"; 
      }
  }

    echo json_encode($datos);
?>