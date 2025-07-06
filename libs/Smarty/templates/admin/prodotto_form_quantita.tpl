{extends file="layouts/base.tpl"}

{block name="contenuto"}

{include file="partials/header_admin.tpl"}

<div class="admin-content-container">

    <h2 class="admin-page-title">
        {if isset($prodotto)}Modifica prodotto a pezzi{else}Aggiungi nuovo prodotto a pezzi{/if}
    </h2>

    {* 👇 AGGIUNTA enctype per permettere upload immagini *}
    <form method="post" action="/Casette_Dei_Desideri/AdminProdotto/{if isset($prodotto)}salvaModifica{else}salva{/if}" enctype="multipart/form-data" class="admin-form-container">
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
            <label for="quantita">Peso pacco :</label>
            <input type="number" id="quantita" name="peso" required value="{if isset($prodotto)}{$prodotto->getPeso()}{/if}">
        </div>

        <div class="form-group-item">
            <label for="unita_misura" >Unità di misura:</label>
            <select id="unita_misura" name="unita_misura" class="delivery-time-select" required>
                <option value="">-- Seleziona --</option>
                <option value="g" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'g'}selected{/if}>g</option>
                <option value="Kg" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'Kg'}selected{/if}>Kg</option>
                <option value="L" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'L'}selected{/if}>L</option>
                <option value="ml" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'ml'}selected{/if}>ml</option>
                <option value="pezzi" {if isset($prodotto) && $prodotto->getUnitaMisura() == 'pezzi'}selected{/if}>pezzi</option>
            </select>
        </div>

        {* 👇 CAMBIATO campo immagine: da URL a file upload *}
        <div class="form-group-item">
            <label for="foto">Immagine del prodotto:</label>
            <input type="file" id="foto" name="foto" accept="image/*" {if !isset($prodotto)}required{/if}>
            {if isset($prodotto)}
                <p>Immagine attuale: <br>
                    <img src="{$prodotto->fotoBase64}" alt="{$prodotto->getNome()}" style="max-width: 200px; max-height: 200px;">

                </p>
            {/if}
        </div>

        <button type="submit" class="admin-form-button">{if isset($prodotto)}Salva modifiche{else}Aggiungi prodotto{/if}</button>
    </form>

</div>

{/block}
