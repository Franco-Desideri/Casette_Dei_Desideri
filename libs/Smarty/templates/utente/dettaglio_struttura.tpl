<!DOCTYPE html>
<html lang="it">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Casette Dei Desideri</title>

    <!-- Bootstrap core CSS -->
    <link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  </head>

<body>

  {include file="partials/appbar_template.tpl" paginaCorrente="strutture"}


  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>{$struttura->getTitolo()}</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-property section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          {if $foto|@count > 0}
            <div class="owl-carousel owl-banner">
              {foreach from=$foto item=f}
                {if isset($f->base64img)}
                  <div class="item">
                    <img src="{$f->base64img}" alt="foto" class="img-fluid">
                  </div>
                {/if}
              {/foreach}
            </div>
          {else}
            <p>Nessuna immagine disponibile.</p>
          {/if}


          <!--Visualizzazione foto
          {if $foto|@count > 0}
              <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                  {foreach from=$foto item=f}
                      {if isset($f->base64img)}
                          <img src="{$f->base64img}" alt="foto">
                      {/if}
                  {/foreach}
              </div>
          {else}
              <p>Nessuna immagine disponibile.</p>
          {/if}-->


          <div class="main-content">
            <span class="category">{$struttura->getTitolo()}</span>
            <h4>{$struttura->getLuogo()}</h4>
            <p>{$struttura->getDescrizione()}</p>
          </div> 


        </div>    
        <div class="col-lg-4">
          <div class="info-table">
                <!--tabella informativa-->
                <ul>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/m2.png" alt="" style="max-width: 52px;">
                    <h4>m2<br><span>{$struttura->getM2()}</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/ospiti.png" alt="" style="max-width: 52px;">
                    <h4>Numero Ospiti<br><span>{$struttura->getNumOspiti()}</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/bagno.png" alt="" style="max-width: 52px;">
                    <h4>Numero Bagni<br><span>{$struttura->getNBagni()}</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/letto.png" alt="" style="max-width: 52px;">
                    <h4>Numero Letti<br><span>{$struttura->getNLetti()}</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/colazione.png" alt="" style="max-width: 52px;">
                    <h4>Colazione<br><span>{if $struttura->getColazione()}Sì{else}No{/if}</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/wifi.png" alt="" style="max-width: 52px;">
                    <h4>Wi-Fi<br><span>{if $struttura->getWifi()}Sì{else}No{/if}</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/balcone.png" alt="" style="max-width: 52px;">
                    <h4>Balcone<br><span>{if $struttura->getBalcone()}Sì{else}No{/if}</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/animali.png" alt="" style="max-width: 52px;">
                    <h4>Animali<br><span>{if $struttura->getAnimali()}Sì{else}No{/if}</span></h4>
                </li>
                <li>
                    <img src="/Casette_Dei_Desideri/public/assets/images/parcheggio.png" alt="" style="max-width: 52px;">
                    <h4>Parcheggio<br><span>{if $struttura->getParcheggio()}Sì{else}No{/if}</span></h4>
                </li>
                </ul>  
            </div>

        </div>
      </div>
    </div>
  </div>

  <!-- Sezione Prenotazione -->
  <div class="prenotazione-wrapper section">
    <div class="container">
      <hr class="my-5">
      <h3 class="mb-4">Prenota il tuo soggiorno</h3>

      <!-- FORM completo con method POST e action -->
      <form method="post" action="/Casette_Dei_Desideri/Prenotazione/calcola" class="prenotazione-form prenotazione-box">
        
        <!-- Campo nascosto per inviare l'ID della struttura -->
        <input type="hidden" name="idStruttura" value="{$struttura->getId()}">

        <div class="mb-3 input-with-icon">
          <label for="dataInizio" class="form-label">Data inizio</label>
            <input type="text" class="form-control" id="dataInizio" name="dataInizio" required readonly placeholder="gg/mm/aaaa">
        </div>


        <div class="mb-3">
          <label for="dataFine" class="form-label">Data fine</label>
            <input type="text" class="form-control" id="dataFine" name="dataFine" required readonly placeholder="gg/mm/aaaa">
        </div>

        <div class="mb-3">
          <label for="numOspiti" class="form-label">Numero ospiti (max {$struttura->getNumOspiti()})</label>
          <select class="form-select" id="numOspiti" name="numOspiti" required>
            {assign var="maxOspiti" value=$struttura->getNumOspiti()}
            {section name=i start=1 loop=$maxOspiti+1}
              <option value="{$smarty.section.i.index}">
                {$smarty.section.i.index}
              </option>
            {/section}
          </select>
        </div>

        <div class="d-flex justify-content-end mt-4">
          <button type="submit" class="btn prenota-btn">Procedi alla prenotazione</button>
        </div>
      </form>
    </div>
  </div>



  <footer class="footer-no-gap">
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2025 Casette Dei Desideri. 
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/counter.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/custom.js"></script>
  <!-- Flatpickr JS -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>




  <script>
    // 1) Prepara i tuoi dati PHP/Smarty in JS
    const intervalliDisponibili = [
      {foreach from=$intervalli item=i}
        { // Smarty copierà queste righe
          inizio: '{$i->getDataI()->format("Y-m-d")}',
          fine:   '{$i->getDataF()->format("Y-m-d")}'
        }{if !$i@last},{/if}
      {/foreach}
    ];

    const dateOccupate = [
      {foreach from=$prenotazioni item=p}
        {
          inizio: '{$p->getPeriodo()->getDataI()->format("Y-m-d")}',
          fine:   '{$p->getPeriodo()->getDataF()->format("Y-m-d")}'
        }{if !$p@last},{/if}
      {/foreach}
    ];

    // 2) Le tue funzioni di disponibilità
    function isInIntervallo(dateStr) {
      const d = new Date(dateStr);
      return intervalliDisponibili.some(i =>
        d >= new Date(i.inizio) && d <= new Date(i.fine)
      );
    }
    function isOccupata(dateStr) {
      const d = new Date(dateStr);
      return dateOccupate.some(p =>
        d >= new Date(p.inizio) && d <= new Date(p.fine)
      );
    }

    // 3) Funzione che Flatpickr userà per disabilitare le date
    function disableDates(date) {
      const ds = date.toISOString().slice(0,10); // "YYYY-MM-DD"
      return !isInIntervallo(ds) || isOccupata(ds);
    }

    // 4) Inizializzazione dei due datepickers
    const dataFinePicker = flatpickr("#dataFine", {
      dateFormat: "d-m-Y",
      minDate: "today",
      disable: [ disableDates ], //rende alcune date non selezionabili
      onDayCreate: function(dObj, dStr, fp, dayElem) {  //è chiamata per la creazione di ogni singolo giorno del calendario
        const dataInizioDate = flatpickr.parseDate(document.getElementById('dataInizio').value, "d-m-Y");
        if (dataInizioDate) {
          if (dayElem.dateObj.toDateString() === dataInizioDate.toDateString()) {
            dayElem.classList.add('highlight-day'); //se la data attuale di creazione del Cal. == dataInizio allora colora
          }
        }
      }
    });

    flatpickr("#dataInizio", {
      dateFormat: "d-m-Y",
      minDate: "today",
      disable: [ disableDates ],
      onChange: function(selectedDates, dateStr) {
        if (dateStr) {
          // non permettere a dataFine di essere precedente
          dataFinePicker.set('minDate', dateStr);
        }
      }
    });
  </script>


  <script>
    function isRangeContinuo(startStr, endStr) {
      const start = new Date(startStr);
      const end = new Date(endStr);

      for (let d = new Date(start); d <= end; d.setDate(d.getDate() + 1)) {
        const ds = d.toISOString().slice(0, 10);
        if (!isInIntervallo(ds) || isOccupata(ds)) {
          return false;
        }
      }
      return true;
    }

    document.querySelector('.prenotazione-form').addEventListener('submit', function(e) {
      const inputInizio = document.getElementById('dataInizio');
      const inputFine = document.getElementById('dataFine');

      const dataInizio = inputInizio._flatpickr.selectedDates[0];
      const dataFine = inputFine._flatpickr.selectedDates[0];

      // Controllo che entrambi i campi siano compilati
      if (!dataInizio || !dataFine) {
        alert("Devi selezionare sia la data di inizio che quella di fine.");
        e.preventDefault();
        return;
      }

      // Formatta le date nel formato YYYY-MM-DD
      const dataInizioStr = dataInizio.toISOString().slice(0, 10);
      const dataFineStr = dataFine.toISOString().slice(0, 10);

      // Controllo intervallo disponibile per inizio e fine
      if (!isInIntervallo(dataInizioStr) || isOccupata(dataInizioStr)) {
        alert("La data di inizio non è disponibile.");
        e.preventDefault();
        return;
      }

      if (!isInIntervallo(dataFineStr) || isOccupata(dataFineStr)) {
        alert("La data di fine non è disponibile.");
        e.preventDefault();
        return;
      }

      // Controllo che data fine sia dopo o uguale a data inizio
      if (dataFine < dataInizio) {
        alert("La data di fine deve essere uguale o successiva a quella di inizio.");
        e.preventDefault();
        return;
      }

      // ✅ NUOVO controllo: range continuo senza buchi
      if (!isRangeContinuo(dataInizioStr, dataFineStr)) {
        alert("L'intervallo selezionato contiene giorni non prenotabili.");
        e.preventDefault();
        return;
      }
    });
  </script>


  </body>
</html>