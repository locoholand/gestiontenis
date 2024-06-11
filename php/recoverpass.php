<?php
require_once 'main.php';

#Almacenando datos

$user_email = limpiar_cadena($_POST['user_email']);


# Verificar campos obligatorios

if (
    $user_email == ""
) {
    echo '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         No has llenado todos los campos que son obligatorios
        </div>';
    exit();
    # code...
};

#Verificando email
if ($user_email != "") {
    if (filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $check_email = conection();
        $check_email = $check_email->query("select email from users where email = '$user_email'");
        if ($check_email->rowCount() > 0) {

    
            if ($user) {
                // Generar un token seguro
                $token = bin2hex(random_bytes(16));
                $expires = date('U') + 1800; // El token expira en 30 minutos

                // Guardar el token en la base de datos
                $stmt = $pdo->prepare('INSERT INTO password_resets (user_id, token, expires) VALUES (?, ?, ?)');
                $stmt->execute([$user['id'], $token, $expires]);

                // Enviar el correo electrónico
                $reset_link = 'http://tu-sitio.com/reset_password.php?token=' . $token;
                $subject = 'Recuperar Contraseña';
                $message = "Haz clic en el siguiente enlace para restablecer tu contraseña: $reset_link";
                $headers = 'From: noreply@tu-sitio.com' . "\r\n" .
                       'Reply-To: noreply@tu-sitio.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                mail($email, $subject, $message, $headers);
                echo 'Correo de recuperación enviado';
        
    } else {
        echo
        '<div class="notification is-danger is-light">
         <strong>¡Ocurrio un error inesperado!</strong><br>
         Esa cuenta de correo no es valida!!!.
        </div>';
        exit();
    }
    $check_email = null;
}
 
    }}