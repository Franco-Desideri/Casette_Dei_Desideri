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
          <span class="breadcrumb"><a href="#">Home</a>  /  Prenotazione</span>
          <h3>inserisci i dati della prenotazione</h3>
        </div>
      </div>
    </div>
  </div>

<div class="single-property section pt-4">
  <div class="container-fluid px-5">
    <div class="row justify-content-center">
     <div class="col-12" style="padding-left: 80px; padding-right: 80px;">

        <div class="card-box">
          <!-- Titolo principale -->
          <h1 class="title">
            Prenotazione per: <span style="color: #28a745;">{$struttura->getTitolo()}</span>
          </h1>

          <!-- Dati della prenotazione -->
          <p class="info">
            <i class="fa fa-calendar" style="font-size: 1.8rem; color: #1e90ff; margin-right: 22px;"></i>
            <strong>Periodo:</strong>&nbsp;{$smarty.session.prenotazione_temp.data_inizio} → {$smarty.session.prenotazione_temp.data_fine}
          </p>

          <p class="info">
            <i class="fa-solid fa-coins" style="font-size: 1.8rem; color: #28a745; margin-right: 12px;"></i>
            <strong>Prezzo Totale:</strong>&nbsp;€ {$smarty.session.prenotazione_temp.totale}
          </p>
        </div>

      </div>
    </div>
  </div>
</div>


<hr class="my-5">

<div class="container-fluid px-5">
  <div class="row justify-content-center">
    <div class="col-12" style="padding-left: 80px; padding-right: 80px;">
      
      <form method="post" action="/Casette_Dei_Desideri/Prenotazione/riepilogoCompleto" enctype="multipart/form-data">

        <h3 class="mb-4" style="font-weight: 700; font-size: 2rem;">DATI DEGLI OSPITI:</h3>
        {section name=ospite loop=$smarty.session.prenotazione_temp.num_ospiti}

          <div class="card mb-4 rounded" style="background-color: #f8f9fa; border: 1px solid #ddd; padding: 20px; width: 100%;">
          <h4 class="ospite-title mb-4">
            Ospite {$smarty.section.ospite.index+1}
          </h4>
          
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="nome_{$smarty.section.ospite.index}">Nome:</label>
              <input type="text" id="nome_{$smarty.section.ospite.index}" name="ospiti[{$smarty.section.ospite.index}][nome]" class="form-control" required placeholder="nome">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="cognome_{$smarty.section.ospite.index}">Cognome:</label>
              <input type="text" id="cognome_{$smarty.section.ospite.index}" name="ospiti[{$smarty.section.ospite.index}][cognome]" class="form-control" required placeholder="cognome">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="documento_{$smarty.section.ospite.index}">Documento (PDF o immagine):</label>
              <input type="file" id="documento_{$smarty.section.ospite.index}" name="ospiti[{$smarty.section.ospite.index}][documento]" accept=".pdf,image/*" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="telefono_{$smarty.section.ospite.index}">Telefono:</label>
              <input type="tel" id="telefono_{$smarty.section.ospite.index}" name="ospiti[{$smarty.section.ospite.index}][tell]" class="form-control" required placeholder="numero di telefono">
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="codiceFiscale_{$smarty.section.ospite.index}">Codice Fiscale:</label>
              <input type="text" id="codiceFiscale_{$smarty.section.ospite.index}" name="ospiti[{$smarty.section.ospite.index}][codiceFiscale]" class="form-control" required placeholder="XXXXXX00A00A000A">
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="sesso_{$smarty.section.ospite.index}">Sesso:</label>
              <select id="sesso_{$smarty.section.ospite.index}" name="ospiti[{$smarty.section.ospite.index}][sesso]" class="form-select" required>
                <option value="" selected disabled>-- seleziona --</option>
                <option value="M">Maschio</option>
                <option value="F">Femmina</option>
                <option value="Altro">Altro</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="dataNascita_{$smarty.section.ospite.index}">Data di nascita:</label>
              <input type="date" id="dataNascita_{$smarty.section.ospite.index}" name="ospiti[{$smarty.section.ospite.index}][dataNascita]" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold" for="luogoNascita_{$smarty.section.ospite.index}">Luogo di nascita:</label>
              <input type="text" id="luogoNascita_{$smarty.section.ospite.index}" name="ospiti[{$smarty.section.ospite.index}][luogoNascita]" class="form-control" required placeholder="luogo di nascita">
            </div>
          </div>
        </div>
        {/section}

          <div class="text-center" style="margin-top: 100px; margin-bottom: 20px;">
            <button type="submit" class="btn salva-btn">Continua al riepilogo</button>
          </div>
      </form>

    </div>
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

  </body>
</html>