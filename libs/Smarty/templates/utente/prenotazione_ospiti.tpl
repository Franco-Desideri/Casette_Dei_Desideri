{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>Prenotazione: {$struttura->getTitolo()}</h2>

<p><strong>Periodo:</strong> {$smarty.session.prenotazione_temp.data_inizio} → {$smarty.session.prenotazione_temp.data_fine}</p>
<p><strong>Ospiti:</strong> {$smarty.session.prenotazione_temp.num_ospiti}</p>
<p><strong>Totale stimato:</strong> € {$smarty.session.prenotazione_temp.totale}</p>

<hr>

<form method="post" action="/Casette_Dei_Desideri/Prenotazione/riepilogoCompleto" enctype="multipart/form-data">
    <h3>Dati degli ospiti</h3>

    {section name=ospite loop=$smarty.session.prenotazione_temp.num_ospiti}
        <fieldset style="margin-bottom: 25px; border: 1px solid #ccc; padding: 15px;">
            <legend>Ospite {$smarty.section.ospite.index+1}</legend>

            <label>Nome:</label>
            <input type="text" name="ospiti[{$smarty.section.ospite.index}][nome]" required>

            <label>Cognome:</label>
            <input type="text" name="ospiti[{$smarty.section.ospite.index}][cognome]" required>

            <label>Documento (PDF o immagine):</label>
            <input type="file" name="ospiti[{$smarty.section.ospite.index}][documento]" accept=".pdf,image/*" required>

            <label>Telefono:</label>
            <input type="tel" name="ospiti[{$smarty.section.ospite.index}][tell]" required>

            <label>Codice Fiscale:</label>
            <input type="text" name="ospiti[{$smarty.section.ospite.index}][codiceFiscale]" required>

            <label>Sesso:</label>
            <select name="ospiti[{$smarty.section.ospite.index}][sesso]" required>
                <option value="">-- seleziona --</option>
                <option value="M">Maschio</option>
                <option value="F">Femmina</option>
                <option value="Altro">Altro</option>
            </select>

            <label>Data di nascita:</label>
            <input type="date" name="ospiti[{$smarty.section.ospite.index}][dataNascita]" required>

            <label>Luogo di nascita:</label>
            <input type="text" name="ospiti[{$smarty.section.ospite.index}][luogoNascita]" required>
        </fieldset>
    {/section}

    <button type="submit">Continua al riepilogo</button>
</form>

{/block}
