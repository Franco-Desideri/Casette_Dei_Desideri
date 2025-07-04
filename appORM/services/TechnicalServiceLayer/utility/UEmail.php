<?php

namespace App\services\TechnicalServiceLayer\utility;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Utility per inviare email in modo centralizzato
 */
class UEmail
{
    /**
     * Invia una email semplice usando PHPMailer e SMTP
     *
     * @param string $destinatario Indirizzo email del destinatario
     * @param string $oggetto Oggetto della mail
     * @param string $testo Corpo della mail (plain text)
     * @param string|null $mittente Mittente (facoltativo), altrimenti default
     * @return bool true se invio riuscito, false altrimenti
     */
    public static function invia(string $destinatario, string $oggetto, string $testo, ?string $mittente = null): bool
    {
        // Mittente di default se non specificato
        $mittente = $mittente ?? 'noreply@casette.local';

        // Crea istanza PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configurazione SMTP - modifica con i tuoi dati SMTP reali
            $mail->isSMTP();
            $mail->Host = $config['smtp_host'];
            $mail->SMTPAuth = true;
            $mail->Username = $config['smtp_username'];
            $mail->Password = $config['smtp_password'];
            $mail->SMTPSecure = $config['smtp_secure'];
            $mail->Port = $config['smtp_port'];

            // Mittente e destinatario
            $mail->setFrom($config['from_email'], $config['from_name']);
            $mail->addAddress($destinatario);

            // Contenuto
            $mail->isHTML(false); // testo semplice
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

