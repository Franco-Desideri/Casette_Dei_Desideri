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
  <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style.css?v=1">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>

<body>

  {include file="partials/appbar_template.tpl" paginaCorrente="strutture"}

  <div class="hero-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="hero-title">B&amp;B Casette Dei Desideri</h3>
          <p class="hero-subtitle">"Buon giorno buona gente"...</p>
          <p class="hero-subtitle">Il vostro soggiorno a Poggio Bustone presso Le Casette Dei Desideri vi aspetta.</p>
          <p class="hero-subtitle">Venite a scoprire i nostri servizi e le meraviglie che vi riserva il nostro paese!</p>
        </div>
      </div>
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


  <div class="section-divider"></div>

  <h2 class="section-title">Perchè venire a trovarci?</h2>
  

  <div class="card-container">
    {if $attrazioni|@count > 0}
        {foreach from=$attrazioni item=attrazione}
            <div class="card">
                <div class="card-text">
                    <p>{$attrazione->getDescrizione()}</p>
                </div>
                <div class="card-image">
                    <img src="{$attrazione->base64img}" alt="Immagine attrazione">
                </div>
            </div>
        {/foreach}
    {else}
        <p>Non ci sono attrazioni disponibili</p>
    {/if}
  </div>


  <div class="section-divider"></div>

  <h2 class="section-title">Eventi da non perdere</h2>


<div class="card-list-info">
  {if $eventi|@count > 0}
    {foreach from=$eventi item=evento}
      <div class="card-info">
        <div class="title-marquee">
          <h3 class="card-title">
            <span class="scroll-text">{$evento->getTitolo()}</span>
          </h3>
        </div>
        <p class="card-dates">
          Dal {$evento->getDataInizioString('Y-m-d')} al {$evento->getDataFineString('Y-m-d')}
        </p>
        <div class="card-info-image">
          <img src="{$evento->base64img}" alt="Immagine evento">
        </div>
      </div>
    {/foreach}
  {else}
    <p>Non ci sono attrazioni disponibili</p>
  {/if}
</div>



  {include file="partials/footer.tpl" paginaCorrente="strutture"}  


  <!-- Scripts -->
  <script src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/counter.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/custom.js"></script>

</body>
</html>
