<?php

    if(isset($_GET["controller"])){
        //If theres no sending controller redirect to home page

    }else{
        $Controlle_name = $_GET['controller'].'Controller';
        if(class_exists($Controlle_name)){
            echo "Realize a action about".$Controlle_name;

        }else{
            echo "Controller Name didnt exist";
        }
    }

?>