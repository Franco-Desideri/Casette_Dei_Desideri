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



  {include file="partials/footer.tpl" paginaCorrente="strutture"}  

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
    // 1) Prepara i dati PHP/Smarty in JS
    const intervalliDisponibili = [
      {foreach from=$intervalli item=i}
        {
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
  </script>
  
  <script src="/Casette_Dei_Desideri/public/assets/js/prenotazione.js"></script>
  <script>
    inizializzaPrenotazione();
  </script>





  </body>
</html>