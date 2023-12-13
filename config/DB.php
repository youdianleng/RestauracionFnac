<?php

class DataBase{

    //realizar el conexion con el base de datos
    public static function connect($host="localhost",$user="root",$pass="",$db="fnacrestauracion"){
        $con = new mysqli($host,$user,$pass,$db);
        //En caso de que ha fallado el conexion devuelve un mensaje de error
        if($con == false){
            //Finaliza el proceso y muestra mensaje
            die("DATABASE ERROR");
        }else{
            //Devuelve el conexion
            return $con;
        }
    }
}

?>