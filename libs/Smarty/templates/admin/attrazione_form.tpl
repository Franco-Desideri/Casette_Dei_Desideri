{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar_admin.tpl"}

<h2>{if $attrazione !== null}Modifica Attrazione{else}Aggiungi Attrazione{/if}</h2>

<form action="{if $attrazione !== null}/Casette_Dei_Desideri/AdminContenuti/salvaModificaAttrazione{else}/Casette_Dei_Desideri/AdminContenuti/salvaAttrazione{/if}" method="post">
    
    {if $attrazione !== null}
        <input type="hidden" name="id" value="{$attrazione->getId()}">
    {/if}

    <label>Immagine (URL):</label><br>
    <input type="text" name="immagine" value="{if $attrazione !== null}{$attrazione->getImmagine()}{/if}" required><br><br>

    <label>Descrizione:</label><br>
    <textarea name="descrizione" rows="4" cols="50" required>{if $attrazione !== null}{$attrazione->getDescrizione()}{/if}</textarea><br><br>

    <button type="submit">Salva</button>
</form>

{/block}

