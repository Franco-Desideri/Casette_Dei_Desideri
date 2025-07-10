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

  {include file="partials/appbar_templateAdmin.tpl" paginaCorrente="strutture"}   
  
  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
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
                <div class="delete-button">
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
  
  <a href="/Casette_Dei_Desideri/AdminStruttura/aggiungi" class="pulsante-flottante" >+ Aggiungi struttura</a>

  </body>
</html>