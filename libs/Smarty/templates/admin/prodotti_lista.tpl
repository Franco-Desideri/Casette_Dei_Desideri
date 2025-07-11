<!DOCTYPE html>
<html lang="it">

  <head>

<title>Casette Dei Desideri</title>

<!-- Bootstrap core CSS -->
<link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
<link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style1.css"> 
</head>

<body>

{include file="partials/appbar_templateAdmin.tpl" paginaCorrente="strutture"}  

    <section class="hero-section">
        <img src="/Casette_Dei_Desideri/public/assets/images/spesa_domicilio.jpg" class="hero-image" alt="Spesa a domicilio">
        <div class="hero-overlay">
            <h2>Gestione Dei Prodotti</h2>
        </div>
    </section>


    <div class="admin-content-container">
        <h2 class="admin-page-title">Aggiungi Prodotti</h2> <div class="admin-action-links">
            <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiQuantita" class="btn salva-btn"> Nuovo prodotto a pezzi</a>
            <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiPeso" class="btn salva-btn"> Nuovo prodotto a peso</a>
    </div>

    <section>
        <h3 class="admin-section-title">Prodotti a Quantità (visibili)</h3>
        {if $prodottiQuantita_v|@count > 0}
            <ul class="admin-item-list"> {foreach from=$prodottiQuantita_v item=prodotto}
                    <li>

                        <img src="{$prodotto->fotoBase64}" alt="{$prodotto->getNome()}" class="product-image"> <div class="admin-item-details">
                            <strong>{$prodotto->getNome()}</strong> - {$prodotto->getPeso()} {$prodotto->getUnitaMisura()} - €{$prodotto->getPrezzo()}


                        </div>
                        <div class="admin-item-actions">
                        <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}"
                            class="btn-edit">✏️ Modifica</a>
                        <form method="POST"
                                action="/Casette_Dei_Desideri/AdminProdotto/disattiva"
                                class="d-inline"
                                onsubmit="return confirm('Nascondere il prodotto?');">
                            <input type="hidden" name="idProdotto" value="{$prodotto->getId()}">
                            <button type="submit" class="btn-delete">🚫 Disattiva</button>
                        </form>
                        </div>

                    </li>
                {/foreach}
            </ul>
        {else}
            <p class="admin-no-items-message">Nessun prodotto a quantità presente.</p> {/if}
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Peso (visibili)</h3>
        {if $prodottiPeso_v|@count > 0}
            <ul class="admin-item-list"> {foreach from=$prodottiPeso_v item=prodotto}
                    <li>
                        <img src="{$prodotto->fotoBase64}" alt="{$prodotto->getNome()}" class="product-image"> <div class="admin-item-details">
                            <strong>{$prodotto->getNome()}</strong> - €{$prodotto->getPrezzoKg()}/kg
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}"
                                class="btn-edit">✏️ Modifica</a>
                            <form method="POST" action="/Casette_Dei_Desideri/AdminProdotto/disattiva" 
                                class = "btn-delate"
                                onsubmit="return confirm('Nascondere il prodotto?');">
                               <input type="hidden" name="idProdotto" value="{$prodotto->getId()}">
                               <button type="submit" class="btn-delete">🚫 Disattiva</button>
                            </form>
                        </div>
                    </li>
                {/foreach}
            </ul>
        {else}
            <p class="admin-no-items-message">Nessun prodotto a peso presente.</p> {/if}
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Quantità (nascosti)</h3>
        {if $prodottiQuantita_n|@count > 0}
            <ul class="admin-item-list"> {foreach from=$prodottiQuantita_n item=prodotto}
                    <li>
                        <img src="{$prodotto->fotoBase64}" alt="{$prodotto->getNome()}" class="product-image"> <div class="admin-item-details">
                            <strong>{$prodotto->getNome()}</strong> - {$prodotto->getPeso()} {$prodotto->getUnitaMisura()} - €{$prodotto->getPrezzo()}
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}" class="btn-edit">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/attiva/{$prodotto->getId()}" onclick="return confirm('Rendere visibile il prodotto?')" class="btn-edit">✅ Attiva</a>
                        </div>
                    </li>
                {/foreach}
            </ul>
        {else}
            <p class="admin-no-items-message">Nessun prodotto a quantità presente.</p> {/if}
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Peso (nascosti)</h3>
        {if $prodottiPeso_n|@count > 0}
            <ul class="admin-item-list"> {foreach from=$prodottiPeso_n item=prodotto}
                    <li>
                        <img src="{$prodotto->fotoBase64}" alt="{$prodotto->getNome()}" class="product-image"> <div class="admin-item-details">
                            <strong>{$prodotto->getNome()}</strong> - {$prodotto->getRangePeso()}g - €{$prodotto->getPrezzoKg()} (o €{$prodotto->getPrezzoKg()}/kg)
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}"class="btn-edit">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/attiva/{$prodotto->getId()}" onclick="return confirm('Rendere visibile il prodotto?')"class="btn-edit">✅ Attiva</a>
                        </div>
                    </li>
                {/foreach}
            </ul>
        {else}
            <p class="admin-no-items-message">Nessun prodotto a peso presente.</p> {/if}
    </section>
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


  </body>
</html>

