<?php

namespace App\services\TechnicalServiceLayer\utility;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\models\EUtente;
use App\models\EOrdine;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\models\EProdottoQuantita;
use App\models\EProdottoPeso;
use App\models\EPrenotazione;

class UEmail
{
    public static function invia(array $mailData, ?string $replyTo = null, ?string $replyToName = null): bool
    {
        // Carica configurazione SMTP (devi creare questo file a parte)
        $config = include(__DIR__ . '/../../../../config/config_email.php');


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

            $destinatario = $mailData['Email'];  
            $oggetto = $mailData['oggetto'];    
            $testo = $mailData['contenuto'];

            // Mittente generico
            $mail->setFrom($fromEmail, $fromName);

            // Destinatario
            $mail->addAddress($destinatario);

            // Mittente reale come "Reply-To" 
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

    public static function email_ordine(EUtente $utente, EOrdine $ordine, array $ordineData): array
    {
            $admin = EUtente::getAdmin();

            if (!$admin) {
                error_log("Errore: nessun amministratore trovato per inviare la mail.");
                return [];
            }

            $adminEmail = $admin->getEmail();

        // Costruzione contenuto email
        $contenuto = "Hai ricevuto un nuovo ordine!\n\n";
        $contenuto .= "Cliente: " . $utente->getNome() . " " . $utente->getCognome() . "\n";
        $contenuto .= "Email cliente: " . $utente->getEmail() . "\n";
        $contenuto .= "Fascia oraria di consegna: " . $ordine->getFasciaOraria() . "\n";
        $contenuto .= "Importo totale: " . number_format($ordine->getPrezzo(), 2) . " €\n";
        $contenuto .= "Taglio di banconota fornito: " . number_format($ordine->getContanti(), 2) . " €\n\n";
        $contenuto .= "Prodotti ordinati:\n";

        foreach ($ordineData['prodotti'] as $itemData) {
            if ($itemData['tipo'] === 'quantita') {
                $prodotto = FPersistentManager::get()->find(EProdottoQuantita::class, $itemData['prodotto_id']);
            } else {
                $prodotto = FPersistentManager::get()->find(EProdottoPeso::class, $itemData['prodotto_id']);
            }

            $nome = $prodotto->getNome();
            $qta = $itemData['quantita'];
            $contenuto .= "- {$nome} x{$qta}\n";
        }

        $oggetto = "Nuovo ordine da " . $utente->getNome() . " " . $utente->getCognome();

        // Ritorna i dati come array
        return [
            'Email' => $adminEmail,
            'oggetto' => $oggetto,
            'contenuto' => $contenuto,
        ];
    }

    public static function email_prenotazione_admin(EUtente $utente, EPrenotazione $prenotazione):array
    {
        $admin = EUtente::getAdmin();

        if (!$admin) {
            error_log("Errore: nessun amministratore trovato per inviare la mail.");
            return [];
        }

        $adminEmail = $admin->getEmail();


        // Costruzione contenuto email
        $contenutoAD = "Hai ricevuto un nuova prenotazione!\n\n";
        $contenutoAD .= "Cliente: " . $utente->getNome() . " " . $utente->getCognome() . "\n";
        $contenutoAD .= "Email cliente: " . $utente->getEmail() . "\n";
        $contenutoAD .= "Data di inizio prenotazione: " . $prenotazione->getPeriodo()->getDataI()->format('d/m/Y') . "\n";
        $contenutoAD .= "Data di fine prenotazione: " . $prenotazione->getPeriodo()->getDataF()->format('d/m/Y') . "\n";
        $contenutoAD .= "Numero Ospiti: " . $prenotazione->getOspiti() . "\n";
        $contenutoAD .= "Importo totale: " . number_format($prenotazione->getPrezzo(), 2) . " €\n";

        $contenutoAD .= "Struttura prenotata:" . $prenotazione->getStruttura()->getTitolo() . "\n";

        $oggettoAD = "Nuova prenotazione da " . $utente->getNome() . " " . $utente->getCognome();

        return [
            'Email' => $adminEmail,
            'oggetto' => $oggettoAD,
            'contenuto' => $contenutoAD,
        ];



    }

    public static function email_prenotazione_utente(EUtente $utente, EPrenotazione $prenotazione):array
    {
        $utenteEmail = $utente ->getEmail();

        $contenutoU = "La tua prenotazione è avvenuta con successo!\n\n";
        $contenutoU .= "Cliente: " . $utente->getNome() . " " . $utente->getCognome() . "\n";
        $contenutoU .= "Data di inizio prenotazione: " . $prenotazione->getPeriodo()->getDataI()->format('d/m/Y') . "\n";
        $contenutoU .= "Data di fine prenotazione: " . $prenotazione->getPeriodo()->getDataF()->format('d/m/Y') . "\n";
        $contenutoU .= "Numero Ospiti: " . $prenotazione->getOspiti() . "\n";
        $contenutoU .= "Importo totale: " . number_format($prenotazione->getPrezzo(), 2) . " €\n";

        $contenutoU .= "Struttura prenotata:" . $prenotazione->getStruttura()->getTitolo() . "\n";
        $oggettoU = "Prenotazione confermata " ;

        return [
            'Email' => $utenteEmail,
            'oggetto' => $oggettoU,
            'contenuto' => $contenutoU,
        ];

    }

}


