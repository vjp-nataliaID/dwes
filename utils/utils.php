<?php
    function esOpcionMenuActiva(string $opcionMenu):bool{
        if($_SERVER['REQUEST_URI']== $opcionMenu){
            return true;
        }else{
            return false;
        }
    }

    function existeOpcionMenuActivaEnArray(array $opcion):bool{
        foreach ($opcion as $value) {
            if(esOpcionMenuActiva($value)){
                return true;
            }else{
                return false;
            }
            
        }
    }

?>