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


    
<!--
https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> CasetteDeiDesideri@gmail.com</li>
            <li><i class="fa-solid fa-location-dot"></i> Poggio Bustone, RI 057051</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul class="social-links">
            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://x.com/minthu" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/Casette_Dei_Desideri/User/home" class="logo" style="white-space: nowrap;">
                        <h1>Cassette Dei Desideri</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="/Casette_Dei_Desideri/User/home">Home</a></li>
                      <li><a href="/Casette_Dei_Desideri/Struttura/lista"class="active">Strutture</a></li>
                      <li><a href="contact.html">Contatti</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a>  /  Riepilogo</span>
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
              {if isset($ospite.documento) && $ospite.documento != ''}
                <div class="col-md-6">
                  <p class="ospite-info documento-link">
                    <strong>Documento:</strong>
                    <a href="data:{$ospite.documento_mime};base64,{$ospite.documento}"
                      target="_blank" 
                      download="documento_ospite.{$ospite.documento_ext}">📄 Visualizza documento</a>
                  </p>
                </div>
              {/if}
            </div>
          </div>
        {/foreach}
      </form>

      <form method="post" action="/Casette_Dei_Desideri/Prenotazione/pagamento">
        <div class="text-center" style="margin-top: 100px; margin-bottom: 20px;">
          <input type="hidden" name="conferma" value="1">
          <button type="submit" class="btn salva-btn">Conferma Prenotazione</button>
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