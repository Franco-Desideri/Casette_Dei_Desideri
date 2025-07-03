{extends file="layouts/base.tpl"}

{block name="contenuto"}

<div class="main-content container">
    <h2 class="page-title">Riepilogo Ordine</h2>

    {if isset($ordine.prodotti) && count($ordine.prodotti) > 0}
    <section class="order-summary-section">
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
                    {* Non serve più ricalcolare queste variabili qui, le riceviamo dal controller *}
                    {* {assign var="quantita" value=$prodotto.quantita} *}
                    {* {assign var="prezzoUnitario" value=$prodotto.prezzo} *}
                    {* {assign var="totaleProdotto" value=$quantita * $prezzoUnitario} *}

                    {assign var="totale" value=$totale + $prodotto.prezzo_totale_riga} {* Usa il totale riga dal controller *}
                    <tr>
                        <td>{$prodotto.nome}</td>
                        <td>{$prodotto.quantita}</td>
                        <td>
                            {if $prodotto.tipo eq 'quantita'}
                                {$prodotto.prezzo_unitario|string_format:"%.2f"} &euro; {* Usa il nuovo prezzo unitario *}
                            {else if $prodotto.tipo eq 'peso'}
                                {$prodotto.prezzo_unitario_kg|string_format:"%.2f"} &euro;/Kg {* Usa il nuovo prezzo unitario al kg *}
                            {/if}
                        </td>
                        <td>{$prodotto.prezzo_totale_riga|string_format:"%.2f"} &euro;</td> {* Usa il totale riga *}
                    </tr>
                {/foreach}
            </tbody>
            <tfoot>
                <tr class="order-total-row">
                    <td colspan="3">Totale Ordine:</td>
                    <td class="total-amount">{$totale|string_format:"%.2f"} &euro;</td>
                </tr>
            </tfoot>
        </table>
    </section>

    <form action="/Casette_Dei_Desideri/Ordine/inviaOrdine" method="POST" class="order-form" style="text-align: center; margin-top: 30px;">
        <div class="form-group">
            <label for="taglio_banconota">Seleziona taglio banconota per pagamento:</label>
            <select id="taglio_banconota" name="taglio_banconota" class="payment-select" required>
                <option value="">Seleziona un taglio</option>
                <option value="5">5 &euro;</option>
                <option value="10">10 &euro;</option>
                <option value="20">20 &euro;</option>
                <option value="50">50 &euro;</option>
                <option value="100">100 &euro;</option>
            </select>
        </div>
        <button type="submit" class="main-button">Ordina</button>
    </form>

    {else}
    <p class="no-products-message">Non hai selezionato nessun prodotto.</p>
    {/if}

</div>

{/block}