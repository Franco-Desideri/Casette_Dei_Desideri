<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>Villa Agency - Real Estate HTML5 Template</title>

  <!-- Bootstrap core CSS -->
  <link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style.css?v=1">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
        <div class="col-lg-12 col-md-12">
          <ul class="info">
            <li><i class="fa fa-envelope"></i> {$email_admin}</li>
            <li><i class="fa fa-map"></i> Poggio Bustone, RI 02018</li>
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
            <a href="index.html" class="logo" style="text-align: left; width: 100%;">
            <h1 style="white-space: nowrap; font-size: 24px;">Casetta dei Desideri</h1>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="/Casette_Dei_Desideri/User/home" class="active">Home</a></li>
              <li><a href="/Casette_Dei_Desideri/Struttura/lista">Strutture</a></li>
              <li><a href="/Casette_Dei_Desideri/Ordine/listaProdotti">Servizi</a></li>
              <li><a href="/Casette_Dei_Desideri/User/profilo">Profilo</a></li>
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

  <div class="hero-card">
    <img src="/Casette_Dei_Desideri/public/assets/immagini/hero.jpg" alt="B&B Casette Dei Desideri">
    <div class="hero-text">
      <div class="hero-title">B&amp;B Casette Dei Desideri</div>
      <div class="hero-subtitle">"Buon giorno buona gente"...</div>
      <div class="hero-subtitle">Il vostro soggiorno a Pogio Bustone presso Le Casette Dei Desideri vi aspetta.</div>
      <div class="hero-subtitle">Venite a scoprire i nostri servizi e le meraviglie che vi riserva il nostro paese!</div>
    </div>
  </div>


  <section class="story-section">
    <h2 class="story-title">La nostra Storia</h2>
    <p class="story-text">
      Le nostre strutture nascono in antiche case nel borgo di Poggio Bustone e ormai da 10 anni ospitano tutti coloro che vogliono ammirare le bellezze della nostra terra.
      Le strutture preservano il carattere rustico ma accogliente delle originarie abitazioni dei borghi di montagna.
      Il nostro obiettivo è sempre stato quello di farvi sentire accolti grazie allo spirito genuino che conservano gli appartamenti e che rispetta la storia del posto.
    </p>
  </section>


 <!-- Sezione ATTRAZIONI -->
<div class="section-divider"></div>
<h2 class="section-title">Perché venire a trovarci?</h2>

<!-- Pulsante aggiungi attrazione -->
<form action="/Casette_Dei_Desideri/AdminContenuti/aggiungiAttrazione" method="post" style="margin-bottom: 20px;">
  <button type="submit" class="btn btn-primary">Aggiungi Attrazione</button>
</form>

<div class="card-container">
  {if $attrazioni|@count > 0}
    {foreach from=$attrazioni item=attrazione}
      <div class="card-wrapper">
        <a href="/Casette_Dei_Desideri/AdminContenuti/modificaAttrazione/{$attrazione->getId()}" class="card-link">
          <div class="card">
            <div class="card-text">
              <p>{$attrazione->getDescrizione()}</p>
            </div>
            <div class="card-image">
              <img src="{$attrazione->base64img}" alt="Immagine attrazione">
            </div>
          </div>
        </a>
        <form action="/Casette_Dei_Desideri/AdminContenuti/eliminaAttrazione/{$attrazione->getId()}" method="post" style="margin-top: 10px;">
          <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa attrazione?');">Elimina</button>
        </form>
      </div>
    {/foreach}
  {else}
    <p>Non ci sono attrazioni disponibili</p>
  {/if}
</div>

<!-- Sezione EVENTI -->
<div class="section-divider"></div>
<h2 class="section-title">Eventi da non perdere</h2>

<!-- Pulsante aggiungi evento -->
<form action="/Casette_Dei_Desideri/AdminContenuti/aggiungiEvento" method="post" style="margin-bottom: 20px;">
  <button type="submit" class="btn btn-primary">Aggiungi Evento</button>
</form>

<div class="card-list-info">
  {if $eventi|@count > 0}
    {foreach from=$eventi item=evento}
      <div class="card-wrapper">
        <a href="/Casette_Dei_Desideri/AdminContenuti/modificaEvento/{$evento->getId()}" class="card-link">
          <div class="card-info">
            <h3 class="card-title">{$evento->getTitolo()}</h3>
            <p class="card-dates">Dal {$evento->getDataInizioString('Y-m-d')} al {$evento->getDataFineString('Y-m-d')}</p>
            <div class="card-info-image">
              <img src="{$evento->base64img}" alt="Immagine evento">
            </div>
          </div>
        </a>
        <form action="/Casette_Dei_Desideri/AdminContenuti/eliminaEvento/{$evento->getId()}" method="post" style="margin-top: 10px;">
          <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo evento?');">Elimina</button>
        </form>
      </div>
    {/foreach}
  {else}
    <p>Non ci sono eventi disponibili</p>
  {/if}
</div>


  <!-- Scripts -->
  <script src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/counter.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/custom.js"></script>

</body>
</html>
