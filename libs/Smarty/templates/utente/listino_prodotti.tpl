{extends file="layouts/base.tpl"}

{block name="contenuto"}


{include file="partials/header.tpl"}

<main class="main-content container">

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
                        <img src="/Casette_Dei_Desideri/public/uploads/prodotti/{$prodotto->getFoto()}" alt="{$prodotto->getNome()}" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name">{$prodotto->getNome()}</h4>
                            <p class="product-description">{$prodotto->getPeso()}g</p>
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
                        <img src="/Casette_Dei_Desideri/public/uploads/prodotti/{$prodotto->getFoto()}" alt="{$prodotto->getNome()}" class="product-image">
                        <div class="product-details">
                            <h4 class="product-name">{$prodotto->getNome()}</h4>
                            
                            <p class="product-price-per-unit">Prezzo: {$prodotto->getPrezzoKg()|string_format:"%.2f"} &euro;/Kg</p>
                            
                            <div class="quantity-control">
                                <button type="button" class="qty-btn" data-action="minus">-</button>
                                <input type="number" name="quantitaP[{$prodotto->getId()}]" min="0" step="50" value="0" class="product-quantity-input"> g
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

</main>

{/block}

{block name="scripts"}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.quantity-control').forEach(function(control) {
        const minusBtn = control.querySelector('[data-action="minus"]');
        const plusBtn = control.querySelector('[data-action="plus"]');
        const input = control.querySelector('.product-quantity-input');

        const step = parseInt(input.step) || 1;
        const min = parseInt(input.min) || 0;

        minusBtn.addEventListener('click', function() {
            let value = parseInt(input.value) || 0;
            value = Math.max(min, value - step);
            input.value = value;
        });

        plusBtn.addEventListener('click', function() {
            let value = parseInt(input.value) || 0;
            input.value = value + step;
        });
    });
});
    </script>
{/block}
