<?php

class DataBase{
    public static function connect($host="localhost",$user="root",$pass="1",$db="FnacRestauracion"){
        $con = new mysqli($host,$user,$pass,$db);

        if($con == false){
            die("DATABASE ERROR");
        }else{
            return $con;
        }
    }
}

?>