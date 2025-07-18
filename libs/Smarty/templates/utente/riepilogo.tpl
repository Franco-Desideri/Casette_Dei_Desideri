{extends file="layouts/base.tpl"}

{block name="contenuto"}

{if isset($errore_contanti)}
  <div class="alert-custom">
    <strong>Attenzione:</strong> {$errore_contanti}
  </div>
{/if}




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

                    {assign var="totale" value=$totale + $prodotto.prezzo_totale_riga} 
                    <tr>
                        <td>{$prodotto.nome}</td>
                        <td>
                        {if $prodotto.tipo == 'peso'}
                            {$prodotto.quantita} g
                        {else}
                            {$prodotto.quantita} pz
                        {/if}
                        </td>
                        <td>
                            {if $prodotto.tipo eq 'quantita'}
                                {$prodotto.prezzo_unitario|string_format:"%.2f"} &euro; 
                            {else if $prodotto.tipo eq 'peso'}
                                {$prodotto.prezzo_unitario_kg|string_format:"%.2f"} &euro;/Kg 
                            {/if}
                        </td>
                        <td>{$prodotto.prezzo_totale_riga|string_format:"%.2f"} &euro;</td> 
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

    <form action="/Casette_Dei_Desideri/Ordine/conferma" method="POST" class="order-form" style="text-align: center; margin-top: 30px;">
        <div class="form-group">
            <label for="contanti">Cifra con la quale si intende pagare alla consegna:</label>
            <input type= "number" id="contanti" name="contanti" class="cash-amount-input" step = "0.1" min="0" required>
        </div>
        <button type="submit" class="main-button">Ordina</button>
    </form>

    {else}
    <p class="no-products-message">Non hai selezionato nessun prodotto.</p>
    {/if}

</div>

{/block}