<?php

    if(isset($_GET["controller"])){
        echo 'Want realize a accion about '.$_GET["controller"];
        if(isset($_GET["actopm"])){
            echo 'About '.$_GET["controller"].' want to make this '.$_GET["action"];
        }else{
            echo "you didnt send me controller";
        }
    }

?>