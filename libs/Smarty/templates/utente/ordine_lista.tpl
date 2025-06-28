{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Servizio Spesa in Struttura</h2>

<form action="/Casette_Dei_Desideri/Ordine/riepilogo" method="post">

<section>
    <h3>Prodotti a Quantità</h3>
    {if $prodottiQuantita|@count > 0}
        <ul style="list-style: none; padding: 0;">
            {foreach from=$prodottiQuantita item=prodotto}
                <li style="margin-bottom: 20px;">
                    {if isset($prodotto->base64img)}
                        <img src="{$prodotto->base64img}" alt="{$prodotto->getNome()}" style="max-height: 120px;"><br>
                    {/if}
                    <strong>{$prodotto->getNome()}</strong><br>
                    Prezzo: €{$prodotto->getPrezzo()}<br>
                    Quantità:
                    <select name="quantitaQ[{$prodotto->getId()}]">
                        {section name=q start=0 loop=11}
                            <option value="{$smarty.section.q.index}">{$smarty.section.q.index}</option>
                        {/section}
                    </select>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessun prodotto a quantità disponibile.</p>
    {/if}
</section>

<section>
    <h3>Prodotti a Peso</h3>
    {if $prodottiPeso|@count > 0}
        <ul style="list-style: none; padding: 0;">
            {foreach from=$prodottiPeso item=prodotto}
                <li style="margin-bottom: 20px;">
                    {if isset($prodotto->base64img)}
                        <img src="{$prodotto->base64img}" alt="{$prodotto->getNome()}" style="max-height: 120px;"><br>
                    {/if}
                    <strong>{$prodotto->getNome()}</strong><br>
                    Prezzo al kg: €{$prodotto->getPrezzoKg()}<br>
                    Quantità (grammi):
                    {assign var=range value=$prodotto->getRangeValore()}
                    <select name="quantitaP[{$prodotto->getId()}]">
                        {section name=g start=$range loop=1100 step=$range}
                            <option value="{$smarty.section.g.index}">{$smarty.section.g.index} g</option>
                        {/section}
                        <option value="0" selected>0 g</option>
                    </select>
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessun prodotto a peso disponibile.</p>
    {/if}
</section>

<hr>

<section>
    <h3>Seleziona una fascia oraria per la consegna</h3>
    <select name="fascia_oraria" required>
        <option value="">-- Seleziona una fascia --</option>
        <option value="9-11">9:00 - 11:00</option>
        <option value="11-13">11:00 - 13:00</option>
        <option value="14-16">14:00 - 16:00</option>
        <option value="16-18">16:00 - 18:00</option>
    </select>
</section>

<br><br>
<button type="submit">Vai al carrello</button>

</form>

{/block}
