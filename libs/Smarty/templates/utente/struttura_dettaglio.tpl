{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar.tpl"}

<h2>{$struttura->getTitolo()}</h2>
<p>{$struttura->getDescrizione()}</p>

<h3>Galleria immagini</h3>
{if $foto|@count > 0}
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        {foreach from=$foto item=f}
            <img src="{$f->getPercorso()}" alt="foto" style="max-width: 200px;">
        {/foreach}
    </div>
{else}
    <p>Nessuna immagine disponibile.</p>
{/if}

<hr>
<h3>Prenota il tuo soggiorno</h3>
<form method="post" action="/Casette_Dei_Desideri/Prenotazione/calcola">
    <input type="hidden" name="idStruttura" value="{$struttura->getId()}">

    <label for="dataInizio">Data inizio:</label>
    <input type="date" id="dataInizio" name="dataInizio" required>

    <label for="dataFine">Data fine:</label>
    <input type="date" id="dataFine" name="dataFine" required>

    <label for="numOspiti">Numero ospiti (max {$struttura->getNumOspiti()}):</label>
    <input type="number" id="numOspiti" name="numOspiti" min="1" max="{$struttura->getNumOspiti()}" required>

    <br><br>
    <button type="submit">Procedi alla prenotazione</button>
</form>

<script>
    const intervalliDisponibili = [
        {foreach from=$intervalli item=i}
            {
                inizio: '{$i->getDataI()->format("Y-m-d")}',
                fine: '{$i->getDataF()->format("Y-m-d")}'
            }{if !$i@last},{/if}
        {/foreach}
    ];

    const dateOccupate = [
        {foreach from=$prenotazioni item=p}
            {
                inizio: '{$p->getDataInizio()->format("Y-m-d")}',
                fine: '{$p->getDataFine()->format("Y-m-d")}'
            }{if !$p@last},{/if}
        {/foreach}
    ];

    function isInIntervallo(dateStr) {
        const date = new Date(dateStr);
        return intervalliDisponibili.some(i => {
            return date >= new Date(i.inizio) && date <= new Date(i.fine);
        });
    }

    function isOccupata(dateStr) {
        const date = new Date(dateStr);
        return dateOccupate.some(p => {
            return date >= new Date(p.inizio) && date <= new Date(p.fine);
        });
    }

    function validateDate(input) {
        const val = input.value;
        if (val && (!isInIntervallo(val) || isOccupata(val))) {
            alert('La data ' + val + ' non è disponibile.');
            input.value = '';
        }
    }

    document.getElementById('dataInizio').addEventListener('change', e => validateDate(e.target));
    document.getElementById('dataFine').addEventListener('change', e => validateDate(e.target));
</script>

{/block}
