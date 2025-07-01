{extends file="layouts/base.tpl"}

{block name="contenuto"}

<section class="hero-section">
    <img src="/public/assets/images/spesa_domicilio.jpg" alt="Immagine spesa a domicilio" class="hero-image">
    <div class="hero-overlay">
        <h2>I NOSTRI SERVIZI</h2>
        <p>Il soggiorno presso le nostre strutture è contornato dalla possibilità di ordinare spesa a domicilio.</p>
    </div>
</section>

<section class="intro-text">
    <p>Seleziona i prodotti che desideri ricevere, te li portiamo noi!</p>
</section>

<form action="/Casette_Dei_Desideri/Ordine/riepilogo" method="POST">

    {if isset($prodottiQ) && $prodottiQ|@count > 0}
        <h3 class="section-title">Prodotti a Quantità</h3>
        <section class="product-list">
            {foreach $prodottiQ as $prodotto}
                <div class="product-card">
                    <img src="{$prodotto->getImmagine()}" alt="{$prodotto->getNome()}" class="product-image">
                    <div class="product-details">
                        <h4>{$prodotto->getNome()}</h4>
                        <p>{$prodotto->getDescrizione()}</p>
                        <p>Prezzo: {$prodotto->getPrezzo()|string_format:"%.2f"} &euro; ({$prodotto->getUnitaMisura()})</p>
                        <label>Quantità:
                            <input type="number" name="quantitaQ[{$prodotto->getId()}]" min="0" value="0">
                        </label>
                    </div>
                </div>
            {/foreach}
        </section>
    {/if}

    {if isset($prodottiP) && $prodottiP|@count > 0}
        <h3 class="section-title">Prodotti a Peso</h3>
        <section class="product-list">
            {foreach $prodottiP as $prodotto}
                <div class="product-card">
                    <img src="{$prodotto->getImmagine()}" alt="{$prodotto->getNome()}" class="product-image">
                    <div class="product-details">
                        <h4>{$prodotto->getNome()}</h4>
                        <p>{$prodotto->getDescrizione()}</p>
                        <p>Prezzo: {$prodotto->getPrezzoKg()|string_format:"%.2f"} &euro;/Kg</p>
                        <label>Grammi:
                            <input type="number" name="quantitaP[{$prodotto->getId()}]" min="0" step="50" value="0">
                        </label>
                    </div>
                </div>
            {/foreach}
        </section>
    {/if}

    <section class="delivery-time-selection">
        <h3 class="section-title">Scegli l'orario di consegna</h3>
        <label for="fascia_oraria">Orario preferito:</label>
        <select id="fascia_oraria" name="fascia_oraria" required>
            <option value="">Seleziona un orario</option>
            <option value="09-10">09:00 - 10:00</option>
            <option value="10-11">10:00 - 11:00</option>
            <option value="11-12">11:00 - 12:00</option>
            <option value="16-17">16:00 - 17:00</option>
            <option value="17-18">17:00 - 18:00</option>
        </select>
    </section>

    <section class="cart-button-section">
        <button type="submit" class="main-button">Vai al Riepilogo</button>
    </section>

</form>

{/block}

{block name="scripts"}
    <script src="/public/assets/js/product_quantity.js"></script>
{/block}
