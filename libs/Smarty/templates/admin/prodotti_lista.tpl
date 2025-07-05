{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/header_admin.tpl"}


<div class="admin-content-container">

    <h2 class="admin-page-title">Gestione Prodotti</h2> <div class="admin-action-links">
        <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiQuantita" class="admin-action-link"> Nuovo prodotto a pezzi</a>
        <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiPeso" class="admin-action-link"> Nuovo prodotto a peso</a>
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
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}">✏️ Modifica</a>
                            <form method="POST" action="/Casette_Dei_Desideri/AdminProdotto/disattiva" style="display:inline;" onsubmit="return confirm('Nascondere il prodotto?');">
                               <input type="hidden" name="idProdotto" value="{$prodotto->getId()}">
                               <button type="submit" style="background:none; border:none; padding:0;font:inherit; color:inherit; cursor:pointer;">🚫 Disattiva</button>
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
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}">✏️ Modifica</a>
                            <form method="POST" action="/Casette_Dei_Desideri/AdminProdotto/disattiva" style="display:inline;" onsubmit="return confirm('Nascondere il prodotto?');">
                               <input type="hidden" name="idProdotto" value="{$prodotto->getId()}">
                               <button type="submit" style="background:none; border:none; padding:0; font:inherit; color:inherit; cursor:pointer;">🚫 Disattiva</button>
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
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/attiva/{$prodotto->getId()}" onclick="return confirm('Rendere visibile il prodotto?')">✅ Attiva</a>
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
                            <strong>{$prodotto->getNome()}</strong> - {$prodotto->getRangePeso()}g - €{$prodotto->getPrezzoRange()} (o €{$prodotto->getPrezzoKg()}/kg)
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/attiva/{$prodotto->getId()}" onclick="return confirm('Rendere visibile il prodotto?')">✅ Attiva</a>
                        </div>
                    </li>
                {/foreach}
            </ul>
        {else}
            <p class="admin-no-items-message">Nessun prodotto a peso presente.</p> {/if}
    </section>

</div> {/block}
