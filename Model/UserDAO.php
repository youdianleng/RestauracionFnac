<?php
//En ProductoDAO realiza todos los acciones relaciona con BBDD
include_once "config/DB.php";
class UserDAO{
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


    public static function nuevaUsuario($mail,$permiso=1){
        $con = DataBase::connect();

        $stmt = mysqli_query($con,"INSERT INTO `clientes`(`Nombre`, `Apellido`, `Mail`, `ImgUsuario`, `Permisos`) VALUES ('','','$mail','','$permiso')");

        $con->close();
        header("Location: ".url."?controller=user&action=IniciarSession");
    }

    public static function editarUsuario($nombre,$apellido,$usuarioImg,$cliente_id){
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE clientes SET Nombre = ?, Apellido = ?, ImgUsuario = ? WHERE Cliente_id = ?");
        $stmt->bind_param("sssi",$nombre,$apellido,$usuarioImg,$cliente_id);

        $stmt->execute();

        $result = $stmt->get_result();
        $con->close();

        return $result;
    }


    public static function eliminarUsuario($cliente_id){
        $con = DataBase::connect();
        $stmt = $con->prepare("DELETE FROM clientes Where Cliente_id = ?");
        $stmt->bind_param("i",$cliente_id);

        $stmt->execute();
        $result = $stmt->get_result();
        $con->close();

        return $result;
    }
}

