<?php
    include_once "Model/Usuario.php";
    include_once "Model/ProductoDAO.php";
    include_once "config/DB.php";
    include_once "Utils/CalculadoraPrecios.php";
    include_once "Model/UserDAO.php";
    class userController{
    
        public function userPanel(){
            
            if(isset($_POST['usuario']) && $_POST['usuario'] != null){
                $usuarioRegistro = $_POST['usuario'];
                $usuarios = UserDAO::getUsuarioEspecifico($usuarioRegistro);
                if($usuarios == null){
                    UserDAO::nuevaUsuario($usuarioRegistro);
                    header('Location:'.url."?controller=user&action=IniciarSession");
                }else{
                    session_start();
                    $_SESSION['usuario'] = UserDAO::getUsuarioEspecifico($usuarioRegistro);
                    header('Location:'.url."?controller=user&action=controllerPanelUser");
                }
            }else{
                header('Location:'.url."?controller=user&action=IniciarSession");
            }
        
            
        }

        public function controllerPanelUser(){
            session_start();
            include_once "View/header.php";
            include_once "userPanel/userDetail.php";
            
        }

        public function IniciarSession(){
            session_start();
            include_once "View/header.php";
            include_once "userPanel/iniciarSession.php";
        }

        public function eliminarUsusario(){
            UserDAO::eliminarUsuario($_POST['cliente_id']);
            header('Location:'.url."?controller=user&action=IniciarSession");
        }
    }

?>

