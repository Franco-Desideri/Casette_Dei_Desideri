<?php

namespace App\services\TechnicalServiceLayer\utility;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UEmail
{
    public static function invia(string $destinatario, string $oggetto, string $testo, ?string $replyTo = null, ?string $replyToName = null): bool
    {
        // Carica configurazione SMTP (devi creare questo file a parte)
        $config = include(__DIR__ . '/../../config/email_config.php');

        // Mittente SMTP "generico" (il sistema)
        $fromEmail = $config['from_email'];
        $fromName = $config['from_name'];

        $mail = new PHPMailer(true);

        try {
            // Configurazione SMTP
            $mail->isSMTP();
            $mail->Host       = $config['smtp_host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $config['smtp_username'];
            $mail->Password   = $config['smtp_password'];
            $mail->SMTPSecure = $config['smtp_secure'];
            $mail->Port       = $config['smtp_port'];

            // Mittente generico
            $mail->setFrom($fromEmail, $fromName);

            // Destinatario
            $mail->addAddress($destinatario);

            // Mittente reale come "Reply-To" se fornito
            if ($replyTo) {
                $mail->addReplyTo($replyTo, $replyToName ?? $replyTo);
            }

            // Corpo del messaggio
            $mail->isHTML(false);
            $mail->Subject = $oggetto;
            $mail->Body    = $testo;

            $mail->send();
            return true;

        } catch (Exception $e) {
            error_log('Errore invio email: ' . $mail->ErrorInfo);
            return false;
        }
    }
}
