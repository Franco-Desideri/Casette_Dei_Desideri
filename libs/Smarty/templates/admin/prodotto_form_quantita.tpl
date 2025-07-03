{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/header_admin.tpl"}

<div class="admin-content-container">

    <h2 class="admin-page-title">
        {if isset($prodotto)}Modifica prodotto a pezzi{else}Aggiungi nuovo prodotto a pezzi{/if}
    </h2>

    <form method="post" action="/Casette_Dei_Desideri/AdminProdotto/{if isset($prodotto)}salvaModifica{else}salva{/if}" class="admin-form-container">
        <input type="hidden" name="tipo" value="quantita">
        {if isset($prodotto)}
            <input type="hidden" name="id" value="{$prodotto->getId()}">
        {/if}

        <div class="form-group-item">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required value="{if isset($prodotto)}{$prodotto->getNome()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="prezzo">Prezzo (€):</label>
            <input type="number" id="prezzo" step="0.01" name="prezzo" required value="{if isset($prodotto)}{$prodotto->getPrezzo()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="quantita">Peso pacco (g):</label>
            <input type="number" id="quantita" name="peso" required value="{if isset($prodotto)}{$prodotto->getPeso()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="foto">URL immagine:</label>
            <input type="text" id="foto" name="foto" value="{if isset($prodotto)}{$prodotto->getFoto()}{/if}">
        </div>

        <button type="submit" class="admin-form-button">{if isset($prodotto)}Salva modifiche{else}Aggiungi prodotto{/if}</button>
    </form>

</div> {/block}