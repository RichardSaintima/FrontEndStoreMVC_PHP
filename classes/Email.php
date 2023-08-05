<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;
    
    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {


        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
    
        $mail->setFrom('cuentas@devwebcamp.com');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Confirma tu Cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
                
        $contenido = '<!DOCTYPE html>';
        $contenido .= '<html lang="en">';
        $contenido .= '<head>';
        $contenido .= '<meta charset="UTF-8">';
        $contenido .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
        $contenido .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        $contenido .= '<title>Correo Electrónico de Prueba</title>';
        $contenido .= '<style>';
        $contenido .= 'body {';
        $contenido .= 'font-family: Arial, sans-serif;';
        $contenido .= 'background-color: #f4c2ec;';
        $contenido .= 'margin: 0;';
        $contenido .= 'padding: 20px;';
        $contenido .= '}';
        $contenido .= 'h1 {';
        $contenido .= 'color: #720489;';
        $contenido .= '}';
        $contenido .= 'p {';
        $contenido .= 'margin-bottom: 12px;';
        $contenido .= '}';
        $contenido .= 'a {';
        $contenido .= 'color: #a72fed;';
        $contenido .= 'text-decoration: none;';
        $contenido .= '}';
        $contenido .= '.contenedor-preuba {';
        $contenido .= 'max-width: 95%;';
        $contenido .= 'margin: 0 auto;';
        $contenido .= 'text-align: center;';
        $contenido .= '}';
        $contenido .= 'a:hover {';
        $contenido .= 'text-decoration: underline;';
        $contenido .= '}';
        $contenido .= '</style>';
        $contenido .= '</head>';
        $contenido .= '<body class="contenedor_preuba">';
        $contenido .= '<h1>Correo Electrónico de Prueba</h1>';
        $contenido .= '<div class="contenedor-preuba">';
        $contenido .= '<p style="font-size: clamp(3rem, -0.8rem + 10vw ,5rem); color: #a72fed; margin-top: 1.6rem;">FrondEnd Store</p></div>';
        $contenido .= '<p><strong>Hola ' . $this->nombre .  '</strong> Has Registrado Correctamente tu cuenta en FrondEnd Store pero es necesario confirmarla</p>';
        $contenido .= '<p>Presiona aquí: <a href="' . $_ENV['HOST'] . '/confirmar-cuenta?token=' . $this->token . '">Confirmar Cuenta</a></p>';
        $contenido .= '<p>Si tú no creaste esta cuenta, puedes ignorar el mensaje.</p>';
        $contenido .= '</body>';
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }

    public function enviarInstrucciones() {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
    
        $mail->setFrom('cuentas@devwebcamp.com');
        $mail->addAddress($this->email, $this->nombre);
        $mail->Subject = 'Reestablece tu password';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';


        $contenido = '<!DOCTYPE html>';
        $contenido .= '<html lang="en">';
        $contenido .= '<head>';
        $contenido .= '<meta charset="UTF-8">';
        $contenido .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
        $contenido .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        $contenido .= '<title>Correo Electrónico de Prueba</title>';
        $contenido .= '<style>';
        $contenido .= 'body {';
        $contenido .= 'font-family: Arial, sans-serif;';
        $contenido .= 'background-color: #f4c2ec;';
        $contenido .= 'margin: 0;';
        $contenido .= 'padding: 20px;';
        $contenido .= '}';
        $contenido .= 'h1 {';
        $contenido .= 'color: #720489;';
        $contenido .= '}';
        $contenido .= 'p {';
        $contenido .= 'margin-bottom: 12px;';
        $contenido .= '}';
        $contenido .= 'a {';
        $contenido .= 'color: #a72fed;';
        $contenido .= 'text-decoration: none;';
        $contenido .= '}';
        $contenido .= '.contenedor-preuba {';
        $contenido .= 'max-width: 95%;';
        $contenido .= 'margin: 0 auto;';
        $contenido .= 'text-align: center;';
        $contenido .= '}';
        $contenido .= 'a:hover {';
        $contenido .= 'text-decoration: underline;';
        $contenido .= '}';
        $contenido .= '</style>';
        $contenido .= '</head>';
        $contenido .= '<body class="contenedor_preuba">';
        $contenido .= '<h1>Correo Electrónico de Prueba</h1>';
        $contenido .= '<div class="contenedor-preuba">';
        $contenido .= '<img loading="lazy" width="100" height="100"  src="build/img/logo.png" alt="Imagen FrondEnd Store"></div>';
        $contenido .= '<p><strong>Hola ' . $this->nombre .  '</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>';
        $contenido .= '<p>Presiona aquí: <a href="' . $_ENV['HOST'] . '/recuperar?token=' . $this->token . '">Reestablecer Password</a></p>';
        $contenido .= '<p>Si tú no solicitaste este cambio, puedes ignorar el mensaje.</p>';
        $contenido .= '</body>';
        $contenido .= '</html>';
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}
