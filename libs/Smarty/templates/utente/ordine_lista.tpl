{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Servizio Spesa in Struttura</h2>

<section>
    <h3>Prodotti a Quantità</h3>
    {if $prodottiQ|@count > 0}
        <ul style="list-style: none; padding: 0;">
            {foreach from=$prodottiQ item=prodotto}
                <li style="margin-bottom: 20px;">
                    <strong>{$prodotto->getNome()}</strong><br>
                    Prezzo: €{$prodotto->getPrezzo()} <br>
                    {$prodotto->getDescrizione()}
                </li>
            {/foreach}
        </ul>
    {else}
        <p>Nessun prodotto a quantità disponibile.</p>
    {/if}
</section>

<section>
    <h3>Prodotti a Peso</h3>
    {if $prodottiP|@count > 0}
        <ul style="list-style: none; padding: 0;">
            {foreach from=$prodottiP item=prodotto}
                <li style="margin-bottom: 20px;">
                    <strong>{$prodotto->getNome()}</strong><br>
                    Prezzo al kg: €{$prodotto->getPrezzo()} <br>
                    {$prodotto->getDescrizione()}
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
    <form action="/Casette_Dei_Desideri/Ordine/riepilogo" method="post">
        <select name="fascia_oraria" required>
            <option value="">-- Seleziona una fascia --</option>
            <option value="9-11">9:00 - 11:00</option>
            <option value="11-13">11:00 - 13:00</option>
            <option value="14-16">14:00 - 16:00</option>
            <option value="16-18">16:00 - 18:00</option>
        </select>
        <br><br>
        <button type="submit">Vai al carrello</button>
    </form>
</section>

{/block}
