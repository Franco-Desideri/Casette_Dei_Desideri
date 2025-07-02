{extends file="layouts/base.tpl"}

{block name="contenuto"}

<link rel="stylesheet" href="/Casette_Dei_Desideri/public/assets/css/style.css">

<h2 class="section-title">Riepilogo Ordine</h2>

{if isset($ordine.prodotti) && count($ordine.prodotti) > 0}
<table class="order-summary-table">
    <thead>
        <tr>
            <th>Prodotto</th>
            <th>Quantità</th>
            <th>Prezzo Unitario</th>
            <th>Totale</th>
        </tr>
    </thead>
    <tbody>
        {assign var="totale" value=0}
        {foreach $ordine.prodotti as $prodotto}
            {assign var="quantita" value=$prodotto.quantita}
            {assign var="prezzoUnitario" value=$prodotto.prezzo}
            {assign var="totaleProdotto" value=$quantita * $prezzoUnitario}
            {assign var="totale" value=$totale + $totaleProdotto}
            <tr>
                <td>{$prodotto.nome}</td>
                <td>{$quantita}</td>
                <td>{$prezzoUnitario|string_format:"%.2f"} &euro;</td>
                <td>{$totaleProdotto|string_format:"%.2f"} &euro;</td>
            </tr>
        {/foreach}
        <tr class="order-total-row">
            <td colspan="3">Totale Ordine:</td>
            <td>{$totale|string_format:"%.2f"} &euro;</td>
        </tr>
    </tbody>
</table>

<form action="/Casette_Dei_Desideri/Ordine/inviaOrdine" method="POST" class="order-form">
    <label for="taglio_banconota">Seleziona taglio banconota per pagamento:</label>
    <select id="taglio_banconota" name="taglio_banconota" required>
        <option value="">Seleziona un taglio</option>
        <option value="5">5 &euro;</option>
        <option value="10">10 &euro;</option>
        <option value="20">20 &euro;</option>
        <option value="50">50 &euro;</option>
        <option value="100">100 &euro;</option>
    </select>
    <button type="submit" class="main-button">Ordina</button>
</form>

{else}
<p>Non hai selezionato nessun prodotto.</p>
{/if}

{/block}
