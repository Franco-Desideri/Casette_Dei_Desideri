<!-- FILE NON UTILIZZATO -->
{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Riepilogo del tuo Ordine</h2>

{if $ordine.prodotti|@count > 0}
    <table cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th>Prodotto</th>
                <th>Quantità</th>
                <th>Prezzo</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$ordine.prodotti item=prodotto}
                <tr>
                    <td>{$prodotto.nome}</td>
                    <td>
                        {if $prodotto.tipo == 'peso'}
                            {$prodotto.quantita} g
                        {else}
                            {$prodotto.quantita} pz
                        {/if}
                    </td>
                    <td>€ {$prodotto.prezzo|number_format:2:",":"."}</td>
                </tr>
            {/foreach}
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align: right;"><strong>Totale:</strong></td>
                <td><strong>€ {$ordine.prezzo|number_format:2:",":"."}</strong></td>
            </tr>
        </tfoot>
    </table>

    <br>

    <form action="/Casette_Dei_Desideri/Ordine/conferma" method="post">
        <label for="contanti">
            Cifra che intendi lasciare in contanti alla consegna:
        </label><br>
        <input type="number" name="contanti" step="0.01" min="0" required>
        <br><br>
        <button type="submit">Conferma Ordine</button>
    </form>

{else}
    <p>Nessun prodotto selezionato. <a href="/Casette_Dei_Desideri/Ordine/listaProdotti">Torna al listino</a></p>
{/if}

{/block}
