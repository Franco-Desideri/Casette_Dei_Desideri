{extends file="layouts/base.tpl"}

{block name="contenuto"}

    <!-- Bootstrap core CSS -->
    <link href="/Casette_Dei_Desideri/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/templatemo-villa-agency.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/owl.css">
    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>


    {include file="partials/appbar_template.tpl" paginaCorrente="strutture"}


    <section class="hero-section">
        <img src="/Casette_Dei_Desideri/public/assets/images/spesa_domicilio.jpg" class="hero-image" alt="Spesa a domicilio">
        <div class="hero-overlay">
            <h2>I NOSTRI SERVIZI</h2>
            <p>Il soggiorno presso le nostre strutture è contornato dalla possibilità di ordinare spesa a domicilio.</p>
        </div>
    </section>

    


    <section class="intro-text">
        <p>Seleziona i prodotti che desideri ricevere, te li portiamo noi!</p>
    </section>

    <form action="/Casette_Dei_Desideri/Ordine/riepilogo" method="POST">

        {if isset($prodottiQuantita) && $prodottiQuantita|@count > 0}
            <h3 class="section-subtitle">Prodotti a quantità</h3>
            <section class="product-list">
                {foreach $prodottiQuantita as $prodotto}
                    <div class="product-card">
                        <img src="{$prodotto->fotoBase64}" alt="{$prodotto->getNome()}" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name">{$prodotto->getNome()}</h4>
                            <p class="product-description">{$prodotto->getPeso()} {$prodotto->getUnitaMisura()}</p>
                            <p class="product-price">Prezzo: {$prodotto->getPrezzo()|string_format:"%.2f"} &euro;</p>
                            
                            <div class="quantity-control">
                                <button type="button" class="qty-btn" data-action="minus">-</button>
                                <input type="number" name="quantitaQ[{$prodotto->getId()}]" min="0" step="1" value="0" class="product-quantity-input" readonly>
                                <button type="button" class="qty-btn" data-action="plus">+</button>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </section>
        {else}
            <h3 class="section-subtitle">Prodotti a Quantità</h3>
            <p class="no-products-message">Nessun prodotto a quantità disponibile al momento.</p>
        {/if}

        {if isset($prodottiPeso) && $prodottiPeso|@count > 0}
            <h3 class="section-subtitle">Prodotti a Peso</h3>
            <section class="product-list">
                {foreach $prodottiPeso as $prodotto}
                    <div class="product-card">
                        <img src="{$prodotto->fotoBase64}" alt="{$prodotto->getNome()}" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name">{$prodotto->getNome()}</h4>
                            
                            <p class="product-price-per-unit">Prezzo: {$prodotto->getPrezzoKg()|string_format:"%d"} &euro;/Kg</p>
                            
                            <div class="quantity-control" data-step="{$prodotto->getRangePeso()}">
                                <button type="button" class="qty-btn" data-action="minus">-</button>
                                <input type="number" name="quantitaP[{$prodotto->getId()}]" min="0" step="{$prodotto->getRangePeso()}" value="0" class="product-quantity-input" data-tipo="peso"> g
                                <button type="button" class="qty-btn" data-action="plus">+</button>
                            </div>
                        </div>
                    </div>
                {/foreach}
            </section>
        {else}
            <h3 class="section-subtitle">Prodotti a Peso</h3>
            <p class="no-products-message">Nessun prodotto a peso disponibile al momento.</p>
        {/if}

        <section class="delivery-time-section">
            <h3 class="section-subtitle">Scegli l'orario di consegna</h3>
            <div class="form-group">
                <label for="fascia_oraria">Orario preferito:</label>
                <select id="fascia_oraria" name="fascia_oraria" class="delivery-time-select" required>
                    <option value="">Seleziona un orario</option>
                    <option value="09-10">09:00 - 10:00</option>
                    <option value="10-11">10:00 - 11:00</option>
                    <option value="11-12">11:00 - 12:00</option>
                    <option value="16-17">16:00 - 17:00</option>
                    <option value="17-18">17:00 - 18:00</option>
                </select>
            </div>
        </section>

        <section class="cart-button-section">
            <button type="submit" class="main-button">Vai al Riepilogo</button>
        </section>

    </form>



  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="/Casette_Dei_Desideri/public/vendor/jquery/jquery.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/isotope.min.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/owl-carousel.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/counter.js"></script>
  <script src="/Casette_Dei_Desideri/public/assets/js/custom.js"></script>

{/block}

{block name="scripts"}
    <script>
document.querySelectorAll('.quantity-control').forEach(control => {
    const minusBtn = control.querySelector('[data-action="minus"]');
    const plusBtn = control.querySelector('[data-action="plus"]');
    const input = control.querySelector('.product-quantity-input');

    // Prende il tipo (peso o quantità)
    const tipo = input.dataset.tipo;
    
    const step = tipo === 'peso' ? parseInt(control.dataset.step) || 100 : 1;

    plusBtn.addEventListener('click', () => {
        let current = parseInt(input.value) || 0;
        input.value = (current + step);
    });

    minusBtn.addEventListener('click', () => {
        let current = parseInt(input.value) || 0;
        input.value = Math.max(0, current - step);
    });
});
</script>



{/block}
