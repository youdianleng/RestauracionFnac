<?php
    include_once "Model/IngredienteDAO.php";
    class ingredienteController{
        
        
        public function añadirIngredientes(){
            if(isset($_POST['producto'])){
                var_dump($_POST['producto']);
            }
            
            if(isset($_POST['ingredienteSelect'])){
                foreach($_POST['ingredienteSelect'] as $ingred){
                    var_dump($ingred);
                }

            }
            
        }
        
        
    }

?>

