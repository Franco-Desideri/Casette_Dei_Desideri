{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar_admin.tpl"}

<h2>{if $evento !== null}Modifica Evento{else}Aggiungi Evento{/if}</h2>

<form action="{if $evento !== null}/Casette_Dei_Desideri/AdminContenuti/salvaModificaEvento{else}/Casette_Dei_Desideri/AdminContenuti/salvaEvento{/if}" method="post">
    
    {if $evento !== null}
        <input type="hidden" name="id" value="{$evento->getId()}">
    {/if}

    <label>Immagine (URL):</label><br>
    <input type="text" name="immagine" value="{if $evento !== null}{$evento->getImmagine()}{/if}" required><br><br>

    <label>Titolo:</label><br>
    <input type="text" name="titolo" value="{if $evento !== null}{$evento->getTitolo()}{/if}" required><br><br>

    <label>Data inizio:</label><br>
    <input type="date" name="dataInizio" value="{if $evento !== null}{$evento->getDataInizio()|date_format:'%Y-%m-%d'}{/if}" required><br><br>

    <label>Data fine:</label><br>
    <input type="date" name="dataFine" value="{if $evento !== null}{$evento->getDataFine()|date_format:'%Y-%m-%d'}{/if}" required><br><br>

    <button type="submit">Salva</button>
</form>

{/block}

