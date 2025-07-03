{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/header_admin.tpl"}


<div class="admin-content-container">

    <h2 class="admin-page-title">Gestione Prodotti</h2> <div class="admin-action-links">
        <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiQuantita" class="admin-action-link"> Nuovo prodotto a pezzi</a>
        <a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiPeso" class="admin-action-link"> Nuovo prodotto a peso</a>
    </div>

    <section>
        <h3 class="admin-section-title">Prodotti a Quantità</h3>
        {if $prodottiQuantita|@count > 0}
            <ul class="admin-item-list"> {foreach from=$prodottiQuantita item=prodotto}
                    <li>
                        <img src="{$prodotto->getFoto()}" alt="{$prodotto->getNome()}" class="product-image"> <div class="admin-item-details">
                            <strong>{$prodotto->getNome()}</strong> - {$prodotto->getPeso()}g - €{$prodotto->getPrezzo()}
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/elimina/{$prodotto->getId()}" onclick="return confirm('Eliminare il prodotto?')">🗑️ Elimina</a>
                        </div>
                    </li>
                {/foreach}
            </ul>
        {else}
            <p class="admin-no-items-message">Nessun prodotto a quantità presente.</p> {/if}
    </section>

    <section>
        <h3 class="admin-section-title">Prodotti a Peso</h3>
        {if $prodottiPeso|@count > 0}
            <ul class="admin-item-list"> {foreach from=$prodottiPeso item=prodotto}
                    <li>
                        <img src="{$prodotto->getFoto()}" alt="{$prodotto->getNome()}" class="product-image"> <div class="admin-item-details">
                            <strong>{$prodotto->getNome()}</strong> - {$prodotto->getRangePeso()}g - €{$prodotto->getPrezzoRange()} (o €{$prodotto->getPrezzoKg()}/kg)
                        </div>
                        <div class="admin-item-actions">
                            <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}">✏️ Modifica</a>
                            <a href="/Casette_Dei_Desideri/AdminProdotto/elimina/{$prodotto->getId()}" onclick="return confirm('Eliminare il prodotto?')">🗑️ Elimina</a>
                        </div>
                    </li>
                {/foreach}
            </ul>
        {else}
            <p class="admin-no-items-message">Nessun prodotto a peso presente.</p> {/if}
    </section>

</div> {/block}
