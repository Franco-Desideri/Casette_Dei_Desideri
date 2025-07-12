# Casette dei Desideri 

# Indice

1. [Informazioni](#informazioni)
1. [Funzionalità principali](#funzionalita-principali)
1. [Requisiti](#requisiti)
1. [Guida all' istallazione](#guida-all'istallazione)
1. [Amministratore](#amministratore)
1. [Team](#team)

## Informazioni

Casette dei Desideri è un progetto di Applicazioni Web realizzato per l’esame di "Programmazione Web" dell'Università dell'Aquila (Univaq - Italia).

Casette dei Desideri è una piattaforma gestionale pensata per supportare un imprenditore che possiede e gestisce più strutture ricettive. Utilizza PHP, Doctrine ORM e Smarty.

Questa applicazione è pensata come un progetto per apprendere come progettare applicazioni web, utilizzando i principi del Pattern MVC, e per mostrare il potenziale del nostro team nel campo dell’ingegneria.

## Funzionalità principali

L'applicazione web è pensata per rispondere alle esigenze di un soggetto locale che gestisce in prima persona più strutture ricettive di tipo Bed and Breakfast, nonché un punto vendita alimentare nel territorio. La centralizzazione dei servizi offerti in un’unica piattaforma permette al gestore di ottimizzare la visibilità delle proprie attività e semplificare la comunicazione con i clienti, offrendo un’esperienza integrata che va dalla prenotazione dell’alloggio fino alla gestione di esigenze quotidiane durante il soggiorno, come la spesa a domicilio.

![Agora Profilepage](libs/Smarty/immagini/AgoraProfile.png)

## Requisiti

Requisiti per l’installazione su server locale:

1. Installa xampp ([XAMPP Download](https://www.apachefriends.org/it/download.html)) sul tuo computer (incluso PHP)
1. Installa composer([Composer Download](https://getcomposer.org/download/)) sul tuo computer 

## Guida all'istallazione

1. Scarica il repository Git;
2. Sposta il repository nella cartella `htdocs/` di XAMPP e rinomina la cartella in '`Casette_Dei_Desideri`'

3. Ora è necessario installare [Doctrine ORM](https://www.doctrine-project.org/), Per farlo, apri il terminale nella cartella dell’applicazione (that will be in `xampp/htdocs/    Casette_Dei_Desideri`) e digita il comando `composer install` nel prompt dei comandi

4. Non è necessario modificare alcun file nella cartella 'vendor/'. Doctrine ORM è gia configurato correttamente per supportare le annotazioni. Assicurarsi solamente di aver già installato la libreria 'annotations'

5. Nell'applicazione puoi trovare la cartella `config`, in questa cartella si trova il file chiamato `config.php` e cambia i parametri in base alle tue impostazioni Xampp.

6. Per popolare il database con i dati iniziali, accedi a http://localhost/phpmyadmin, crea un nuovo database con lo stesso nome specificato nel file config.php, poi vai nella scheda Importa, seleziona il file casette_db.sql presente nella cartella database/ del progetto e clicca su Esegui;

7. Ora è tutto pronto apri il tuo browser e digita nella URL `localhost/Casette_Dei_Desideri`.

### Amministratore

Poiché nel nostro caso è previsto un unico amministratore, la sua gestione è stata implementata inserendolo all’interno della tabella degli utenti, assegnandogli un ruolo specifico impostato su admin.
L’approccio adottato prevede la registrazione dell’amministratore attraverso il normale processo di registrazione utente, seguita da una modifica manuale del campo ruolo direttamente nel database, al fine di abilitare l’accesso all’area riservata di amministrazione.

## Team

- [Franco-Desideri](https://github.com/Franco-Desideri)
- [JacLor03](https://github.com/JacLor03)
- [Marco-Mariani](https://github.com/Marco-Mariani)
