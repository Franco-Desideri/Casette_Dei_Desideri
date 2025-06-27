{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar_admin.tpl"}

<h2>Aggiungi un nuovo prodotto</h2>
<a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiQuantita">➕ Prodotto a pezzi</a><br>
<a href="/Casette_Dei_Desideri/AdminProdotto/aggiungiPeso">➕ Prodotto a peso</a>


<section>
    <h3>Prodotti a Quantità</h3>
    {if $prodottiQuantita|@count > 0}
        <ul style="list-style: none; padding: 0;">
            {foreach from=$prodottiQuantita item=prodotto}
                <li style="margin-bottom: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <strong>{$prodotto->getNome()}</strong> - {$prodotto->getPeso()}g - €{$prodotto->getPrezzo()}
                    <br>
                    <img src="{$prodotto->getFoto()}" alt="foto" width="100">
                    <br>
                    <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}">✏️ Modifica</a> |
                    <a href="/Casette_Dei_Desideri/AdminProdotto/elimina/{$prodotto->getId()}" onclick="return confirm('Eliminare il prodotto?')">🗑️ Elimina</a>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessun prodotto a quantità presente.</p>
    {/if}
</section>

<section>
    <h3>Prodotti a Peso</h3>
    {if $prodottiPeso|@count > 0}
        <ul style="list-style: none; padding: 0;">
            {foreach from=$prodottiPeso item=prodotto}
                <li style="margin-bottom: 10px; border-bottom: 1px solid #ccc; padding-bottom: 10px;">
                    <strong>{$prodotto->getNome()}</strong> - {$prodotto->getRangePeso()}g - €{$prodotto->getPrezzoRange()} (o €{$prodotto->getPrezzoKg()}/kg)
                    <br>
                    <img src="{$prodotto->getFoto()}" alt="foto" width="100">
                    <br>
                    <a href="/Casette_Dei_Desideri/AdminProdotto/modifica/{$prodotto->getId()}">✏️ Modifica</a> |
                    <a href="/Casette_Dei_Desideri/AdminProdotto/elimina/{$prodotto->getId()}" onclick="return confirm('Eliminare il prodotto?')">🗑️ Elimina</a>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessun prodotto a peso presente.</p>
    {/if}
</section>

{/block}
