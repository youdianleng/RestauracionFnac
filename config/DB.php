<?php

class DataBase{
    public static function connect($host="localhost",$user="root",$pass="1",$db="fnacrestauracion"){
        $con = new mysqli($host,$user,$pass,$db);

        if($con == false){
            die("DATABASE ERROR");
        }else{
            return $con;
        }
    }
}

?>