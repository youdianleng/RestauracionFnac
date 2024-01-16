<?php
//En ProductoDAO realiza todos los acciones relaciona con BBDD
include_once "config/DB.php";
class UserDAO{

    //Consultar

    //Buscar todos los usuarios de bbdd
    public static function getUsuarios(){
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM clientes");

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        $obj = "usuarios";
        //Guardar los resultados en un Array
        $listaUsuarios = [];
        while ($productoDB = $result->fetch_object($obj)){
            $listaUsuarios[] = $productoDB;
        }

        return $listaUsuarios;
    }


    //Buscar un usuario especificado segun el usuario y el contrasenya pasado
    public static function getUsuarioEspecifico($nombre){
        //Preparar la consulta select para buscar elementos en dicho BBDD
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT * FROM clientes where Mail = ?");
        $stmt->bind_param("s",$nombre);

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();
        $result = $result->fetch_object("usuarios");
        $con->close();

        return $result;
    }

    //Buscar un usuario especificado segun el id asignada
    public static function getUsuarioEspecificoNombre($id){
        //Preparar la consulta select para buscar elementos en dicho BBDD
        $con = DataBase::connect();
        $stmt = $con->prepare("SELECT Permisos FROM clientes where Cliente_id = ?");
        $stmt->bind_param("s",$id);

        //Ejecutar el select, guardar el resultado y cerrar el conecxion
        $stmt->execute();
        $result=$stmt->get_result();
        $result = $result->fetch_object("usuarios");
        $con->close();

        return $result;
    }

    //Añadir & Editar
    //Crear un nuevo usuario con los parametros pasados
    public static function nuevaUsuario($nombre,$apellido,$mail,$contrasenya, $permiso=1){
        $con = DataBase::connect();
        //Aqui realizar el insert de los datos a BBDD
        $stmt = mysqli_query($con,"INSERT INTO `clientes`(`Nombre`, `Apellido`, `Mail`, `Contrasenya`, `ImgUsuario`, `Permisos`) VALUES ('$nombre','$apellido','$mail','$contrasenya','','$permiso')");

        $con->close();
        //Redireccionar al enlace siguiente
        header("Location: ".url."?controller=user&action=IniciarSession");
    }

    //Cambiar el nombre y apellido de un usuario segun el Id pasado de usuario
    public static function editarUsuario($nombre,$apellido,$cliente_id){
        $con = DataBase::connect();

        //preparar un SQL para actualizar los datos de usuario
        $stmt = $con->prepare("UPDATE clientes SET Nombre = ?, Apellido = ? WHERE Cliente_id = ?");

        //Asignar el tipo de los variables
        $stmt->bind_param("ssi",$nombre,$apellido,$cliente_id);

        $stmt->execute();

        //Guardar el resutado en un variable
        $result = $stmt->get_result();
        $con->close();

        //Retornar el resultado
        return $result;
    }



    //Eliminar
    //Eliminar el usuario segun el id que nos pasa
    public static function eliminarUsuario($cliente_id){
        $con = DataBase::connect();
        //preparar un SQL para eliminar los datos de usuario
        $stmt = $con->prepare("DELETE FROM clientes Where Cliente_id = ?");

        //Asignar el tipo de los variables
        $stmt->bind_param("i",$cliente_id);

        $stmt->execute();
        
        //Guardar el resutado en un variable
        $result = $stmt->get_result();
        $con->close();

        //Retornar el resultado
        return $result;
    }
}

