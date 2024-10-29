<?php
    $fallos=[];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $apellido = htmlspecialchars(trim($_POST['apellido']));
        $email = htmlspecialchars(trim($_POST['email']));
        $sujeto = htmlspecialchars(trim($_POST['sujeto']));
        $mensaje = htmlspecialchars(trim($_POST['mensaje']));

        if(!empty($nombre)&&!empty($email)&&!empty($sujeto)){


            if((filter_var($email,FILTER_VALIDATE_EMAIL)) == false){
                array_push($fallos,"email No valido");
            }
        }elseif(empty($nombre)) {
            array_push($fallos,"Campo nombre requerido");
        }elseif(empty($sujeto)){
            array_push($fallos,"Campo sujeto requerido");
        }elseif(empty($email)){
            array_push($fallos,"Campo email requerido");
        }

    }
    require 'utils/utils.php';
    require 'views/contact.views.php';
    
?>