<?php

    require_once 'utils/utils.php';

// Inicialización del array de errores y de variables de los campos
$fallos = [];
$nombre = '';
$apellido = '';
$email = '';
$sujeto = '';
$mensaje = '';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y limpiar los datos del formulario
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

require_once 'views/contact.views.php';
?>