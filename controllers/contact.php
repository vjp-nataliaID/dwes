<?php

require_once 'utils/utils.php';
require_once 'entities/App.class.php';
require_once 'entities/Conection.class.php';
require_once 'entities/Contacto.class.php';
require_once 'repository/ContactoRepository.class.php';
require_once 'exceptions/AppException.class.php';
require_once 'exceptions/QueryException.class.php';
use proyecto\repository\ContactoRepository;
use proyecto\entities\Contacto;
use proyecto\exceptions\AppException;
use proyecto\exceptions\QueryException;
// Inicialización del array de errores y de variables de los campos
$fallos = [];
$nombre = '';
$apellido = '';
$email = '';
$sujeto = '';
$mensaje = '';


try {



    $contactoRepository = new ContactoRepository();
    
    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recoger y los datos del formulario
        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $apellido = htmlspecialchars(trim($_POST['apellido']));
        $email = htmlspecialchars(trim($_POST['email']));
        $sujeto = htmlspecialchars(trim($_POST['sujeto']));
        $mensaje = htmlspecialchars(trim($_POST['mensaje']));

        // Validación de los campos
        if (empty($nombre)) {
            $fallos[] = "Campo 'Nombre' es obligatorio.";
        }

        if (empty($email)) {
            $fallos[] = "Campo 'Email' es obligatorio.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $fallos[] = "El correo electrónico no es válido.";
        }

        if (empty($sujeto)) {
            $fallos[] = "Campo 'Sujeto' es obligatorio.";
        }

        // Si no hay errores, se muestra un mensaje de éxito
        if (empty($fallos)) {

            $contacto = new Contacto($nombre,$apellido,$sujeto,$email,$mensaje);
            $contactoRepository->save($contacto);
            $success_message = "Formulario enviado correctamente. Información recibida:<br>";
            $success_message .= "Nombre: $nombre<br>";
            $success_message .= "Apellido: $apellido<br>";
            $success_message .= "Email: $email<br>";
            $success_message .= "Sujeto: $sujeto<br>";
            $success_message .= "Mensaje: $mensaje";

            // Limpiar las variables para vaciar el formulario
            $nombre = $apellido = $email = $sujeto = $mensaje = '';
        }
    }
} catch (AppException $exception) {
    $exception->getMessage();
}catch(QueryException $exception){
    $exception->getMessage();
}


require_once 'views/contact.views.php';
