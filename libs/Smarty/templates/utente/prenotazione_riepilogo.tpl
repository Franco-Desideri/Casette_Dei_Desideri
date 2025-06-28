{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Riepilogo Prenotazione</h2>

<h3>Struttura</h3>
<p><strong>{$struttura->getTitolo()}</strong></p>
<p><em>Luogo:</em> {$struttura->getLuogo()}</p>
<p>{$struttura->getDescrizione()}</p>

<hr>

<h3>Periodo del soggiorno</h3>
<p>Dal <strong>{$dataInizio}</strong> al <strong>{$dataFine}</strong></p>

<hr>

<h3>Ospiti</h3>
{if $ospiti|@count > 0}
    <ul style="list-style: none; padding: 0;">
        {foreach from=$ospiti item=ospite name=ospitiLoop}
            <li style="margin-bottom: 15px; padding-bottom: 10px; border-bottom: 1px solid #ccc;">
                <strong>Ospite {$smarty.foreach.ospitiLoop.iteration}:</strong><br>
                Nome: {$ospite.nome} {$ospite.cognome}<br>
                Documento: <em>{if isset($ospite.documento)}📎 Documento caricato{else}❌ Non caricato{/if}</em><br>
                Telefono: {$ospite.tell}<br>
                Codice Fiscale: {$ospite.codiceFiscale}<br>
                Sesso: {$ospite.sesso}<br>
                Data di nascita: {$ospite.dataNascita}<br>
                Luogo di nascita: {$ospite.luogoNascita}
            </li>
        {/foreach}
    </ul>
{else}
    <p>Nessun ospite specificato.</p>
{/if}

<hr>

<h3>Prezzo Totale</h3>
<p style="font-size: 18px;"><strong>€ {$totale}</strong></p>

<br>

<form method="post" action="/Casette_Dei_Desideri/Prenotazione/pagamento">
    <button type="submit">Procedi al pagamento</button>
</form>

{/block}
