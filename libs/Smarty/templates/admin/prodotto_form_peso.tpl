{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/header_admin.tpl"}

<div class="admin-content-container">

    <h2 class="admin-page-title">
        {if isset($prodotto)}Modifica prodotto a peso{else}Aggiungi nuovo prodotto a peso{/if}
    </h2>

    <form method="post" action="/Casette_Dei_Desideri/AdminProdotto/{if isset($prodotto)}salvaModifica{else}salva{/if}" class="admin-form-container">
        <input type="hidden" name="tipo" value="peso">
        {if isset($prodotto)}
            <input type="hidden" name="id" value="{$prodotto->getId()}">
        {/if}

        <div class="form-group-item">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="{if isset($prodotto)}{$prodotto->getNome()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="prezzoKg">Prezzo al kg (€):</label>
            <input type="number" id="prezzoKg" step="0.01" name="prezzoKg" required value="{if isset($prodotto)}{$prodotto->getPrezzoKg()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="rangePeso">Range di peso (es: 0.5 - 1.5 kg):</label>
            <input type="text" id="rangePeso" name="rangePeso" required value="{if isset($prodotto)}{$prodotto->getRangePeso()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="prezzoRange">Prezzo per range (€):</label>
            <input type="number" id="prezzoRange" step="0.01" name="prezzoRange" required value="{if isset($prodotto)}{$prodotto->getPrezzoRange()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="foto">URL immagine:</label>
            <input type="text" id="foto" name="foto" value="{if isset($prodotto)}{$prodotto->getFoto()}{/if}">
        </div>

        <button type="submit" class="admin-form-button">{if isset($prodotto)}Salva modifiche{else}Aggiungi prodotto{/if}</button>
    </form>

</div> {/block}