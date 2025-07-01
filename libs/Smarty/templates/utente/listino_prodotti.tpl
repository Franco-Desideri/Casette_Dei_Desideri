{extends file="layouts/base.tpl"}

{block name="contenuto"}


    <link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style.css">



    <section class="hero-section" style="position: relative; height: 400px;">
  <img src="/public/assets/images/spesa_domicilio.jpg" class="img-fluid" alt="Spesa a domicilio">
  <div class="hero-overlay" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center;">
    <h2>I NOSTRI SERVIZI</h2>
    <p>Il soggiorno presso le nostre strutture è contornato dalla possibilità di ordinare spesa a domicilio.</p>
  </div>
</section>


    <section class="intro-text">
        <p>Seleziona i prodotti che desideri ricevere, te li portiamo noi!</p>
    </section>

    <form action="/Casette_Dei_Desideri/Ordine/riepilogo" method="POST">

        {if isset($prodottiQ) && $prodottiQ|@count > 0}
            <h3 class="section-subtitle">Prodotti a Quantità</h3>
            <section class="product-list">
                {foreach $prodottiQ as $prodotto}
                    <div class="product-card">
                        <img src="{$prodotto->getImmagine()}" alt="{$prodotto->getNome()}" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name">{$prodotto->getNome()}</h4>
                            <p class="product-description">{$prodotto->getDescrizione()}</p>
                            <p class="product-price">Prezzo: {$prodotto->getPrezzo()|string_format:"%.2f"} &euro; ({$prodotto->getUnitaMisura()})</p>
                            
                            <div class="quantity-control">
                                <button type="button" class="qty-btn" data-action="minus">-</button>
                                <input type="number" name="quantitaQ[{$prodotto->getId()}]" min="0" value="0" class="product-quantity-input" readonly>
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

        {if isset($prodottiP) && $prodottiP|@count > 0}
            <h3 class="section-subtitle">Prodotti a Peso</h3>
            <section class="product-list">
                {foreach $prodottiP as $prodotto}
                    <div class="product-card">
                        <img src="{$prodotto->getImmagine()}" alt="{$prodotto->getNome()}" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name">{$prodotto->getNome()}</h4>
                            <p class="product-description">{$prodotto->getDescrizione()}</p>
                            <p class="product-price-per-unit">Prezzo: {$prodotto->getPrezzoKg()|string_format:"%.2f"} &euro;/Kg</p>
                            
                            <div class="weight-input-group">
                                <input type="number" name="quantitaP[{$prodotto->getId()}]" min="0" step="50" value="0" class="product-weight-input"> Grammi
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
            <div class="form-group"> <label for="fascia_oraria">Orario preferito:</label>
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

{/block}

{block name="scripts"}
    <script src="/public/assets/js/product_quantity.js"></script>
{/block}
