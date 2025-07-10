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

    {if $ruolo == 'admin'}
      {include file="partials/appbar_templateAdmin.tpl" paginaCorrente="strutture"}
    {else}
      {include file="partials/appbar_template.tpl" paginaCorrente="strutture"}
    {/if}


      <div class="page-heading header-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h3>Riepilogo prenotazione</h3>
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
                Struttura: <span style="color: #28a745;">{$struttura->getTitolo()}</span>
              </h1>

              <!-- Dati della prenotazione -->
              <p class="info">
                <i class="fa fa-calendar" style="font-size: 1.8rem; color: #1e90ff; margin-right: 22px;"></i>
                <strong>Periodo:</strong>&nbsp;{$dataInizio} → {$dataFine}
              </p>

              <p class="info">
                <i class="fas fa-users" style="font-size: 1.8rem; color: #1e90ff; margin-right: 12px;"></i>
                <strong>Numero Ospiti:</strong>&nbsp;{$ospiti|@count}
              </p>

              <p class="info">
                <i class="fa-solid fa-coins" style="font-size: 1.8rem; color: #28a745; margin-right: 20px;"></i>
                <strong>Prezzo Totale:</strong>&nbsp;€ {$totale}
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

            <h3 class="mb-4" style="font-weight: 700; font-size: 2rem;">RIEPILOGO DATI OSPITI:</h3>
              {foreach from=$ospiti item=ospite name=ospitiLoop}
              <div class="card ospite-card mb-4 rounded">
                <h4 class="ospite-title mb-4">
                  Ospite {$smarty.foreach.ospitiLoop.iteration}
                </h4>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <p class="ospite-info">
                      <strong>Nome:</strong>&nbsp;{$ospite.nome}
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p class="ospite-info">
                      <strong>Cognome:</strong>&nbsp;{$ospite.cognome}
                    </p>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <p class="ospite-info">
                      <strong>Telefono:</strong>&nbsp;{$ospite.tell}
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p class="ospite-info">
                      <strong>Codice Fiscale:</strong>&nbsp;{$ospite.codiceFiscale}
                    </p>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <p class="ospite-info">
                      <strong>Sesso:</strong>&nbsp;{$ospite.sesso}
                    </p>
                  </div>
                  <div class="col-md-6">
                    <p class="ospite-info">
                      <strong>Data di Nascita:</strong>&nbsp;{$ospite.dataNascita}
                    </p>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-md-6">
                    <p class="ospite-info">
                      <strong>Luogo di Nascita:</strong>&nbsp;{$ospite.luogoNascita}
                    </p>
                  </div>
                  {if isset($ospite.documento_base64) && $ospite.documento_base64 != ''}
                    <div class="col-md-6">
                      <p class="ospite-info documento-link">
                        <strong>Documento:</strong>
                        <a href="data:{$ospite.documento_mime};base64,{$ospite.documento_base64}"
                          target="_blank" 
                          download="documento_ospite.{$ospite.documento_ext}">📄 Visualizza documento</a>
                      </p>
                    </div>
                  {/if}
                </div>
              </div>
            {/foreach}
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