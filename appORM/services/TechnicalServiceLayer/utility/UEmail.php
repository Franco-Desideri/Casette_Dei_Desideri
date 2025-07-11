<?php

namespace App\services\TechnicalServiceLayer\utility;

// Importa la libreria PHPMailer per inviare email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Importa le entità necessarie
use App\models\EUtente;
use App\models\EOrdine;
use App\services\TechnicalServiceLayer\foundation\FPersistentManager;
use App\models\EProdottoQuantita;
use App\models\EProdottoPeso;
use App\models\EPrenotazione;

class UEmail
{
    /**
     * Metodo statico per inviare una mail.
     * @param array $mailData Array con dati della mail: 'Email', 'oggetto', 'contenuto'
     * @param string|null $replyTo Indirizzo a cui rispondere (facoltativo)
     * @param string|null $replyToName Nome del destinatario del reply (facoltativo)
     * @return bool true se invio riuscito, false altrimenti
     */
    public static function invia(array $mailData, ?string $replyTo = null, ?string $replyToName = null): bool
    {
        // Carica il file di configurazione SMTP (deve essere creato a parte)
        $config = include(__DIR__ . '/../../../../config/config_email.php');

        // Email mittente "generico" (ad esempio l'indirizzo del sistema)
        $fromEmail = $config['from_email'];
        $fromName = $config['from_name'];

        // Crea un'istanza di PHPMailer, con gestione delle eccezioni abilitata
        $mail = new PHPMailer(true);

        try {
            // Imposta l'invio tramite SMTP
            $mail->isSMTP();
            // Host SMTP (es. smtp.gmail.com)
            $mail->Host       = $config['smtp_host'];
            // Abilita autenticazione SMTP
            $mail->SMTPAuth   = true;
            // Username SMTP
            $mail->Username   = $config['smtp_username'];
            // Password SMTP
            $mail->Password   = $config['smtp_password'];
            // Metodo di sicurezza (es. tls, ssl)
            $mail->SMTPSecure = $config['smtp_secure'];
            // Porta SMTP (es. 587)
            $mail->Port       = $config['smtp_port'];

            // Estrae i dati della mail dall'array
            $destinatario = $mailData['Email'];  
            $oggetto = $mailData['oggetto'];    
            $testo = $mailData['contenuto'];

            // Imposta mittente
            $mail->setFrom($fromEmail, $fromName);

            // Imposta destinatario
            $mail->addAddress($destinatario);

            // Se specificato, imposta un indirizzo Reply-To
            if ($replyTo) {
                // Usa $replyToName se fornito, altrimenti usa $replyTo come nome
                $mail->addReplyTo($replyTo, $replyToName ?? $replyTo);
            }

            // Il corpo della mail non è in HTML (testo semplice)
            $mail->isHTML(false);
            // Imposta oggetto della mail
            $mail->Subject = $oggetto;
            // Imposta testo della mail
            $mail->Body    = $testo;

            // Prova a inviare la mail
            $mail->send();
            return true;  // Ritorna true se invio ok

        } catch (Exception $e) {
            // In caso di errore logga il messaggio e ritorna false
            error_log('Errore invio email: ' . $mail->ErrorInfo);
            return false;
        }
    }

    /**
     * Costruisce i dati per la mail di notifica ordine da inviare all'amministratore.
     * @param EUtente $utente Cliente che ha fatto l'ordine
     * @param EOrdine $ordine Oggetto ordine con dettagli
     * @param array $ordineData Array con i dati dei prodotti ordinati
     * @return array Array con 'Email', 'oggetto' e 'contenuto' per la mail
     */
    public static function email_ordine(EUtente $utente, EOrdine $ordine, array $ordineData): array
    {
        // Ottiene l'utente amministratore (metodo statico)
        $admin = EUtente::getAdmin();

        // Se non trova admin logga errore e ritorna array vuoto
        if (!$admin) {
            error_log("Errore: nessun amministratore trovato per inviare la mail.");
            return [];
        }

        // Email amministratore
        $adminEmail = $admin->getEmail();

        // Costruisce il corpo della mail con dettagli ordine e cliente
        $contenuto = "Hai ricevuto un nuovo ordine!\n\n";
        $contenuto .= "Cliente: " . $utente->getNome() . " " . $utente->getCognome() . "\n";
        $contenuto .= "Email cliente: " . $utente->getEmail() . "\n";
        $contenuto .= "Fascia oraria di consegna: " . $ordine->getFasciaOraria() . "\n";
        $contenuto .= "Importo totale: " . number_format($ordine->getPrezzo(), 2) . " €\n";
        $contenuto .= "Taglio di banconota fornito: " . number_format($ordine->getContanti(), 2) . " €\n\n";
        $contenuto .= "Prodotti ordinati:\n";

        // Cicla sui prodotti ordinati
        foreach ($ordineData['prodotti'] as $itemData) {
            // Se il tipo è quantità, cerca prodotto come EProdottoQuantita
            if ($itemData['tipo'] === 'quantita') {
                $prodotto = FPersistentManager::get()->find(EProdottoQuantita::class, $itemData['prodotto_id']);
            } else {
                // Altrimenti come EProdottoPeso
                $prodotto = FPersistentManager::get()->find(EProdottoPeso::class, $itemData['prodotto_id']);
            }

            // Prende nome prodotto e quantità ordinata
            $nome = $prodotto->getNome();
            $qta = $itemData['quantita'];

            // Aggiunge una riga al contenuto con nome e quantità
            $contenuto .= "- {$nome} x{$qta}\n";
        }

        // Costruisce l'oggetto della mail
        $oggetto = "Nuovo ordine da " . $utente->getNome() . " " . $utente->getCognome();

        // Ritorna un array con i dati della mail pronta da inviare
        return [
            'Email' => $adminEmail,
            'oggetto' => $oggetto,
            'contenuto' => $contenuto,
        ];
    }

