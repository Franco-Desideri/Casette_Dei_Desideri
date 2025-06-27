{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/appbar_admin.tpl"}

<h2>{if isset($prodotto)}Modifica prodotto a pezzi{else}Aggiungi nuovo prodotto a pezzi{/if}</h2>

<form method="post" action="/Casette_Dei_Desideri/AdminProdotto/{if isset($prodotto)}salvaModifica{else}salva{/if}">
    <input type="hidden" name="tipo" value="quantita">
    {if isset($prodotto)}
        <input type="hidden" name="id" value="{$prodotto->getId()}">
    {/if}

    <label>Nome:</label>
    <input type="text" name="nome" required value="{if isset($prodotto)}{$prodotto->getNome()}{else}{/if}">

    <label>Prezzo (€):</label>
    <input type="number" step="0.01" name="prezzo" required value="{if isset($prodotto)}{$prodotto->getPrezzo()}{else}{/if}">

    <label>Quantità (pezzi):</label>
    <input type="number" name="peso" required value="{if isset($prodotto)}{$prodotto->getPeso()}{else}{/if}">

    <label>URL immagine:</label>
    <input type="text" name="foto" value="{if isset($prodotto)}{$prodotto->getFoto()}{else}{/if}">

    <br><br>
    <button type="submit">{if isset($prodotto)}Salva modifiche{else}Aggiungi prodotto{/if}</button>
</form>

{/block}
