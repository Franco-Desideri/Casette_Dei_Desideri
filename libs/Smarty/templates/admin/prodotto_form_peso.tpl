{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar_admin.tpl"}

<h2>{if isset($prodotto)}Modifica prodotto a peso{else}Aggiungi nuovo prodotto a peso{/if}</h2>

<form method="post" action="/Casette_Dei_Desideri/AdminProdotto/{if isset($prodotto)}salvaModifica{else}salva{/if}">
    <input type="hidden" name="tipo" value="peso">
    {if isset($prodotto)}
        <input type="hidden" name="id" value="{$prodotto->getId()}">
    {/if}

    <label>Nome:</label>
    <input type="text" name="nome" required value="{if isset($prodotto)}{$prodotto->getNome()}{/if}">

    <label>Prezzo al kg (€):</label>
    <input type="number" step="0.01" name="prezzoKg" required value="{if isset($prodotto)}{$prodotto->getPrezzoKg()}{/if}">

    <label>Range di peso (es: 0.5 - 1.5 kg):</label>
    <input type="text" name="rangePeso" required value="{if isset($prodotto)}{$prodotto->getRangePeso()}{/if}">

    <label>Prezzo per range (€):</label>
    <input type="number" step="0.01" name="prezzoRange" required value="{if isset($prodotto)}{$prodotto->getPrezzoRange()}{/if}">

    <label>URL immagine:</label>
    <input type="text" name="foto" value="{if isset($prodotto)}{$prodotto->getFoto()}{/if}">

    <br><br>
    <button type="submit">{if isset($prodotto)}Salva modifiche{else}Aggiungi prodotto{/if}</button>
</form>

{/block}
