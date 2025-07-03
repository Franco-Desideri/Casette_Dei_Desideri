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
<!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
  </head>

<body>

  <!-- ***** Animazione di Caricamento ***** -->
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
  <!-- ***** Barra Superiore ***** -->

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

  <!-- ***** Header principale e Menù di navigazione ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/Casette_Dei_Desideri/AdminContenuti/home" class="logo" style="white-space: nowrap;">
                        <h1>Cassette Dei Desideri</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="/Casette_Dei_Desideri/AdminContenuti/home">Home</a></li>
                      <li><a href="/Casette_Dei_Desideri/AdminStruttura/lista" class="active">Strutture</a></li>
                      <li><a href="contatti.tpl">Contatti</a></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Fine Menù ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Intestazione della pagina ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="#">Home</a> / Strutture</span>
          <h3>Strutture</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="section properties">
    <div class="container">
      
    
        {if $strutture|@count > 0}
        <div class="row properties-box">
            {foreach from=$strutture item=struttura}
            <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 str">
                <div class="item">
                <a href="/Casette_Dei_Desideri/Struttura/dettaglio/{$struttura->getId()}">
                    {if $struttura->immaginePrincipale}
                      <img src="{$struttura->immaginePrincipale}" alt="Struttura" />
                    {/if}


                </a>
                <span class="category">{$struttura->getTitolo()}</span>
                <h4><a href="/Casette_Dei_Desideri/Struttura/dettaglio/{$struttura->getId()}">{$struttura->getLuogo()}</a></h4>
                <ul>
                  <li>
                    <span class="prop-label">Bagni:</span>
                    <span class="prop-value"><strong>{$struttura->getNBagni()}</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Letti:</span>
                    <span class="prop-value"><strong>{$struttura->getNLetti()}</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Metri quadri:</span>
                    <span class="prop-value"><strong>{$struttura->getM2()}</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Ospiti:</span>
                    <span class="prop-value"><strong>{$struttura->getNumOspiti()}</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Parcheggio:</span>
                    <span class="prop-value"><strong>{if $struttura->getParcheggio()}Sì{else}No{/if}</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Colazione:</span>
                    <span class="prop-value"><strong>{if $struttura->getColazione()}Sì{else}No{/if}</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Wifi:</span>
                    <span class="prop-value"><strong>{if $struttura->getWifi()}Sì{else}No{/if}</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Animali ammessi:</span>
                    <span class="prop-value"><strong>{if $struttura->getAnimali()}Sì{else}No{/if}</strong></span>
                  </li>
                  <li>
                    <span class="prop-label">Balcone:</span>
                    <span class="prop-value"><strong>{if $struttura->getBalcone()}Sì{else}No{/if}</strong></span>
                  </li>

                </ul>
                <div class="edit-button">
                    <a href="/Casette_Dei_Desideri/AdminStruttura/modifica/{$struttura->getId()}" style="margin-right: 10px;">
                    ✏️ Modifica
                </a>
                </div>
                <div class="delate-button">
                   <a href="/Casette_Dei_Desideri/AdminStruttura/elimina/{$struttura->getId()}" onclick="return confirm('Sei sicuro di voler eliminare questa struttura?');">
                    🗑️ Elimina
                </a>
                </div>
                </div>
            </div>
            {/foreach}
        </div>
        {else}
        <p>Nessuna struttura trovata.</p>
        {/if}
  

    <!--
      <div class="row">
        <div class="col-lg-12">
          <ul class="pagination">
            <li><a href="#">1</a></li>
            <li><a class="is_active" href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">>></a></li>
          </ul>
        </div>
      </div>-->
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Casette Dei Desideri ..... 
        
        Design: <a rel="nofollow" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
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
  
  <a href="/Casette_Dei_Desideri/AdminStruttura/aggiungi" class="pulsante-flottante" >+ Aggiungi struttura</a>

  </body>
</html>