    /**
     * Costruisce i dati per la mail di notifica nuova prenotazione da inviare all'amministratore.
     * @param EUtente $utente Cliente che ha effettuato la prenotazione
     * @param EPrenotazione $prenotazione Oggetto prenotazione
     * @return array Dati per la mail (Email, oggetto, contenuto)
     */
    public static function email_prenotazione_admin(EUtente $utente, EPrenotazione $prenotazione): array
    {
        // Ottiene amministratore
        $admin = EUtente::getAdmin();

        // Se non esiste admin logga errore e ritorna array vuoto
        if (!$admin) {
            error_log("Errore: nessun amministratore trovato per inviare la mail.");
            return [];
        }

        // Email admin
        $adminEmail = $admin->getEmail();

        // Costruzione contenuto mail con dettagli prenotazione
        $contenutoAD = "Hai ricevuto un nuova prenotazione!\n\n";
        $contenutoAD .= "Cliente: " . $utente->getNome() . " " . $utente->getCognome() . "\n";
        $contenutoAD .= "Email cliente: " . $utente->getEmail() . "\n";
        $contenutoAD .= "Data di inizio prenotazione: " . $prenotazione->getPeriodo()->getDataI()->format('d/m/Y') . "\n";
        $contenutoAD .= "Data di fine prenotazione: " . $prenotazione->getPeriodo()->getDataF()->format('d/m/Y') . "\n";
        $contenutoAD .= "Numero Ospiti: " . $prenotazione->getOspiti() . "\n";
        $contenutoAD .= "Importo totale: " . number_format($prenotazione->getPrezzo(), 2) . " €\n";

        // Aggiunge info sulla struttura prenotata
        $contenutoAD .= "Struttura prenotata:" . $prenotazione->getStruttura()->getTitolo() . "\n";

        // Oggetto mail per admin
        $oggettoAD = "Nuova prenotazione da " . $utente->getNome() . " " . $utente->getCognome();

        // Ritorna array dati mail
        return [
            'Email' => $adminEmail,
            'oggetto' => $oggettoAD,
            'contenuto' => $contenutoAD,
        ];
    }

    /**
     * Costruisce i dati per la mail di conferma prenotazione da inviare al cliente.
     * @param EUtente $utente Cliente che ha effettuato la prenotazione
     * @param EPrenotazione $prenotazione Oggetto prenotazione
     * @return array Dati per la mail (Email, oggetto, contenuto)
     */
    public static function email_prenotazione_utente(EUtente $utente, EPrenotazione $prenotazione): array
    {
        // Email del cliente
        $utenteEmail = $utente->getEmail();

        // Costruisce contenuto mail conferma prenotazione per cliente
        $contenutoU = "La tua prenotazione è avvenuta con successo!\n\n";
        $contenutoU .= "Cliente: " . $utente->getNome() . " " . $utente->getCognome() . "\n";
        $contenutoU .= "Data di inizio prenotazione: " . $prenotazione->getPeriodo()->getDataI()->format('d/m/Y') . "\n";
        $contenutoU .= "Data di fine prenotazione: " . $prenotazione->getPeriodo()->getDataF()->format('d/m/Y') . "\n";
        $contenutoU .= "Numero Ospiti: " . $prenotazione->getOspiti() . "\n";
        $contenutoU .= "Importo totale: " . number_format($prenotazione->getPrezzo(), 2) . " €\n";

        // Aggiunge info sulla struttura prenotata
        $contenutoU .= "Struttura prenotata:" . $prenotazione->getStruttura()->getTitolo() . "\n";

        // Oggetto mail per cliente
        $oggettoU = "Prenotazione confermata";

        // Ritorna array dati mail
        return [
            'Email' => $utenteEmail,
            'oggetto' => $oggettoU,
            'contenuto' => $contenutoU,
        ];
    }
}
