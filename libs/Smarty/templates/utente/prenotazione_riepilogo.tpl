{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Riepilogo Prenotazione</h2>

<p><strong>Struttura:</strong> {$struttura->getTitolo()}</p>
<p><strong>Periodo:</strong> {$dataInizio} → {$dataFine}</p>
<p><strong>Numero Ospiti:</strong> {$ospiti|@count}</p>
<p><strong>Totale:</strong> € {$totale}</p>

<hr>

<h3>Ospiti</h3>
{foreach from=$ospiti item=ospite name=ospitiLoop}
    <fieldset style="margin-bottom: 25px; border: 1px solid #ccc; padding: 15px;">
        <legend>Ospite {$smarty.foreach.ospitiLoop.iteration}</legend>

        <p><strong>Nome:</strong> {$ospite.nome}</p>
        <p><strong>Cognome:</strong> {$ospite.cognome}</p>
        <p><strong>Telefono:</strong> {$ospite.tell}</p>
        <p><strong>Codice Fiscale:</strong> {$ospite.codiceFiscale}</p>
        <p><strong>Sesso:</strong> {$ospite.sesso}</p>
        <p><strong>Data di nascita:</strong> {$ospite.dataNascita}</p>
        <p><strong>Luogo di nascita:</strong> {$ospite.luogoNascita}</p>

        {if isset($ospite.documento_base64) && $ospite.documento_base64 != ''}
            <p>
                <strong>Documento:</strong>
                <a href="data:application/octet-stream;base64,{$ospite.documento_base64}" target="_blank">
                    📄 Visualizza documento
                </a>
            </p>
        {/if}
    </fieldset>
{/foreach}

<hr>

<form method="post" action="/Casette_Dei_Desideri/Prenotazione/pagamento">
    <input type="hidden" name="conferma" value="1">
    <button type="submit">Conferma Prenotazione</button>
</form>

{/block}
